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
 * The cyclic function.
 *
 * @package     local_forum_moderation
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot. '/local/forum_moderation/model.php');
require_once($CFG->dirroot. '/local/forum_moderation/lib.php');

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
        $record->count_user = get_count_userpost($m->user);
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
        if (!empty($prediction['words'])) {
            $record->hate_detected = implode(",", $prediction['words']);
        }        $record->last_modified = $m->modified;

        if ($DB->record_exists('local_forum_moderation', ['post_id' => $record->post_id])) {
            $record->id = $DB->get_field('local_forum_moderation', 'id', ['post_id' => $record->post_id]);
            $DB->update_record('local_forum_moderation', $record);
        } else {
            $DB->insert_record('local_forum_moderation', $record);
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
    $lastmodified = $DB->get_records_sql("SELECT MAX(last_modified) AS lastModified FROM {local_forum_moderation}");
    if (reset($lastmodified)->lastmodified == null) {
        $lastmodified = 0;
    } else {
        $lastmodified = reset($lastmodified)->lastmodified;
    }
    getpostsfr((int)$lastmodified, 100);
}

