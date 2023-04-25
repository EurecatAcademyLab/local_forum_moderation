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
 * Settings query.
 * @package     local_forum_review
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();
require_once(__DIR__.'/../../../../config.php');
require_once($CFG->dirroot. '/local/forum_review/lib.php');
require_once($CFG->dirroot.'/lib/formslib.php');
require_login();

$sql = "SELECT * FROM {config_plugins} c WHERE c.plugin = :plugin";
$params = ['plugin' => 'local_forum_review'];

$settings = $DB->get_records_sql($sql, $params);

if (empty($settings)) {
    echo json_encode(false);
    exit;

}

$forum = array();

foreach ($settings as $item) {
    $forum[$item->name] = $item->value;
}

$forum2 = qualified_me();
echo json_encode($forum);

