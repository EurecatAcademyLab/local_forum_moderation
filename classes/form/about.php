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
 * About us - Eurecat dev
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
class about_form extends moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        global $OUTPUT;

        $output = '';
        // Start with the object form.
        $lab = 'https://lab.eurecatacademy.org';
        $eurecat = '<a href="'.$lab.'" target="_blank">'.get_string('eurecat', 'local_forum_moderation').'</a>';

        $output .= html_writer::start_tag('div', ['class' => 'mt-5 d-flex']);
            $output .= html_writer::tag('h4', get_string('developed', 'local_forum_moderation').' '.$eurecat);
            $output .= html_writer::empty_tag('img', array('src' => "pix/eurecat_academy_logo.png", 'style' => 'width: 5%'));
        $output .= html_writer::end_tag('div');

        $output .= html_writer::start_tag('div');

            $output .= html_writer::tag('h5', get_string('Describ', 'local_forum_moderation'), ['class' => 'mt-5']);
            $output .= html_writer::tag('p', get_string('Describtion', 'local_forum_moderation'));

            $output .= html_writer::tag('h6', get_string('more', 'local_forum_moderation'), ['class' => 'mt-3']);
            $output .= html_writer::tag('p', get_string('moreinfo', 'local_forum_moderation'));
            $output .= html_writer::tag('p', get_string('moreinfo1', 'local_forum_moderation'));
            $output .= html_writer::tag('p', get_string('moreinfo2', 'local_forum_moderation'));
            $output .= html_writer::tag('p', get_string('moreinfo3', 'local_forum_moderation'));
            $output .= html_writer::tag('p', get_string('moreinfo4', 'local_forum_moderation'), ['class' => 'mb-3']);

            $output .= html_writer::tag('h5', get_string('userprivate', 'local_forum_moderation'), ['class' => 'mt-5']);
            $output .= html_writer::tag('p', get_string('userprivate1', 'local_forum_moderation'));
            $output .= html_writer::tag('p', get_string('userprivate2', 'local_forum_moderation'));
            $gs = get_string('information', 'local_forum_moderation');
            $urlprivacity = 'https://eurecat.org/en/privacy-policy';
            $privacity = '<a href="'.$urlprivacity.'" target="_blank"><small>'.$gs.'</small></a>';
            $output .= html_writer::tag('p', get_string('userprivate3', 'local_forum_moderation').' '.$privacity, ['class' => 'mb-3']);

            $output .= html_writer::tag('h5', get_string('regard', 'local_forum_moderation'), ['class' => 'mt-5']);
            $urlmoderation = 'https://platform.openai.com/docs/models/moderation';
            $urlmoderation = '<a href="'.$urlmoderation.'" target="_blank"><small>'.
            get_string('moderation', 'local_forum_moderation').'</small></a>';
            $output .= html_writer::tag('p',
            get_string('regarding', 'local_forum_moderation').' '.$urlmoderation .' '. get_string('regarding1', 'local_forum_moderation'));
            $output .= html_writer::tag('p', get_string('regarding2', 'local_forum_moderation'));
            $urlguides = 'https://platform.openai.com/docs/models/moderation';
            $urlguides = '<a href="'.$urlguides.'" target="_blank"><small>'.
            get_string('guides', 'local_forum_moderation').'</small></a>';
            $output .= html_writer::tag('p', get_string('regarding3', 'local_forum_moderation').' '. $urlguides);
            $output .= html_writer::tag('p', get_string('regarding4', 'local_forum_moderation'), ['class' => 'mb-3']);

            $urlorg = 'https://eurecatacademy.org';
            $urlorg = '<a href="'.$urlorg.'" target="_blank"><small>'.get_string('eurecatorg', 'local_forum_moderation').'</small></a>';
            $output .= html_writer::tag('h5', get_string('academytitle', 'local_forum_moderation'), ['class' => 'mt-5']);
            $output .= html_writer::tag('p', get_string('aboutus', 'local_forum_moderation').' '.$urlorg);
            $output .= html_writer::tag('p', get_string('aboutus1', 'local_forum_moderation'));
            $output .= html_writer::tag('p', get_string('aboutus2', 'local_forum_moderation'));
            $output .= html_writer::tag('p', get_string('aboutus3', 'local_forum_moderation'));

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


