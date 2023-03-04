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

require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot. '/local/forum_review/table.php');
require_once($CFG->dirroot. '/local/forum_review/updatedb.php');
require_login();

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

    if ($DB->record_exists('local_forum_review', array('id' => $record->id))) {
        $DB->update_record('local_forum_review', $record);
    }
    return;
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
        $mform->addElement('hidden', 'id');
        $mform->settype('id', PARAM_INT);
        $mform->addElement('hidden', 'post_id');
        $mform->settype('post_id', PARAM_INT);
        $acp = get_string("accept");
        $mform->addElement('submit', 'acceptbutton_forum_review', $acp, ['class' => 'acceptbutton_forum_review m-1']);
    }

    /**
     * To redirect to que initial page forum_review.
     */
    public function reset() {
        redirect(new moodle_url('/local/forum_review'));
    }

}

