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
 * Display information about all the local_forum_moderation premium version.
 *
 * @package     local_forum_moderation
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
class premium_form extends moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        global $OUTPUT;

        $output = '';
        // Start with the object form.
        $url = 'https://lab.eurecatacademy.org';

        $output .= html_writer::start_tag('div');
            $output .= html_writer::tag('h4', get_string('phrase', 'local_forum_moderation'));
        $output .= html_writer::end_tag('div');

        $output .= html_writer::start_tag('div', ['class' => 'd-flex justify-content-center mt-4']);
        $output .= html_writer::start_tag('div',
        ['style' => 'background-image: linear-gradient(to bottom left, #465f9b, #755794, #6d76ae);',
        'class' => 'border mt-5 flex-column rounded pt-4 pb-3 w-100']);
        $output .= html_writer::tag('h4',
            get_string('premium', 'local_forum_moderation'),
            array('class' => 'titol d-flex justify-content-center text-light font-weight-normal mb-4'));

        $output .= html_writer::start_tag('div', ['class' => 'row']);

        $output .= html_writer::start_tag('div', ['class' => 'col-md-4 d-flex justify-content-around']);
        $output .= html_writer::start_tag('div');
        $output .= html_writer::start_tag('ul');

            $output .= html_writer::start_tag('li', array('style' => 'list-style-type: none;'));
            $output .= html_writer::tag('p', get_string('keepquarentine', 'local_forum_moderation'), ['class' => 'text-light']);
            $output .= html_writer::end_tag('li');

            $output .= html_writer::start_tag('li', array('style' => 'list-style-type: none;'));
            $output .= html_writer::tag('p', get_string('nopubli', 'local_forum_moderation'), ['class' => 'text-light']);
            $output .= html_writer::end_tag('li');

            $output .= html_writer::start_tag('li', array('style' => 'list-style-type: none;'));
            $output .= html_writer::tag('p', get_string('desblockanalytic', 'local_forum_moderation'), ['class' => 'text-light']);
            $output .= html_writer::end_tag('li');

        $output .= html_writer::end_tag('ul');
        $output .= html_writer::end_tag('div');
        $output .= html_writer::end_tag('div');

        $output .= html_writer::start_tag('div', ['class' => 'col-md-4']);
        $output .= html_writer::start_tag('div');
        $output .= html_writer::start_tag('ul');

            $output .= html_writer::start_tag('li', array('style' => 'list-style-type: none;'));
            $output .= html_writer::tag('p', get_string('rereview', 'local_forum_moderation'), ['class' => 'text-light']);
            $output .= html_writer::end_tag('li');

            $output .= html_writer::start_tag('li', array('style' => 'list-style-type: none;'));
            $output .= html_writer::tag('p', get_string('exportdata', 'local_forum_moderation'), ['class' => 'text-light']);
            $output .= html_writer::end_tag('li');

            $output .= html_writer::start_tag('li', array('style' => 'list-style-type: none;'));
            $output .= html_writer::tag('p', get_string('removequarentine', 'local_forum_moderation'), ['class' => 'text-light']);
            $output .= html_writer::end_tag('li');

        $output .= html_writer::end_tag('ul');
        $output .= html_writer::end_tag('div');
        $output .= html_writer::end_tag('div');

        $output .= html_writer::start_tag('div', ['class' => 'd-flex justify-content-center mt-3 mx-5']);
        $options = ['class' => 'hatebtn', 'target' => '_blank'];
            $output .= $OUTPUT->single_button($url,
                get_string('premiumpage', 'local_forum_moderation'), 'post', $options);
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


