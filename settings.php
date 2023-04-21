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
 * @package     local_forum_review
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


if ($hassiteconfig) {
    $ADMIN->add(
        'localplugins',
        new admin_category('local_forum_review',
        new lang_string('pluginname', 'local_forum_review')));

    $settingspage = new admin_settingpage('managelocalforumreview',
    new lang_string('manage', 'local_forum_review'));

    if ($ADMIN->fulltree) {
        $settingspage->add(new admin_setting_configcheckbox(
            'local_forum_review/showinnavigation',
            new lang_string('showinnavigation', 'local_forum_review'),
            new lang_string('showinnavigation_desc', 'local_forum_review'),
            1
        ));

        $privacyurl = new moodle_url('https://lab.eurecatacademy.org/sample-page');
        $privacylink = \html_writer::link($privacyurl, get_string('privacy_policy', 'local_forum_review'));
        $settingspage->add(new admin_setting_configcheckbox(
            'local_forum_review/privacy',
            new lang_string('privacy', 'local_forum_review'),
            new lang_string('privacy_des', 'local_forum_review') . ' ' . $privacylink,
            1
        ));

        $settingspage->add(
            new admin_setting_configtext(
                'local_forum_review/name',
                new lang_string('name', 'local_forum_review'),
                new lang_string('name_des', 'local_forum_review'),
                null,
                PARAM_TEXT
            )
        );

        $settingspage->add(
            new admin_setting_configtext('local_forum_review/email',
            new lang_string('email', 'local_forum_review'),
            new lang_string('email_des', 'local_forum_review'),
            null,
            PARAM_TEXT)
        );

        $settingspage->add(
            new admin_setting_configtext('local_forum_review/apikey',
            new lang_string('apikey', 'local_forum_review'),
            new lang_string('apikey_des', 'local_forum_review'),
            '1234567890',
            PARAM_TEXT,
            null,
            ['class' => 'disabled'],
            new lang_string('placeholder_text', 'local_forum_review')
            )
        );

        $settingspage->add(
            new admin_setting_configtext('local_forum_review/url',
            new lang_string('url', 'local_forum_review'),
            new lang_string('url_des', 'local_forum_review'),
            new moodle_url('/'),
            PARAM_TEXT,
            null,
            null,
            new moodle_url('/')
            )
        );

        $time = time();
        $settingspage->add(
            new admin_setting_configtext('local_forum_review/time',
            new lang_string('time', 'local_forum_review'),
            new lang_string('time_des', 'local_forum_review'),
            $time,
            PARAM_TEXT,
            null,
            null,
            $time
            )
        );


    }


    $ADMIN->add('localplugins', $settingspage);
}

