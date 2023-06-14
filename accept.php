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
 * Form to accept button
 *
 * @package     local_forum_moderation
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot. '/local/forum_moderation/table.php');
require_once($CFG->dirroot. '/local/forum_moderation/updatedb.php');
require_login();


$page = new moodle_page();
$page->requires->js('/local/forum_moderation/amd/modalwindow.js');

/**
 * To call two other function
 * @param Int $id .
 * @param Int $postid .
 */
function reject_modify_post($id, $postid) {
    reject_quarantine_query($postid);
    reject_checked_query($id);
}

/**
 * To reject from user those post that don't have to be in quarentine.
 * @param Int $postid .
 * @return Void .
 */
function reject_quarantine_query($postid) {
    global $DB;

    $record = new stdClass();
    $record->id = $postid;
    $record->deleted = 0;
    if ($DB->record_exists('forum_posts', array('id' => $record->id))) {
        $DB->update_record('forum_posts', $record);
    }
    return;
}

/**
 * To get the message uncheck and start again the process.
 * @param Int $id .
 * @return Void .
 */
function reject_checked_query($id) {
    global $DB;

    $record = new stdClass();
    $record->id = $id;
    $record->checked = 1;
    $record->checked_last_modified = gettimestamp();

    if ($DB->record_exists('local_forum_moderation', array('id' => $record->id))) {
        $DB->update_record('local_forum_moderation', $record);
    }
    return;
}

/**
 * To create a modal window "Get premium".
 */
function banner_accept() {
    global $PAGE;
    $PAGE->requires->js('/local/forum_moderation/amd/modalwindow.js');
    $PAGE->requires->js_init_call('createmodalforum()');
}

/**
 * To past some hidden fields in the submit.
 */
class accept_post extends moodleform {
    
    /**
     * To Define the form accept.
     */
    public function definition() {
        $mform = $this->_form;
        $accept = get_string("accept");
        $mform->addElement('submit',
        'acceptbutton_forum_moderation',
        $accept,
        ['class' => 'acceptbutton_forum_moderation m-1']);
    }
    

    /**
     * To redirect to que initial page forum_moderation.
     */
    public function reset() {
        redirect(new moodle_url('/local/forum_moderation'));
    }


}

