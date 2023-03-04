<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.
// File to download the data in Csv.
/**
 * Plugin version and other meta-data are defined here.
 * @package     local_forum_review
 * @author      2022 Aina Palacios
 * @copyright   2022 Aina Palacios & Eurecat.dev
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->libdir.'/gdlib.php');
require_once($CFG->dirroot.'/user/lib.php');

require_login();

global $DB, $USER;

$dataformat = required_param('download', PARAM_ALPHA);
$download = required_param('download', PARAM_ALPHA);
$courseselected = required_param('curseSelected', PARAM_INT);
$revised = required_param('revised', PARAM_BOOL);

// ... id_post, user, message, messange_translation discussion, polarity, language, class_id, class_name.
$columns = array(
    'name' => get_string('user', 'local_forum_review'),
    'hate_detected' => get_string('hate_detected', 'local_forum_review'),
    'advice' => get_string('advice', 'local_forum_review'),
    'message' => get_string('message', 'local_forum_review'),
    'discussion' => get_string('discussion', 'local_forum_review'),
    'forum' => get_string('forum', 'local_forum_review'),
    'course_id' => get_string('course_id', 'local_forum_review'),
    'course_name' => get_string('course', 'local_forum_review')
);

if ($revised) {

    $columns['reject'] = get_string('action', 'local_forum_review');

    $sql = "SELECT c.post_id as post_id, CONCAT(u.firstname , ' ', u.lastname) as name, c.hate_detected as hate_detected,
    c.message as message, fd.name as discussion, f.name as forum,
    course.id as course_id, course.fullname as course_name,
    c.advice as advice, c.reject as reject
    FROM {local_forum_review} c
    JOIN {forum_discussions} fd on fd.id = c.discussion_id
    JOIN {user} u on u.id = c.user_id
    JOIN {forum} f on f.id = fd.forum
    JOIN {course} course on course.id = fd.course
    WHERE c.rating > 0 and c.checked = 1";

} else {
    $sql = "SELECT c.post_id as post_id, CONCAT(u.firstname , ' ', u.lastname) as name, c.hate_detected as hate_detected,
    c.message as message, fd.name as discussion, f.name as forum,
    course.id as course_id, course.fullname as course_name,
    c.advice as advice
    FROM {local_forum_review} c
    JOIN {forum_discussions} fd on fd.id = c.discussion_id
    JOIN {user} u on u.id = c.user_id
    JOIN {forum} f on f.id = fd.forum
    JOIN {course} course on course.id = fd.course
    WHERE c.rating > 0 and c.checked = 0";
}

$sql .= (is_null($courseselected) || $courseselected == 0) ? '' : ' AND fd.course = '.$courseselected;

$sql .= ' ORDER BY c.last_modified DESC;';

if (ob_get_length()) {
    throw new coding_exception("Output can not be buffered before calling download_as_dataformat");
}
$classname = 'dataformat_' . $dataformat . '\writer';
if (!class_exists($classname)) {
    throw new coding_exception("Unable to locate dataformat/$dataformat/classes/writer.php");
}
$format = new $classname;

// The data format export could take a while to generate...
set_time_limit(0);

// Close the session so that the users other tabs in the same session are not blocked.
\core\session\manager::write_close();

// If this file was requested from a form, then mark download as complete (before sending headers).
\core_form\util::form_download_complete();


$filename = date("dmY");
$format->set_filename('hate_detection'.$filename);
$format->send_http_headers();
// This exists to support all dataformats - see MDL-56046.
if (method_exists($format, 'write_header')) {
    $format->write_header($columns);
} else {
    $format->start_output();
    $format->start_sheet($columns);
}

if ($rs = $DB->get_records_sql($sql)) {

    $c = 0;
    $del = get_string('delete', 'local_forum_review');
    $accept = get_string('accept', 'local_forum_review');
    foreach ($rs as $key => $value) {
        $row = [];
        $row[] = $value->name;
        $row[] = $value->hate_detected;
        $row[] = get_string(strtolower($value->advice), 'local_forum_review');
        $row[] = strip_tags($value->message);
        $row[] = $value->discussion;
        $row[] = $value->forum;
        $row[] = $value->course_id;
        $row[] = $value->course_name;
        if ($revised) {
            $row[] = $value->reject ? $del : $accept;
        }
        $format->write_record($row, $c++);
    }
}

if (method_exists($format, 'write_footer')) {
    $format->write_footer($columns);
} else {
    $format->close_sheet($columns);
    $format->close_output();
}

