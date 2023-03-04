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

/**
 * Define upgrade steps to be performed to upgrade the plugin from the old version to the current one.
 *
 * @param int $oldversion Version number the plugin is being upgraded from.
 */
function xmldb_local_forum_review_upgrade($oldversion) {
    global $DB;
    $dbman = $DB->get_manager();

    if ($oldversion < 2022091901) {

        // Define field post_id to be added to local_forum_review.
        $table = new xmldb_table('local_forum_review');
        $field = new xmldb_field('post_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'advice');

        // Conditionally launch add field post_id.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Forum_review savepoint reached.
        upgrade_plugin_savepoint(true, 2022091901, 'local', 'forum_review');
    }

    if ($oldversion < 2022092100) {

        // Define field discussion_id to be added to local_forum_review.
        $table = new xmldb_table('local_forum_review');
        $field = new xmldb_field('discussion_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, 0, 'post_id');

        // Conditionally launch add field discussion_id.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Forum_review savepoint reached.
        upgrade_plugin_savepoint(true, 2022092100, 'local', 'forum_review');
    }

    if ($oldversion < 2022092700) {

        // Define field reject to be added to local_forum_review.
        $table = new xmldb_table('local_forum_review');
        $field = new xmldb_field('reject', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'discussion_id');

        // Conditionally launch add field reject.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Forum_review savepoint reached.
        upgrade_plugin_savepoint(true, 2022092700, 'local', 'forum_review');

        // Define field checked to be added to local_forum_review.
        $table = new xmldb_table('local_forum_review');
        $field = new xmldb_field('checked', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'reject');

        // Conditionally launch add field checked.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Forum_review savepoint reached.
        upgrade_plugin_savepoint(true, 2022092700, 'local', 'forum_review');
    }

    if ($oldversion < 2022092703) {

        // Define field hate_detected to be added to local_forum_review.
        $table = new xmldb_table('local_forum_review');
        $field = new xmldb_field('hate_detected', XMLDB_TYPE_TEXT, null, null, null, null, null, 'checked');

        // Conditionally launch add field hate_detected.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Forum_review savepoint reached.
        upgrade_plugin_savepoint(true, 2022092703, 'local', 'forum_review');
    }

    if ($oldversion < 2022092704) {

        // Define field last_modified to be added to local_forum_review.
        $table = new xmldb_table('local_forum_review');
        $field = new xmldb_field('last_modified', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'hate_detected');

        // Conditionally launch add field last_modified.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Forum_review savepoint reached.
        upgrade_plugin_savepoint(true, 2022092704, 'local', 'forum_review');
    }

    if ($oldversion < 2022092800) {

        // Define field checked_last_modified to be added to local_forum_review.
        $table = new xmldb_table('local_forum_review');
        $field = new xmldb_field('checked_last_modified', XMLDB_TYPE_INTEGER, '10', null, null, null, '0', 'last_modified');

        // Conditionally launch add field checked_last_modified.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Forum_review savepoint reached.
        upgrade_plugin_savepoint(true, 2022092800, 'local', 'forum_review');
    }

    return true;
}
