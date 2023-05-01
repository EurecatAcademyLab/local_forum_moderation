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
 * Save status on settings
 *
 * @package     local_forum_review
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../../../config.php');
require_login();

$status = optional_param('active', null, PARAM_INT);

$plugin = 'local_forum_review';
$name = 'status';
$existingrecord = $DB->get_record('config_plugins', array('plugin' => $plugin, 'name' => $name));

if ($existingrecord) {
    $record = $existingrecord;
    $record->value = $status;
    $DB->update_record('config_plugins', $record);
} else {
    $record = new stdClass();
    $record->plugin = $plugin;
    $record->name = $name;
    $record->value = $status;
    $DB->insert_record('config_plugins', $record);
}

echo 'success';

