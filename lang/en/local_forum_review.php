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
 * Plugin strings are defined here.
 *
 * @package     local_forum_review
 * @category    string
 * @author      2022 Aina Palacios
 * @copyright   2022 Aina Palacios & Eurecat.dev
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Forum Moderation';
$string['user'] = 'User: {$a}';
$string['subject'] = 'Subject: {$a}';
$string['discussion'] = 'Discussion: {$a}';
$string['forum'] = 'Forum: {$a}';
$string['course'] = 'Course : {$a}';
$string['rating'] = 'Rating : {$a}';
$string['forum_review:viewmessages'] = 'View all the messages from post DB';
$string['forum_review:deleteanymessages'] = 'Delete any message from post DB';
$string['forum_review:getpremium'] = 'Premium view';
$string['malware'] = 'Remove all malicious posts';

$string['select_course'] = 'Select a course';
$string['all_courses'] = 'All courses';
$string['hate_detected'] = 'Hate detected';
$string['message'] = 'Message';
$string['user'] = 'User';
$string['subject'] = 'Subject';
$string['discussion'] = 'Go to Discussion';
$string['forum'] = 'Forum';
$string['course'] = 'Course';
$string['advice'] = 'Advice';
$string['advice_des'] = 'The model detected some hate content. The advice is based on model detection. Check the context before taking any action.';
$string['advice_des_history'] = 'The model detected some hate content. The advice is based on model detection.';
$string['action'] = 'Action';
$string['action_des'] = 'This plugin removes the posts detected as <b>Danger</b>, to avoid hate content in the platform.
                The content detected as <b>Warning</b> will remain visible. If you click on <b>Accept</b> you will accept the content,
                which will be shown in the forum. If you click on <b>Delete</b> you will delete the content from the forum.';

$string['action_des_history'] = '<b>Accepted: </b>You accepted the content and it shows in the forum.<br>
                                <b>Deleted: </b>You deleted the content, and it shows in the forum as deleted content. It still exists in the original dataset.';

$string['posts'] = 'Posts';
$string['history'] = 'History';
$string['graphs'] = 'Graphs';

$string['no_action'] = 'No action';
$string['warning'] = 'Warning - Evaluate';
$string['danger'] = 'Danger - Remove';


$string['td'] = 'True detected';
$string['fd'] = 'False detected';
$string['cm'] = 'Confusion matrix detected';
$string['cm_des'] = "The confusion matrix is a visual representation of accuricy of the hate detection model. In green, you can see the correct detection, in red,
                    the detection that the reviewer selectet as not hate";

$string['taskUpdate'] = "Updating the posts";

$string['delete'] = "Delete";
$string['accept'] = "Accept";

$string['deleted'] = "Deleted";
$string['accepted'] = "Accepted";

$string['course_id'] = "Course ID";

$string['analytics'] = 'Analytics';

$string['alert'] = 'Select a specific advice alert';
$string['all_alerts'] = 'All alerts';
$string['alert_help'] = 'Select the advice alert that you want to see to filter the posts';

$string['printAnalysis'] = 'Screenshot the page';

$string['messageprovider:revision'] = 'Your post is in revision state because some Hate was detected';
$string['messageprovider:revised'] = 'Your post was already revised.';

$string['action_taked'] = 'Action taked';
$string['last_modified'] = 'Last modified';
$string['checked_last_modified'] = 'Revised at';
$string['hdtable'] = 'Hate detention table';
$string['hdgraph'] = 'Hate detention graph';

// Provider.
$string['privacy:metadata:postid'] = 'Post id from user';
$string['privacy:metadata:message'] = 'Message';
$string['privacy:metadata:userid'] = 'Id user';
$string['privacy:metadata:subject'] = 'Subject on forum';
$string['privacy:metadata:discussionid'] = 'Id discussion';
$string['privacy:metadata:courseid'] = 'Id course';
$string['privacy:metadata:rating'] = 'Rating';
$string['privacy:metadata:advice'] = 'Advice';
$string['privacy:metadata:reject'] = 'Reject';
$string['privacy:metadata:checked'] = 'Checked';
$string['privacy:metadata:hatedetected'] = 'Hate';
$string['privacy:metadata:lastmodified'] = 'Last modified';
$string['privacy:metadata:checkedlastmodified'] = 'check last modified';
$string['privacy:metadata:localforumreview'] = 'Table to save users forum detected';

// Premium.
$string['premium'] = '* Upgrade to Sentiment Analysis - Premium';
$string['premiumpage'] = 'Eurecat.Lab';
$string['keepquarentine'] = '* Add the posibility to keep the message in quarentine';
$string['removequarentine'] = '* Add the posibility to remove the message from quarentine';
$string['nopubli'] = '* No advertising';
$string['desblockanalytic'] = '* Unblocking the "Analytics" tab';
$string['desblockhistory'] = '* Unblocking the "History" tab';
$string['exportdata'] = '* Export results';
$string['rereview'] = '* Ability to review content already reviewed';

