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
 * @package     local_forum_review
 * @author      2022 Aina Palacios
 * @copyright   2022 Aina Palacios & Eurecat.dev
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot. '/local/forum_review/query.php');
/**
 * To create a Chart displaying the table.
 * @param Int $courseid
 * @return String with the chart.
 */
function graph($courseid) {

    global $DB, $OUTPUT, $CFG;
    $output = "";

    $rd = $DB->get_records_sql(forum_review_query_all($courseid));

    $advice = array('no_action' => 0, 'warning' => 0, 'danger' => 0);
    $confusionmatrixtrue = array('true_danger' => 0, 'true_warning' => 0);
    $confusionmatrixfalse = array('false_danger' => 0, 'false_warning' => 0);
    foreach ($rd as $key => $value) {
        $advice[$value->advice] += 1;

        if ($value->checked && $value->rating != 0) {
            switch ([$value->reject, $value->advice]) {
                case [0, 'warning']:
                    $confusionmatrixfalse['false_warning'] += 1;
                break;

                case [1, 'warning'];
                    $confusionmatrixtrue['true_warning'] += 1;
                break;

                case [0, 'danger']:
                    $confusionmatrixfalse['false_danger'] += 1;
                break;

                case [1, 'danger'];
                    $confusionmatrixtrue['true_danger'] += 1;
                break;
            }
        }
    }

    $output .= html_writer::tag('div', get_string('graphs', 'local_forum_review'), ['class' => 'h3 m-5 border-bottom']);

    $output .= '<div class="row"> <div class="col">';

    $CFG->chart_colorset = ['lightblue', '#ff9966', '#cc3300'];
    $chart = new \core\chart_pie();
    $recom = new core\chart_series(get_string('hate_detected', 'local_forum_review'), array_values($advice));

    $htmlcontentadvice = '<div class="no-overflow">'.get_string('advice_des', 'local_forum_review').'</div>';
    $arr = [
        'class' => 'btn btn-link float-right',
        'role' => "button",
        'data-container' => "body",
        'data-toggle' => "popover",
        'data-placement' => "right",
        "data-content" => $htmlcontentadvice,
        'data-html' => "true",
        'tabindex' => "0",
        'data-trigger' => "focus"
    ];
    $advice = html_writer::start_tag('a', $arr);
    $advice .= html_writer::tag('i', "", ["class" => 'fa fa-question-circle fa-1x text-info', 'role' => "img"] );
    $advice .= html_writer::end_tag('a');
    $output .= $advice;

    $chart->set_title(get_string('advice', 'local_forum_review'));

    $chart->add_series($recom); // On pie charts we just need to set one series.
    $chart->set_labels([
        get_string('no_action', 'local_forum_review'),
        get_string('warning', 'local_forum_review'),
        get_string('danger', 'local_forum_review')
    ]);
    $output .= $OUTPUT->render($chart);

    $output .= '</div> <div class="col">';

    $CFG->chart_colorset = ['#cc3300', '#99cc33'];
    $chart = new core\chart_bar();
    $chart->set_stacked(true);
    $cmtrue = new core\chart_series(get_string('td', 'local_forum_review'), array_values($confusionmatrixtrue));
    $chart->add_series($cmtrue);
    $cmfalse = new core\chart_series(get_string('fd', 'local_forum_review'), array_values($confusionmatrixfalse));
    $chart->add_series($cmfalse);

    $htmlcontentcm = '<div class="no-overflow">'.get_string('cm_des', 'local_forum_review').'</div>';
    $cm = html_writer::start_tag('a', [
        'class' => 'btn btn-link float-right',
        'role' => "button",
        'data-container' => "body",
        'data-toggle' => "popover",
        'data-placement' => "right",
        "data-content" => $htmlcontentcm,
        'data-html' => "true",
        'tabindex' => "0",
        'data-trigger' => "focus"
    ]);
    $cm .= html_writer::tag('i', "", ["class" => 'fa fa-question-circle fa-1x text-info', 'role' => "img"] );
    $cm .= html_writer::end_tag('a');
    $output .= $cm;

    $chart->set_title(get_string('cm', 'local_forum_review'));
    $chart->set_labels([get_string('warning', 'local_forum_review'), get_string('danger', 'local_forum_review')]);
    $output .= $OUTPUT->render($chart);

    $output .= '</div></div>';

    return $output;
}

