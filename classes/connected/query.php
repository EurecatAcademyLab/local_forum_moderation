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
 * Connected before plugins.
 *
 * @package     local_forum_moderation
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$page = new moodle_page();
$page->requires->js('/local/forum_moderation/amd/woocomerceforum.js');

/**
 * This function changes the staus of the plugin on the table config plugins on the DB.
 * @return Void.
 */
function update_status() {
    if (check_validation_time() == false) {
        global $DB;
        $existingconfig = $DB->get_field('config_plugins', array('plugin' => 'local_forum_moderation', 'name' => 'status'));
        if ($existingconfig) {
            $DB->set_field('config_plugins', 'value', '0', array('plugin' => 'local_forum_moderation', 'name' => 'status'));
        }
    }
}

/**
 * This function get data from config settings and connect with js function.
 * @return Void.
 */
function call_woocomerce_forum() {

    $apikey = get_config('local_forum_moderation', 'apikey');
    $productid = get_config('local_forum_moderation', 'productid');
    $email = get_config('local_forum_moderation', 'email');

    $data = array("apikey" => $apikey, "productid" => $productid, 'email' => $email);
    global $PAGE;
    $PAGE->requires->js('/local/forum_moderation/amd/woocomerceforum.js');
    $PAGE->requires->js_init_call('woocommerce_api_active_forum', $data);
    call_woocomerce_status_forum();
    call_woocomerce_status_forum();
}

/**
 * This function get data from config settings and confirm the status.
 * @return Void.
 */
function call_woocomerce_status_forum() {

    global $DB;
    $apikey = get_config('local_forum_moderation', 'apikey');
    $productid = get_config('local_forum_moderation', 'productid');
    $email = get_config('local_forum_moderation', 'email');
    $privacyforum = get_config('local_forum_moderation', 'privacy');
    $plugin = 'forum_moderation';
    $data = array(
        "apikey" => $apikey,
        "productid" => $productid,
        'email' => $email,
        'plugin' => $plugin,
        'privacyforum' => $privacyforum
    );
    global $PAGE;
    $PAGE->requires->js('/local/forum_moderation/amd/woocomerceforum.js');
    $PAGE->requires->js_init_call('woocommerce_api_status_forum', $data);
}


/**
 * This function get data the table config plugins and get some values
 * @return Array $data with most of the get config data.
 */
function get_headers_call() {
    $data = [
        'apikey' => get_config('local_forum_moderation', 'apikey'),
        'productid' => get_config('local_forum_moderation', 'productid'),
        'email' => get_config('local_forum_moderation', 'email'),
        'name' => get_config('local_forum_moderation', 'name'),
        'url' => get_config('local_forum_moderation', 'url'),
        'instancia' => get_config('local_forum_moderation', 'instancia'),
    ];
    return $data;
}


/**
 * Saves the configuration settings.
 * Only creates configuration values if they do not already exist in the database.
 * According to the privacy policy accepted in the settings of this plugin,
 * the user gives permission to save the URL and the activation time.
 * @return bool Returns true when save a good values on DB.
 */
function save_settings() {
    global $DB;

    // Check if the privacity setting is enabled.
    $existingconfigprivacity = $DB->get_record('config_plugins',
        array('plugin' => 'local_forum_moderation', 'name' => 'privacity'));
        $url = strval(get_actual_url());
        $host = parse_url($url, PHP_URL_HOST);
        $configs = array(
            array('name' => 'time', 'value' => time()),
            array('name' => 'url', 'value' => $host),
        );

        foreach ($configs as $config) {
            // Check if the configuration item already exists.
            $existingconfig = $DB->get_record('config_plugins',
            array('plugin' => 'local_forum_moderation', 'name' => $config['name']));

            // Insert the configuration item if it does not exist.
            if (!$existingconfig) {
                $forumconfig = new stdClass();
                $forumconfig->plugin = 'local_forum_moderation';
                $forumconfig->name = $config['name'];
                $forumconfig->value = $config['value'];

                $DB->insert_record('config_plugins', $forumconfig);
            }
        }

        return true;
}

/**
 * Check if validation time has passed.
 * This function retrieves the value of the 'time' and 'url' configuration
 * records from the 'config_plugins' table for the 'local_forum_moderation' plugin,
 * and compares the value of 'time' with the current time to determine if
 * validation time has passed (30 days).
 *
 * @return bool Returns false if validation time has passed, otherwise true.
 */
function check_validation_time() {
    global $DB;

    $existingconfig = $DB->get_record('config_plugins', array('plugin' => 'local_forum_moderation', 'name' => 'time'));
    $existingconfigurl = $DB->get_record('config_plugins', array('plugin' => 'local_forum_moderation', 'name' => 'url'));

    if ($existingconfig && $existingconfigurl) {
        $value = $existingconfig->value;
        $thirtydays = 30 * 24 * 60 * 60;
        $current = time();

        if ($value + $thirtydays <= $current) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

/**
 * Get the actual Url.
 * @return String $actualurl.
 */
function get_actual_url() {

    $urlactual = qualified_me();
    $urlparsed = parse_url($urlactual);

    // Url base.
    $urlbase = $urlparsed['scheme'] . "://" . $urlparsed['host'];

    if (isset($urlparsed['port'])) {
        $urlbase .= ":" . $urlparsed['port'];
    }

    $urlbase .= "/";
    return $urlbase;
}

