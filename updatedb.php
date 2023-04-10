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
 *
 * @package     local_forum_review
 * @author      2022 Aina Palacios
 * @copyright   2022 Aina Palacios & Eurecat.dev
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot. '/local/forum_review/model.php');
require_once($CFG->dirroot. '/local/forum_review/query.php');
require_once($CFG->dirroot. '/local/forum_review/sendmessages.php');

/**
 * To Update or insert record on forum review table.
 * @param Mixed $lastmodified .
 * @param Mixed $maxnum .
 * @return Void .
 */
function getpostsfr($lastmodified, $maxnum) {
    global $DB;
    $sql = join_tables_query_update($lastmodified, $maxnum);
    $messages = $DB->get_records_sql($sql);

    foreach ($messages as $m) {

        $record = new stdClass();
        $record->post_id = $m->id;
        $record->message = strip_tags($m->message);
        $record->user_id = $m->user;
        $record->subject = $m->subject;
        $record->discussion_id = $m->d_id;
        $record->forum_id = $m->f_id;
        $record->course_id = $m->c_id;
        $prediction = predict($m->message);
        $record->rating = $prediction['rating'];
        switch ($record->rating) {
            case (2):
                $record->advice = 'danger';
                break;
            case (1):
                $record->advice = 'warning';
                break;
            default:
                $record->advice = 'no_action';
        }
        if ($record->rating == 2) {
            $messageid = $m->id;
            quarantine_query($messageid);
        }

        $record->reject = 0;
        $record->checked = 0;
        $record->hate_detected = implode(",", $prediction['words']);
        $record->last_modified = $m->modified;

        if ($DB->record_exists('local_forum_review', ['post_id' => $record->post_id])) {
            $record->id = $DB->get_field('local_forum_review', 'id', ['post_id' => $record->post_id]);
            $DB->update_record('local_forum_review', $record);
        } else {
            $DB->insert_record('local_forum_review', $record);
        }

        // Messages.
        if ($record->rating > 0) {
            send_post_to_revision($record->user_id);
        }
    }
}

/**
 * To change datetime to timestamp.
 * @return Int with the time.
 */
function gettimestamp() {
    $time = new DateTime("now", core_date::get_user_timezone_object());
    $time->setTime(0, 0, 0);
    $timestamp = $time->getTimestamp();
    return $timestamp;
}

/**
 * To set or reset the lastmodified.
 * @return Void .
 */
function updatepostfr() {
    global $DB;
    $lastmodified = $DB->get_records_sql("SELECT MAX(last_modified) AS lastModified FROM {local_forum_review}");
    if (reset($lastmodified)->lastmodified == null) {
        $lastmodified = 0;
    } else {
        $lastmodified = reset($lastmodified)->lastmodified;
    }
    getpostsfr((int)$lastmodified, 100);
}

