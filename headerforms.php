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
 * Display information about all the local_forum_review in the requested course.
 *
 * @package     local_forum_review
 * @author      2022 Aina Palacios
 * @copyright   2022 Aina Palacios & Eurecat.dev
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/formslib.php");
/**
 * To selecta course form.
 */
class select_course extends moodleform {

    /**
     * Add elements to form.
     */
    public function definition() {
        // A reference to the form is stored in $this->form.
        // A common convention is to store it in a variable, such as `$mform`.
        $mform = $this->_form; // Don't forget the underscore!

        $courses = array();
        $getcourse = get_courses();

        foreach ($getcourse as $course) {
            $courses[$course->id] = $course->fullname;
        }
        $courses[0] = get_string('all_courses', 'local_forum_review');
        ksort($courses);

        $select = $mform->addElement('select', 'course', get_string('select_course', 'local_forum_review'), $courses);
        // This will select the colour blue.
        $select->setSelected(get_string('all_courses', 'local_forum_review'));

        $mform->setType('course', PARAM_INT);

        $alerts = [
            get_string('all_alerts', 'local_forum_review'),
            get_string('warning', 'local_forum_review'),
            get_string('danger', 'local_forum_review')
        ];
        $select = $mform->addElement('select', 'alert', get_string('alert', 'local_forum_review'), $alerts);
        $mform->setType('alert', PARAM_INT);
        $mform->addHelpButton('alert', 'alert', 'local_forum_review');

        $this->add_action_buttons(false, get_string('submit'));

    }

    /**
     * Validate the form data.
     * @param array $data
     * @param array $files
     * @return array|bool
     */
    public function validation($data, $files) {
        $errors = array();
        return $errors;
    }

    /**
     * Redirect to forum review.
     */
    public function reset() {
        redirect(new moodle_url('/local/forum_review'));
    }
}

