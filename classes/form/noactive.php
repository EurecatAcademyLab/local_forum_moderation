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
 * No active - Eurecat dev
 *
 * @package     local_forum_review
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/lib/formslib.php');
require_once("$CFG->dirroot/enrol/locallib.php");

$idcourse = optional_param('idcourse', null, PARAM_INT);

/**
 * Class form to create a customisable filter or personal filter.
 */
class noactive_form extends moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        global $OUTPUT;

        $output = '';
        // Start with the object form.
        $url = 'https://lab.eurecatacademy.org';

        $output .= html_writer::start_tag('div', ['class' => 'd-flex justify-content-center mt-4']);
        $output .= html_writer::start_tag('div',
        ['style' => 'background-image: linear-gradient(to bottom left, #465f9b, #755794, #6d76ae);',
        'class' => 'border mt-5 flex-column rounded pt-4 pb-3 w-100']);

        $output .= html_writer::start_tag('div', ['class' => 'd-flex justify-content-center p-3']);
            $output .= html_writer::tag('h5', get_string('noactive', 'local_forum_review'), ['class' => 'text-white']);
        $output .= html_writer::end_tag('div');

        $output .= html_writer::start_tag('div', ['class' => 'd-flex justify-content-center mt-3 mx-5']);
            $options = ['class' => 'hatebtn', 'target' => '_blank'];
            $output .= $OUTPUT->single_button($url,
                get_string('premiumpage', 'local_forum_review'), 'post', $options);
        $output .= html_writer::end_tag('div');

        $output .= html_writer::end_tag('div');
        $output .= html_writer::end_tag('div');

        return $output;
    }

    /**
     * Extend the form definition after data has been parsed.
     */
    public function definition_after_data() {
        global $USER, $CFG, $DB, $OUTPUT;
        $mform = $this->_form;
    }

    /**
     * Validate the form data.
     * @param array $usernew
     * @param array $files
     * @return array|bool
     */
    public function validation($usernew, $files) {
        global $CFG, $DB;
        return true;
    }
}


