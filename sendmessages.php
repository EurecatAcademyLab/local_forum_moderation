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

/**
 * To send post to re-evaluate.
 * @param Mixed $iduser .
 */
function send_post_to_revision($iduser) {

    $message = new \core\message\message();
    $message->component = 'local_forum_review'; // Your plugin's name.
    $message->name = 'revision'; // Your notification name from message.php.
    $message->userfrom = core_user::get_noreply_user(); // If the message is 'from' a specific user you can set them here.
    $message->userto = $iduser;
    $message->subject = 'message subject 1';
    $message->fullmessage = 'message body';
    $message->fullmessageformat = FORMAT_MARKDOWN;
    $message->fullmessagehtml = '<p>message body</p>';
    $message->smallmessage = 'small message';
    $message->notification = 1; // Because this is a notification generated from Moodle, not a user-to-user message.
    $message->contexturl = (new \moodle_url('/course/'))->out(false); // A relevant URL for the notification.
    $message->contexturlname = 'Course list'; // Link title explaining where users get to for the contexturl.

    $messageid = message_send($message);
}

