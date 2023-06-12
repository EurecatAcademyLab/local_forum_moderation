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

require_once(__DIR__.'/../../config.php');
require_login();

/**
 * Insert a link to index.php on the site front page navigation menu.
 *
 * @param navigation_node $frontpage Node representing the front page in the navigation tree.
 */
function local_forum_moderation_extend_navigation_frontpage(navigation_node $frontpage) {
    if (isloggedin() && !isguestuser()) {
        $isteacher = get_courses_teacher();

        if (!empty($isteacher) || is_siteadmin()) {
            $frontpage->add(
                get_string('pluginname', 'local_forum_moderation'),
                new moodle_url('/local/forum_moderation/index.php')
            );
        } 
    }
}

/**
 * Add link to index.php into navigation drawer.
 *
 * @param global_navigation $root Node representing the global navigation tree.
 */
function local_forum_moderation_extend_navigation(global_navigation $root) {
    
    if (isloggedin() && !isguestuser()) {

        $isteacher = get_courses_teacher();
    
        if (!empty($isteacher) || is_siteadmin()) {
            $node = navigation_node::create(
                get_string('pluginname', 'local_forum_moderation'),
                new moodle_url('/local/forum_moderation/index.php')
            );
            $node->showinflatnavigation = true;
            $root->add_node($node);
        }
    }
}

function get_courses_teacher(){
    global $DB, $USER;
    $userid = $USER->id;
    // $userid = 6;
    $sql = "SELECT u.username, c.id, c.fullname
    FROM mdl_user u
    JOIN mdl_role_assignments ra ON ra.userid = u.id
    JOIN mdl_context ctx ON ctx.id = ra.contextid
    JOIN mdl_course c ON c.id = ctx.instanceid
    JOIN mdl_role r ON r.id = ra.roleid
    WHERE u.id = $userid
    AND r.shortname = 'editingteacher'";
    $isteacher = $DB->get_records_sql($sql);
    return $isteacher;
}