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
 * @package     local_forum_moderation
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

    $sql = "SELECT p.id , p.message ,  p.subject , u.id AS user, d.id AS d_id , f.id AS f_id , f.course AS c_id, p.modified
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
function forum_moderation_query($courseid, $checked, $alertselected) {
    global $DB, $USER;

    $precheckcourse = $DB->record_exists('local_forum_moderation', array('course_id' => $courseid));
    $precheckrating = $DB->record_exists('local_forum_moderation', array('rating' => $alertselected));

    if ($alertselected != 0 && !$precheckrating) {
        return $sql = ";";
    }

    if ($courseid != 0 && !$precheckcourse) {
        return $sql = ";";
    }

    $userid = $USER->id;
    if (!is_siteadmin()) {
        if ($precheckcourse) {

            $sql = "SELECT c.*
            FROM {local_forum_moderation} c
            JOIN {forum_discussions} fd ON fd.id = c.discussion_id
            JOIN {course} c2 ON c2.id = fd.course
            JOIN {context} ctx ON ctx.instanceid = c2.id
            JOIN {role_assignments} ra ON ra.contextid = ctx.id
            WHERE ra.userid = $userid
            AND ra.roleid = 3
            AND c.rating > 0
            AND fd.course =  $courseid
            AND c.checked = $checked";

        } else if (is_null($courseid) || $courseid == 0) {
            $sql = "SELECT c.*
            FROM {local_forum_moderation} c
            JOIN {forum_discussions} fd ON fd.id = c.discussion_id
            JOIN {course} c2 ON c2.id = fd.course
            JOIN {context} ctx ON ctx.instanceid = c2.id
            JOIN {role_assignments} ra ON ra.contextid = ctx.id
            WHERE ra.userid = $userid
            AND ra.roleid = 3
            AND c.rating > 0
            AND c.checked = $checked";
        }

    } else {

        if ($precheckcourse) {
            $sql =
            "SELECT c.*
                FROM {local_forum_moderation} c
                JOIN {forum_discussions} fd on fd.id = c.discussion_id
                WHERE  c.rating > 0
                AND fd.course =  $courseid  AND c.checked = $checked";
        } else if (is_null($courseid) || $courseid == 0) {
            $sql = "SELECT *
            FROM {local_forum_moderation} c
            WHERE c.rating > 0 AND c.checked = ".$checked;
        }
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
function forum_moderation_query_all($courseid) {

    if (is_null($courseid) || $courseid == 0) {
        $sql = "SELECT *
        FROM {local_forum_moderation} f;";
    } else {
        $sql =
            "SELECT c.*
            FROM {local_forum_moderation} c
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
function forum_moderationed_query($courseid) {

    if (is_null($courseid) || $courseid == 0) {

        $sql = "SELECT *
        FROM {local_forum_moderation} f
        WHERE f.checked = 1 and f.rating > 0
        ORDER BY f.last_modified DESC
        ";
    } else {
        $sql = "SELECT f.*
        FROM {local_forum_moderation} f
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
    $name = $DB->get_field('user', "CONCAT(firstname , ' ', lastname)", ['id' => $userid]);
    return $name;
}

/**
 * To get the course name.
 * @param Int $courseid .
 * @return Object $sql .
 */
function get_name_course($courseid) {
    global $DB;
    $name = $DB->get_field('course', 'fullname', ['id' => $courseid]);
    return $name;
}

/**
 * To count how many times a user post a hate post.
 * @param Int $userid .
 * @param String $advice .
 * @return Int $count .
 */
function get_count_userpost($userid, $advice) {
    global $DB;
    $sql = "SELECT MAX(count_user) AS max_count
    FROM {local_forum_moderation}
    WHERE user_id = :userid";

    $count = $DB->get_field_sql($sql, ['userid' => $userid]);
    if ($advice != 'no_action') {
        $count = $count ? (intval($count) + 1) : 1;
    } else {
        $count = $count ? (intval($count) + 0) : 0;
    }
    return $count;
}
