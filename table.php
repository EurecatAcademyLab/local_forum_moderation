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
 * Display Principal Table.
 *
 * @package     local_forum_review
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot. '/local/forum_review/lib.php');
require_once($CFG->dirroot. '/local/forum_review/delete.php');
require_once($CFG->dirroot. '/local/forum_review/accept.php');
require_login();

/**
 * Display the table with all data.
 * @param Mixed $courseselected .
 * @param Mixed $checked .
 * @param Mixed $alertselected .
 * @return Object table html_write.
 */
function table($courseselected, $checked, $alertselected) {

    global $DB , $CFG;
    $route = $CFG->wwwroot;
    $cl = "text-info";

    $sql = forum_review_query($courseselected, $checked, $alertselected);
    if ($sql != ';') {
        $messages = $DB->get_records_sql($sql);
    } else {
        $messages = [];
    }

    if (empty($messages)) {
        echo '';
    } else {

        $table = new html_table();
        $table->width = '100%';

        $table->id = 'tablePost'.$checked;
        $table->class = 'table table-striped table-bordered table-sm';

        // Header.
        $htmlcontentadvice = ($checked == 1)
            ? '<div class="no-overflow">'.get_string('advice_des_history', 'local_forum_review').'</div>'
            : '<div class="no-overflow">'.get_string('advice_des', 'local_forum_review').'</div>';
        $advice = get_string('advice', 'local_forum_review');
        $advice .= html_writer::start_tag('a', [
            'class' => 'btn btn-link p-0',
            'role' => "button",
            'data-container' => "body",
            'data-toggle' => "popover",
            'data-placement' => "right",
            "data-content" => $htmlcontentadvice,
            'data-html' => "true",
            'tabindex' => "0",
            'data-trigger' => "focus"
        ]);
        $advice .= html_writer::tag('i', "", ["class" => 'icon fa fa-question-circle text-info fa-fw', 'role' => "img"] );
        $advice .= html_writer::end_tag('a');

        $htmlcontentaction = ($checked == 1)
            ? '<div class="no-overflow">'.get_string('action_des_history', 'local_forum_review').'</div>'
            : '<div class="no-overflow">'.get_string('action_des', 'local_forum_review').'</div>';
        $ac = get_string('action', 'local_forum_review');
        $at = get_string('action_taked', 'local_forum_review');
        $action = '<span>'.(($checked == 1) ? $at : $ac);
        $arr = [
            'class' => 'btn btn-link p-0',
            'role' => "button",
            'data-container' => "body",
            'data-toggle' => "popover",
            'data-placement' => "right",
            "data-content" => $htmlcontentaction,
            'data-html' => "true",
            'tabindex' => "0",
            'data-trigger' => "focus"
        ];
        $action .= html_writer::start_tag('a', $arr);
        $action .= html_writer::tag('i', "", ["class" => 'icon fa fa-question-circle text-info fa-fw', 'role' => "img"]);
        $action .= html_writer::end_tag('a');
        $action .= html_writer::end_tag('span');

        if (is_null($courseselected) || $courseselected == 0) {
            $table->align = ['left', 'left', 'left', 'center', 'center', 'center', 'right', 'center', 'center'];
            $table->head = [
                get_string('user', 'local_forum_review'),
                get_string('count', 'local_forum_review'),
                get_string('hate_detected', 'local_forum_review'),
                get_string('message', 'local_forum_review'),
                get_string('subject', 'local_forum_review'),
                get_string('discussion', 'local_forum_review'),
                get_string('forum', 'local_forum_review'),
                get_string('course', 'local_forum_review')
            ];
        } else {
            $table->align = ['left', 'left', 'left', 'center', 'center', 'center', 'center', 'center'];
            $table->head = [
                get_string('user', 'local_forum_review'),
                get_string('count', 'local_forum_review'),
                get_string('hate_detected', 'local_forum_review'),
                get_string('message', 'local_forum_review'),
                get_string('subject', 'local_forum_review'),
                get_string('discussion', 'local_forum_review'),
                get_string('forum', 'local_forum_review')
            ];

        }
        if ($checked == 1) {
            array_push($table->head, get_string('checked_last_modified', 'local_forum_review'));
        }
        array_push($table->head, get_string('last_modified', 'local_forum_review'), $advice, $action);

        foreach ($messages as $m) {

            // User name.
            $nameuser = get_name_user($m->user_id);
            $us = $route.'/user/profile.php?id='.$m->user_id;
            $user = '<a href="'.$us.'" class='.$cl.' target="_blank"><strong>'.$nameuser.'</strong></a>';

            // Count.
            $count = intval($m->count_user);

            // Hate detected.
            $detected = explode(",", $m->hate_detected); // Array.
            $detected = array_unique($detected); // Array único.
            $detected = implode(", ", $detected);

            // Discussion.
            $name = $DB->get_record_sql("SELECT fd.name FROM {forum_discussions} fd WHERE fd.id = ?;", array($m->discussion_id));
            $disc = $route.'/mod/forum/discuss.php?d='.$m->discussion_id;
            $discussion = '<a href="'.$disc.'" class='.$cl.' target="_blank"><strong>'.$name->name.'</strong></a>';

            // Forum.
            $name = $DB->get_field('forum', 'name', ['id' => $m->forum_id]);
            $foru = $route.'/mod/forum/view.php?id='.$m->forum_id;
            $forum = '<a href="'.$foru.'" class='.$cl.' target="_blank"><strong>'.$name.'</strong></a>';

            // Recommendation.
            $m->advice = '<strong>'. get_string($m->advice, 'local_forum_review') . '</strong>';

            // Button.
            $id = intval($m->id);
            $postid = intval($m->post_id);
            $accept = get_string('accepted', 'local_forum_review');
            if ($checked == 1) {
                if ($m->reject) {
                    $cl1 = "btn rounded-lg btn-outline-danger disabled";
                    $delete = '<p class='.$cl1.' aria-disabled="true" >'.get_string('deleted', 'local_forum_review').' </p>';
                } else {
                    $delete = '<p class="btn rounded-lg btn-outline-success disabled" aria-disabled="true"> '.$accept.' </p>';
                }

            } else {
                // Delete button.
                $dform = new delete_post();
                if ($fromform = $dform->get_data()) {
                    require_sesskey();
                    delete_modify_post($fromform->id);
                    $dform->reset();
                } else {
                    $param = new stdClass();
                    $param->id = $id;
                    $dform->set_data($param);
                    $deletebutton = $dform->render();
                }

                $aform = new accept_post();
                if ($fromforma = $aform->get_data()) {
                    require_sesskey();
                    reject_modify_post($fromforma->id, $fromforma->post_id);
                    $aform->reset();

                } else {
                    $param = new stdClass();
                    $param->id = $id;
                    $param->post_id = $postid;
                    $aform->set_data($param);
                    $acceptbutton = $aform->render();
                }

                $delete = $acceptbutton.''.$deletebutton;
            }

            $lastmodified = date('m/d/Y H:i', $m->last_modified);

            if (is_null($courseselected) || $courseselected == 0) {
                // Course.
                $name = get_name_course($m->course_id);
                $cours = $route.'/course/view.php?id='.$m->course_id;
                $course = '<a href="'.$cours.'" class='.$cl.' target="_blank"><strong>'.$name.'</strong></a>';
                $arraydata = [$user, $count, $detected, $m->message, $m->subject , $discussion , $forum ,  $course, $lastmodified];
            } else {
                $arraydata = [$user, $count, $detected, $m->message, $m->subject , $discussion , $forum , $lastmodified];

            }

            if ($checked == 1) {
                array_push($arraydata, date('m/d/Y H:i:s', $m->checked_last_modified));
            }
            array_push($arraydata, $m->advice , $delete);

            $table->data[] = $arraydata;
        }
        return html_writer::table($table);

    }
}

