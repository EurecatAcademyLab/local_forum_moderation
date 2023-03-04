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
 *
 * Plugin version and other meta-data are defined here.
 * @package     local_forum_review
 * @author      2022 Aina Palacios
 * @copyright   2022 Aina Palacios & Eurecat.dev
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot. '/local/forum_review/table.php');
require_once($CFG->libdir.'/formslib.php');
require_login();

/**
 * Change values in forum_review and forum_posts table.
 * @param Int $id .
 * @return Void .
 */
function delete_modify_post($id) {

    global $DB;

    $record = new stdClass();
    $record->id = $id;
    $record->reject = 1;
    $record->checked = 1;
    $record->checked_last_modified = gettimestamp();

    if ($DB->record_exists('local_forum_review', array('id' => $record->id))) {
        $DB->update_record('local_forum_review', $record);
    }

    $recorddelete = new stdClass();
    $idpost = $DB->get_record_sql("SELECT f.post_id
                                    FROM {local_forum_review} f
                                    WHERE f.id = ?;", array($id));
    $recorddelete->id = $idpost->post_id;
    $recorddelete->deleted = 1;
    if ($DB->record_exists('forum_posts', array('id' => $recorddelete->id))) {
        $DB->update_record('forum_posts', $recorddelete);
    }
}

/**
 * To add hidden fields.
 */
class delete_post extends moodleform {

    /**
     * Add elements to form.
     */
    public function definition() {

        $mform = $this->_form;
        $mform->addElement('hidden', 'id');
        $mform->settype('id', PARAM_INT);
        $d = get_string("delete");
        $mform->addElement('submit', 'deletebutton_forum_review', $d, ['class' => 'deletebutton_forum_review m-1']);
    }

    /**
     * to redirect to forum_review
     * @return Void .
     */
    public function reset() {
        redirect(new moodle_url('/local/forum_review'));
    }
}

