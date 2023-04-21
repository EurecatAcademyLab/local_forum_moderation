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
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Forum Moderation';
$string['pluginnameextra'] = '(Free version)';
$string['developed'] = 'Developed by:';
$string['eurecat'] = 'Eurecat Academy';
$string['moderation'] = 'Forum Moderation';
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

// Tabs.
$string['posts'] = 'Posts';
$string['history'] = 'History';
$string['graphs'] = 'Graphs';
$string['about'] = 'About Us';

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

// Table.
$string['action_taked'] = 'Action taked';
$string['last_modified'] = 'Last modified';
$string['checked_last_modified'] = 'Revised at';
$string['count'] = 'Count';
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
$string['premium'] = '* Upgrade to Forum Moderation - Premium';
$string['premiumpage'] = 'Eurecat Academy Lab';
$string['keepquarentine'] = '* Add the posibility to keep the message in quarentine';
$string['removequarentine'] = '* Add the posibility to remove the message from quarentine';
$string['nopubli'] = '* No advertising';
$string['desblockanalytic'] = '* Unblocking the "Analytics" & "History" tab';
$string['desblockhistory'] = '* Unblocking the "History" tab';
$string['exportdata'] = '* Export results';
$string['rereview'] = '* Ability to review content already reviewed';
$string['phrase'] = 'This functionality is only available in the premium version';

// Settings.
$string['email'] = 'Email';
$string['email_des'] = 'Insert the Email';
$string['manage'] = 'Manage Forum Moderation';
$string['showinnavigation'] = 'Show navegation';
$string['showinnavigation_desc'] = 'When enabled, the site navegation will display a link to Sentiment Analysis';
$string['apikey'] = 'APIKey';
$string['apikey_des'] = 'Insert the APIKey';
$string['name'] = 'Name';
$string['name_des'] = 'Insert your User name';
$string['time'] = 'Time';
$string['time_des'] = 'Time';
$string['url'] = 'Url';
$string['url_des'] = 'Actual url';
$string['privacy'] = 'Accept terms and conditions';
$string['privacy_des'] = 'Accept conditions';
$string['privacy_policy'] = 'Privacy policy';
$string['email_cannot_be_empty'] = 'The Email field cannot be empty';
$string['activate'] = 'Activate';
$string['error_empty_field'] = 'This field can be empty';
$string['placeholder_text'] = '123456789';

// About us.
$string['aboutus'] = "Eurecat Academy is the training department of Eurecat Technology Centre (www.eurecat.org). As a full-fledged training, content creation, and education consultancy services provider, we specialize in developing effective e-learning solutions through our software division.

At Eurecat Academy, we bring together a multidisciplinary team of experts with a passion for improving people's abilities. Our team's expertise ranges from instructional design to technical development to offer solutions that optimize our clients' training activities.

Our purpose is to offer solutions with the ability to generate a positive impact on individuals and entities, providing them with effective tools to optimize their training activities. We aspire for everyone to unleash their maximum potential and contribute to personal and professional progress, for their own well-being and their contribution to social development.";

// Description.
$string['Describ'] = "Describing the plugin";
$string['Describtion'] = "The multilanguage plugin is designed to assist forum moderators in identifying potentially inappropriate or harmful content and preventing misuse by automating certain decisions.

The module offers highly accurate automated moderation of forums, and can quarantine the most problematic messages until they are reviewed by a moderator. The plugin also provides a variety of rules and actions to simplify the moderation process.";

$string['more'] = "More details";
$string['moreinfo'] = "When a user posts a message in any forum, the plugin will read the content, save the result and depending on the detected level will perform one of the following actions:";

$string['moreinfo1'] = "If the detected level is 1 - 'Warning', it will consider that the content should be reviewed by a subjective authority. Therefore it will show the local plugin for a review.";

$string['moreinfo2'] = "If the detected level is 2 - 'Danger', it will consider that this content should not be on the platform and will therefore be quarantined. This quarantine consists of removing the message until a reviewer determines if a final removal is necessary or if, for context, the detected message can be determined as an exception.";

$string['moreinfo3'] = "Messages determined to be 'Danger' will be prevented from accessing the message and will be marked as unavailable.

It will be necessary for the authorized user to certify these messages and give approval for each one, having the possibility to accept or reject the module's suggestion. As the messages depend on their context, the reviewer has the possibility to view the message within the discussion to decide if it is appropriate.

The module offers important information to forum moderators. This includes the user who posted the message, the course it was posted in, the reasons why the message has been quarantined, a link to the discussion for context, and a suggestion on how to proceed. For example, if the message is deemed 'Danger' level, the suggestion might be to delete it, while if it is 'Warning' level, the suggestion might be to review it.

The plugin provides customization controls for tailoring its functionality and can be configured to operate at varying levels of accuracy based on the selected service level agreement.";
$string['regard'] = "Regarding the AI approach";
$string['regarding'] = "This tool uses AI models to detect hate speech, such as language models like Moderation by OpenAI (https://platform.openai.com/docs/models/moderation) and open ones. It is designed to be as ethical and responsible as possible. The tools using these models are developed with a strong emphasis on privacy and data protection, and are designed to ensure that user data is handled with the utmost care and respect.

The development team of the plugin is committed to continuously improving the ethical standards of their product. To achieve this, they are actively working on applying new ethical toolboxes and guidelines to their development process. These toolboxes and guidelines are designed to help the team identify and address ethical concerns and considerations throughout the entire product lifecycle, from conception to implementation. 

The AI models selected to be used are typically trained on large datasets that have been carefully curated to ensure that they are representative and diverse. This means that the models are not biased towards any particular group or ideology, and that they are capable of identifying hate speech in all its forms, regardless of who is speaking or what they are saying. More information can be found here: https://platform.openai.com/docs/guides/moderation/overview.


It's important to note that tools with enhanced functionality provided by AI models are never perfect and should be used in conjunction with human moderation and oversight. This helps to ensure that any potential errors or biases are caught and corrected before they have a chance to cause harm. The overall design and user interface of this tool is intended to assist human forum moderators, with final decisions left to human judgment.";

