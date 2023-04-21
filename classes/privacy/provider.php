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
 * display privacity in local_forum_review.
 *
 * @package     local_forum_review
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core_completion\privacy;

defined('MOODLE_INTERNAL') || die();

use core_privacy\local\metadata\collection;
use core_privacy\local\request\approved_userlist;
use core_privacy\local\request\contextlist;
use core_privacy\local\request\transform;
use core_privacy\local\request\userlist;
use context;
use context_module;
use core_privacy\local\request\approved_contextlist;
use core_privacy\local\request\writer;


require_once($CFG->dirroot . '/comment/lib.php');

/**
 * Privacy class for requesting user data.
 *
 */
class provider implements
        \core_privacy\local\metadata\provider,
        \core_privacy\local\request\subsystem\plugin_provider,
        \core_privacy\local\request\shared_userlist_provider {

    /**
     * Returns meta data about this system.
     *
     * @param   collection $collection The initialised collection to add items to.
     * @return  collection A listing of user data stored through this system.
     */
    public static function get_metadata(collection $collection) : collection {
        $collection->add_database_table('local_forum_review', [
                'post_id' => 'privacy:metadata:postid',
                'message' => 'privacy:metadata:message',
                'user_id' => 'privacy:metadata:userid',
                'subject' => 'privacy:metadata:subject',
                'discussion_id' => 'privacy:metadata:discussionid',
                'course_id' => 'privacy:metadata:courseid',
                'rating' => 'privacy:metadata:rating',
                'advice' => 'privacy:metadata:advice',
                'reject' => 'privacy:metadata:reject',
                'checked' => 'privacy:metadata:checked',
                'hate_detected' => 'privacy:metadata:hatedetected',
                'last_modified' => 'privacy:metadata:lastmodified',
                'checked_last_modified' => 'privacy:metadata:checkedlastmodified',
            ], 'privacy:metadata:localforumreview');
        return $collection;
    }


    /**
     * Get the list of contexts that contain user information for the specified user.
     *
     * @param   int $userid   The user to search.
     * @return  contextlist   $contextlist  The contextlist containing the list of contexts used in this plugin.
     */
    public static function get_contexts_for_userid(int $userid) : \core_privacy\local\request\contextlist {
        $contextlist = new \core_privacy\local\request\contextlist();

        $contextlist = new contextlist();

        $sql = "SELECT  u.id , fr.post_id
        FROM {forum_posts} p
        JOIN {user} u ON p.userid = u.id
        JOIN {local_forum_review} fr ON u.id = fr.user_id
        WHERE u.id = :iduser";
        $params = [
            'iduser' => $iduser,
        ];

        $contextlist->add_from_sql($sql, $params);
        return $contextlist;
    }

    /**
     * Delete completion information for users.
     *
     * @param \stdClass $iduser The user. If provided will delete completion information for just this user. Else all users.
     */
    public static function delete_completion_group_generator(\stdClass $iduser = null) {
        global $DB;

            $params = ['userid' => $iduser];
            $DB->delete_records('local_forum_review', $params);
            return;
    }
}

