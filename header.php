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
 * html render.
 *
 * @package     local_forum_moderation
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');
require_login();

/**
 * To create a html.
 * @param Mixed $courseselected .
 * @return String html header.
 */
function html_header($courseselected) {
    global $CFG;

    $output = "";

    if ($courseselected != '0') {
        if (!is_null($courseselected)) {

            $output .= html_writer::start_tag('div', ['class' => 'w-100 text-center']);
            $output .= html_writer::tag('hr', '');
            $course = get_string('course', 'local_forum_moderation') . get_name_course($courseselected)->name;
            $output .= html_writer::tag('span', $course, ['class' => 'h1 p-3 center']);
            $output .= html_writer::start_tag('a', ['href' => $CFG->wwwroot.'/course/view.php?id='.$courseselected]);
            $output .= html_writer::tag('i', '', ['class' => 'fa fa-link p-1']);
            $output .= html_writer::end_tag('a');
            $output .= html_writer::end_tag('div');
        }
    }

    return $output;

}

