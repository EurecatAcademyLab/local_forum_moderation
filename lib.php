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
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__.'/../../config.php');

$page = new moodle_page();
$page->requires->js('/local/forum_moderation/amd/woocomerce.min.js');

/**
 * Insert a link to index.php on the site front page navigation menu.
 *
 * @param navigation_node $frontpage Node representing the front page in the navigation tree.
 */
function local_forum_moderation_extend_navigation_frontpage(navigation_node $frontpage) {
    if (isloggedin() && !isguestuser()) {
        $frontpage->add(
            get_string('pluginname', 'local_forum_moderation'),
            new moodle_url('/local/forum_moderation/index.php')
        );
    }
}

/**
 * Add link to index.php into navigation drawer.
 *
 * @param global_navigation $root Node representing the global navigation tree.
 */
function local_forum_moderation_extend_navigation(global_navigation $root) {
    if (isloggedin() && !isguestuser()) {
        $node = navigation_node::create(
            get_string('pluginname', 'local_forum_moderation'),
            new moodle_url('/local/forum_moderation/index.php')
        );

        $node->showinflatnavigation = true;

        $root->add_node($node);
    }
}


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
    global $DB;

    $precheckcourse = $DB->record_exists('local_forum_moderation', array('course_id' => $courseid));
    $precheckrating = $DB->record_exists('local_forum_moderation', array('rating' => $alertselected));

    if ($alertselected != 0 && !$precheckrating) {
        return $sql = ";";
    }

    if ($courseid != 0 && !$precheckcourse) {
        return $sql = ";";
    }

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
 * @return Int $count .
 */
function get_count_userpost($userid) {
    global $DB;
    $sql = "SELECT MAX(count_user) AS max_count
    FROM {local_forum_moderation}
    WHERE user_id = :userid
    AND advice != 'no_action'";
    $count = $DB->get_field_sql($sql, ['userid' => $userid]);
    $count = $count ? (intval($count) + 1) : 1;
    return $count;
}

/**
 * Get the actual Url.
 * @return String $actualurl.
 */
function get_actual_url() {

    $urlactual = qualified_me();
    $urlparsed = parse_url($urlactual);

    // Url base.
    $urlbase = $urlparsed['scheme'] . "://" . $urlparsed['host'];

    if (isset($urlparsed['port'])) {
        $urlbase .= ":" . $urlparsed['port'];
    }

    $urlbase .= "/";
    return $urlbase;
}

/**
 * Saves the configuration settings.
 * Only creates configuration values if they do not already exist in the database.
 * According to the privacy policy accepted in the settings of this plugin,
 * the user gives permission to save the URL and the activation time.
 * @return bool Returns true when save a good valñues on DB.
 */
function save_settings() {
    global $DB, $CFG;

    // Check if the privacity setting is enabled.
    $existingconfigprivacity = $DB->get_record('config_plugins',
        array('plugin' => 'local_forum_moderation', 'name' => 'privacity'));

        $configs = array(
            array('name' => 'time', 'value' => time()),
            array('name' => 'url', 'value' => strval(get_actual_url())),
        );

        foreach ($configs as $config) {
            // Check if the configuration item already exists.
            $existingconfig = $DB->get_record('config_plugins',
            array('plugin' => 'local_forum_moderation', 'name' => $config['name']));

            // Insert the configuration item if it does not exist.
            if (!$existingconfig) {
                $forumconfig = new stdClass();
                $forumconfig->plugin = 'local_forum_moderation';
                $forumconfig->name = $config['name'];
                $forumconfig->value = $config['value'];

                $DB->insert_record('config_plugins', $forumconfig);
            }
        }

        return true;
}

/**
 * Check if validation time has passed.
 *
 * This function retrieves the value of the 'time' and 'url' configuration
 * records from the 'config_plugins' table for the 'local_forum_moderation' plugin,
 * and compares the value of 'time' with the current time to determine if
 * validation time has passed (30 days).
 *
 * @return bool Returns false if validation time has passed, otherwise true.
 */
function check_validation_time() {
    global $DB;

    $existingconfig = $DB->get_record('config_plugins', array('plugin' => 'local_forum_moderation', 'name' => 'time'));
    $existingconfigurl = $DB->get_record('config_plugins', array('plugin' => 'local_forum_moderation', 'name' => 'url'));

    if ($existingconfig && $existingconfigurl) {
        $value = $existingconfig->value;
        $thirtydays = 30 * 24 * 60 * 60;
        $current = time();

        if ($value + $thirtydays <= $current) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

/**
 * This function changes the staus of the plugin on the table config plugins on the DB.
 * @return Void.
 */
function update_status() {
    if (check_validation_time() == false) {
        global $DB;
        $existingconfig = $DB->get_field('config_plugins', array('plugin' => 'local_forum_moderation', 'name' => 'status'));
        if ($existingconfig) {
            $DB->set_field('config_plugins', 'value', '0', array('plugin' => 'local_forum_moderation', 'name' => 'status'));
        }
    }
}

/**
 * This function get data from config settings and connect with js function.
 * @return Void.
 */
function call_woocomerce() {

    $apikey = get_config('local_forum_moderation', 'apikey');
    $productid = get_config('local_forum_moderation', 'productid');
    $email = get_config('local_forum_moderation', 'email');

    $data = array("apikey" => $apikey, "productid" => $productid, 'email' => $email);
    global $PAGE;
    $PAGE->requires->js('/local/forum_moderation/amd/woocomerce.min.js');
    $PAGE->requires->js_init_call('woocommerce_api_active', $data);
}

/**
 * This function get data from config settings and confirm the status.
 * @return Void.
 */
function call_woocomerce_status() {

    $apikey = get_config('local_forum_moderation', 'apikey');
    $productid = get_config('local_forum_moderation', 'productid');
    $email = get_config('local_forum_moderation', 'email');

    $data = array("apikey" => $apikey, "productid" => $productid, 'email' => $email);
    global $PAGE;
    $PAGE->requires->js('/local/forum_moderation/amd/woocomerce.min.js');
    $PAGE->requires->js_init_call('woocommerce_api_status', $data);
}
