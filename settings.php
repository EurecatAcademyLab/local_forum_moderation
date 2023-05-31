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
 * Settings .
 *
 * @package     local_forum_moderation
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot. '/local/forum_moderation/classes/connected/query.php');
require_once($CFG->libdir . '/adminlib.php');
require_login();

$hassiteconfig = true;

if (isset($hassiteconfig) && $hassiteconfig) {
    $ADMIN->add(
        'localplugins',
        new admin_category(
            'local_forum_moderation',
            new lang_string('pluginname', 'local_forum_moderation'),
        )
    );

    $settingspage = new admin_settingpage(
        'managelocalforummoderation',
        new lang_string('manage', 'local_forum_moderation'),
    );

    if ($ADMIN->fulltree) {

        $settingspage->add(new admin_setting_configcheckbox(
            'local_forum_moderation/showinnavigation',
            new lang_string('showinnavigation', 'local_forum_moderation'),
            new lang_string('showinnavigation_desc', 'local_forum_moderation'),
            1
        ));

        $namesetting = new admin_setting_configtext(
            'local_forum_moderation/name',
            new lang_string('name', 'local_forum_moderation'),
            new lang_string('name_des', 'local_forum_moderation'),
            null,
            PARAM_TEXT,
            null,
            [
                'pattern' => '/^\w([\w\.%+-]*@[\w.-]+\.[a-zA-Z]{2,}$)/',
                'required' => true
            ]
        );

        if (!$namesetting->get_setting()) {
            // Show error on settings page.
            $PAGE->navbar->add(get_string('manage', 'local_forum_moderation'));
        }
        $settingspage->add($namesetting);

        $emailsettings = new admin_setting_configtext(
            'local_forum_moderation/email',
            new lang_string('email', 'local_forum_moderation'),
            new lang_string('email_des', 'local_forum_moderation'),
            null,
            PARAM_EMAIL,
            null,
            [
                'pattern' => '/^\w([\w\.%+-]*@[\w.-]+\.[a-zA-Z]{2,}$)/',
                'required' => true
            ],
            new lang_string('placeholder_text', 'local_forum_moderation')
        );

        if (!$emailsettings->get_setting()) {
            // Show error on settings page.
            $PAGE->navbar->add(get_string('manage', 'local_forum_moderation'));
        }
        $settingspage->add($emailsettings);

        $apikeysetting = new admin_setting_configtext(
            'local_forum_moderation/apikey',
            new lang_string('apikey', 'local_forum_moderation'),
            new lang_string('apikey_des', 'local_forum_moderation'),
            'd564dde308ff319571349c617a9185dec25893d1',
            PARAM_TEXT,
            50,
            'maxlength="50"readonly'
        );

        $apikeysetting->set_updatedcallback(call_woocomerce_forum());

        $settingspage->add($apikeysetting);

        $productidsetting = new admin_setting_configtext(
            'local_forum_moderation/productid',
            new lang_string('productid', 'local_forum_moderation'),
            new lang_string('productid_des', 'local_forum_moderation'),
            '39',
            PARAM_INT);

        $settingspage->add($productidsetting);


        $privacyurl = new moodle_url('https://lab.eurecatacademy.org/sample-page');
        $privacylink = \html_writer::link($privacyurl, get_string('privacy_policy', 'local_forum_moderation'));

        $privacycheckbox = new admin_setting_configcheckbox(
            'local_forum_moderation/privacy',
            new lang_string('privacy', 'local_forum_moderation'),
            new lang_string('privacy_des', 'local_forum_moderation') . ' ' . $privacylink,
            1
        );

        if (!$privacycheckbox->get_setting()) {
            // Show error on settings page.
            $PAGE->navbar->add(get_string('manage', 'local_forum_moderation'));
        }
        $settingspage->add($privacycheckbox);

        save_settings();

    }

    $ADMIN->add('localplugins', $settingspage);

}

