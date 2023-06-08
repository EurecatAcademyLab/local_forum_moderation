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
 * Save hash on settings
 *
 * @package     local_forum_moderation
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../../../config.php');
require_login();

$url = optional_param('host', null, PARAM_TEXT);
$h = optional_param('h', null, PARAM_TEXT);
$plugin = 'local_forum_moderation';

// Update or insert 'hash' record.
$hashrecord = $DB->get_record('config_plugins', array('plugin' => $plugin, 'name' => 'hash'));

if ($hashrecord) {
    $hashrecord->value = $h;
    $DB->update_record('config_plugins', $hashrecord);
} else {
    $hashrecord = new stdClass();
    $hashrecord->plugin = $plugin;
    $hashrecord->name = 'hash';
    $hashrecord->value = $h;
    $DB->insert_record('config_plugins', $hashrecord);
}

// Update or insert 'url' record.
$urlrecord = $DB->get_record('config_plugins', array('plugin' => $plugin, 'name' => 'url'));

if ($urlrecord) {
    $urlrecord->value = $url;
    $DB->update_record('config_plugins', $urlrecord);
} else {
    $urlrecord = new stdClass();
    $urlrecord->plugin = $plugin;
    $urlrecord->name = 'url';
    $urlrecord->value = $url;
    $DB->insert_record('config_plugins', $urlrecord);
}
//  Update Status.
$status = $DB->get_record('config_plugins', array('plugin' => $plugin, 'name' => 'status'));

if ($status) {
    $status->value = 1;
    $DB->update_record('config_plugins', $urlrecord);
} else {
    $status = new stdClass();
    $status->plugin = $plugin;
    $status->name = 'status';
    $status->value = 1;
    $DB->insert_record('config_plugins', $status);
}
