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

require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot. '/local/forum_review/lib.php');
require_once($CFG->dirroot. '/local/forum_review/header.php');
require_once($CFG->dirroot. '/local/forum_review/table.php');
require_once($CFG->dirroot. '/local/forum_review/query.php');
require_once($CFG->dirroot. '/local/forum_review/updatedb.php');
require_once($CFG->dirroot. '/local/forum_review/graphs.php');
require_once($CFG->dirroot. '/local/forum_review/truncateforum.php');
require_once($CFG->dirroot. '/local/forum_review/headerforms.php');


global $CFG, $OUTPUT, $USER, $SITE, $PAGE;

$PAGE->requires->jquery();
$PAGE->requires->js(new \moodle_url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js'), true);
$PAGE->requires->js(new \moodle_url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js'), true);
$urlbase = 'https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3';
$urldt = $urlbase.'/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/datatables.min.js';
$PAGE->requires->js(new \moodle_url($urldt), true);
$PAGE->requires->css(new \moodle_url($urlbase.'/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/datatables.min.css'));
$PAGE->requires->js(new \moodle_url('https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js'), true);
$PAGE->requires->css(new \moodle_url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'));
$PAGE->requires->js(new moodle_url('/local/forum_review/amd/table.js'));

$PAGE->requires->css('/local/forum_review/styles/main.css');

$pluginname = 'forum_review';

$homeurl = new moodle_url('/');
require_login();

if (!is_siteadmin() && $datos->teacher == 0) {
    redirect($homeurl, "This feature is only available for site administrators.", 5);
}

// URL Parameters.
// There are none.
// Heading ==========================================================.

$title = get_string('pluginname', 'local_'.$pluginname);
$heading = get_string('pluginname', 'local_'.$pluginname);
$url = new moodle_url('/local/'.$pluginname.'/');
if ($CFG->version >= 2013051400) { // Moodle 2.5+.
    $context = context_system::instance();
} else {
    $context = get_system_context();
}

$PAGE->set_pagelayout('admin');
$PAGE->set_url($url);
$PAGE->set_context($context);
$PAGE->set_title($title);
$PAGE->set_heading($heading);

if (!$site = get_site()) {
    error("Site isn't defined!");
}

if (!empty($USER->newadminuser)) {
    ignore_user_abort(true);
    $PAGE->set_course($SITE);
    $PAGE->set_pagelayout('maintenance');
} else {
    $PAGE->set_context(context_system::instance());
    $PAGE->set_pagelayout('admin');
}

$renderer = $PAGE->get_renderer('core_enrol');

// Add capability in your plugin, to delete any post.
$allowview = has_capability('local/forum_review:viewmessages', context_system::instance());

echo $OUTPUT->header();

if ($allowview) {

    $output = "";

    $dform = new select_course();

    $courseselected = null;
    $alertselected = 0;

    if ($fromform = $dform->get_data()) {
        require_sesskey();
        $courseselected = $fromform->course;
        $alertselected = $fromform->alert;
        $dform->display();
    } else {
        $dform->display();
    }

    $output .= html_header($courseselected);

    $output .= html_writer::start_tag('div', ['class' => 'pt-2']);
    $output .= html_writer::start_tag('ul', ["class" => 'nav nav-tabs', 'role' => "tablist"]);
        $output .= html_writer::start_tag('li', ['class' => 'nav-item waves-effect waves-light']);
            $output .= html_writer::tag('a', get_string('posts', 'local_forum_review'), [
                'class' => 'nav-link active',
                'data-toggle' => "tab",
                'href' => "#postsTab"
            ]);
        $output .= html_writer::end_tag('li');
        $output .= html_writer::start_tag('li', ['class' => 'nav-item waves-effect waves-light']);
            $output .= html_writer::tag('a', get_string('history', 'local_forum_review'), [
                'class' => 'nav-link',
                'data-toggle' => "tab",
                'href' => "#history"
            ]);
        $output .= html_writer::end_tag('li');
        $output .= html_writer::start_tag('li', ['class' => 'nav-item waves-effect waves-light']);
            $output .= html_writer::tag('a', get_string('analytics', 'local_forum_review'), [
                'class' => 'nav-link',
                'data-toggle' => "tab",
                'href' => "#graphs"
            ]);
        $output .= html_writer::end_tag('li');
    $output .= html_writer::end_tag('ul');
    $output .= html_writer::end_tag('div');

    $output .= html_writer::start_tag('div', ['class' => 'tab-content']);
        $output .= html_writer::start_tag('div', ['class' => 'tab-pane fade show active', 'id' => 'postsTab']);
            $output .= html_writer::start_tag('div', ['class' => 'p-1 mt-4']);
            $output .= table($courseselected, 0, $alertselected);
            $output .= html_writer::end_tag('div');
        $output .= html_writer::end_tag('div');
        $output .= html_writer::start_tag('div', ['class' => 'tab-pane fade mt-4', 'id' => 'history']);
            $output .= table($courseselected, 1, $alertselected);
        $output .= html_writer::end_tag('div');
        $output .= html_writer::start_tag('div', ['class' => 'tab-pane fade', 'id' => 'graphs']);
            $output .= graph($courseselected);
            $output .= html_writer::tag('i', '', ['class' => 'fa fa-print']);
            $output .= html_writer::tag('a', '  '.  get_string('printAnalysis', 'local_forum_review'), [
                'href' => '#',
                'class' => 'mt-3',
                'onclick' => 'print()',
                'role' => 'button'
            ]);
        $output .= html_writer::end_tag('div');
    $output .= html_writer::end_tag('div');

    echo $output;
}

echo $OUTPUT->footer();

