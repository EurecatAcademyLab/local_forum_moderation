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

/**
 * Plugin version and other meta-data are defined here.
 * @package     local_forum_review
 * @author      2022 Aina Palacios
 * @copyright   2022 Aina Palacios & Eurecat.dev
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');
require_login();

/**
 * To create a html.
 * @param Mixed $courseselected .
 * @return String html header.
 */
function html_header($courseselected) {
    global $CFG;

    $output = "";

    if ($courseselected != '0') {
        if (!is_null($courseselected)) {

            $output .= html_writer::start_tag('div', ['class' => 'w-100 text-center']);
            $output .= html_writer::tag('hr', '');
            $course = get_string('course', 'local_textanalysis') . get_name_course($courseselected)->name;
            $output .= html_writer::tag('span', $course, ['class' => 'h1 p-3 center']);
            $output .= html_writer::start_tag('a', ['href' => $CFG->wwwroot.'/course/view.php?id='.$courseselected]);
            $output .= html_writer::tag('i', '', ['class' => 'fa fa-link p-1']);
            $output .= html_writer::end_tag('a');
            $output .= html_writer::end_tag('div');
        }
    }

    return $output;

}

