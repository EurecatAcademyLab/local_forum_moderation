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
 * @author      2022 Aina Palacios / JuanCarlo Castillo
 * @copyright   2022 Aina Palacios & Eurecat.dev
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__.'/../../config.php');
require_login();

/**
 * Sql complex querie
 * @param Mixed $lastmodified .
 * @param Int $maxnum .
 * @return String $sql .
 */
function join_tables_query_update($lastmodified, $maxnum) {

    $sql = "SELECT p.id , p.message ,  p.subject , u.id as 'user', d.id as 'd_id' , f.id as 'f_id' , f.course as 'c_id', p.modified
    FROM {forum_posts} p
    JOIN {user} u ON p.userid = u.id
    JOIN {forum_discussions} d ON p.discussion = d.id
    JOIN {forum} f ON d.forum = f.id
    WHERE p.modified > $lastmodified
    ORDER BY p.id ASC
    LIMIT $maxnum
    ";

    return $sql;
}

/**
 * Sql complex querie
 * @param Mixed $courseid .
 * @param Mixed $checked .
 * @param Mixed $alertselected .
 * @return String $sql .
 */
function forum_review_query($courseid, $checked, $alertselected) {
    global $DB;

    $precheckcourse = $DB->record_exists('local_forum_review', array('course_id' => $courseid));
    $precheckrating = $DB->record_exists('local_forum_review', array('rating' => $alertselected));

    if ($alertselected != 0 && !$precheckrating) {
        return $sql = ";";
    }

    if ($courseid != 0 && !$precheckcourse) {
        return $sql = ";";
    }

    if ($precheckcourse) {
        $sql =
            "SELECT c.*
            FROM {local_forum_review} c
            JOIN {forum_discussions} fd on fd.id = c.discussion_id
            WHERE  c.rating > 0
            AND fd.course =  $courseid  AND c.checked = $checked";
    } else if (is_null($courseid) || $courseid == 0) {
        $sql = "SELECT *
        FROM {local_forum_review} c
        WHERE c.rating > 0 AND c.checked = ".$checked;
    }

    if ($precheckrating && $alertselected != 0) {
        $sql .= ' AND c.rating = '.$alertselected;
    }

    return $sql.";";
}

/**
 * Sql complex querie
 * @param Mixed $courseid .
 * @return String $sql .
 */
function forum_review_query_all($courseid) {

    if (is_null($courseid) || $courseid == 0) {
        $sql = "SELECT *
        FROM {local_forum_review} f;";
    } else {
        $sql =
            "SELECT c.*
            FROM {local_forum_review} c
            JOIN {forum_discussions} fd on fd.id = c.discussion_id
            WHERE  fd.course = $courseid;";
    }
    return $sql;
}

/**
 * To put a message en quarantine.
 * @param Int $messageid .
 * @return Void .
 */
function quarantine_query($messageid) {
    global $DB;

    $record = new stdClass();
    $record->id = $messageid;
    $record->deleted = 1;
    if ($DB->record_exists('forum_posts', array('id' => $record->id))) {
        $DB->update_record('forum_posts', $record);
    }
    return;
}

/**
 * Sql complex querie
 * @param Int $courseid .
 * @return String $sql .
 */
function forum_reviewed_query($courseid) {

    if (is_null($courseid) || $courseid == 0) {

        $sql = "SELECT *
        FROM {local_forum_review} f
        WHERE f.checked = 1 and f.rating > 0
        ORDER BY f.last_modified DESC
        ";
    } else {
        $sql = "SELECT f.*
        FROM {local_forum_review} f
        JOIN {forum_discussions} fd on fd.id = f.discussion_id
        WHERE f.checked = 1 and f.rating > 0 and fd.course = $courseid
        ORDER BY f.last_modified DESC
        ";
    }
    return $sql;
}

/**
 * To get the user name.
 * @param Int $userid .
 * @return Object $sql .
 */
function get_name_user($userid) {

    global $DB;
    $name = $DB->get_record_sql("SELECT CONCAT(firstname , ' ', lastname) as name from {user} WHERE id = ?;", array($userid));
    return $name;
}

/**
 * To get the course name.
 * @param Int $courseid .
 * @return Object $sql .
 */
function get_name_course($courseid) {
    global $DB;
    $name = $DB->get_record_sql("SELECT c.fullname as name from {course} c WHERE c.id = ?;", array($courseid));
    return $name;
}

