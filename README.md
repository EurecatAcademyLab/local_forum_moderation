# forum_review #

Describe the Plugin

The Multilanguage Plugin is designed to assist forum moderators in identifying potentially inappropriate or harmful content and preventing its misuse by automating certain decisions.

The module offers highly accurate automated moderation of forums and can quarantine the most problematic messages until they are reviewed by a moderator. The plugin also provides a variety of rules and actions to simplify the moderation process.

More Details

When a user posts a message in any forum, the plugin reads the content, saves the result, and performs one of the following actions based on the detected level:

      If the detected level is 1 - "Warning," the content should be reviewed by a subjective authority. Therefore, it will show the local plugin for a review.

      If the detected level is 2 - "Danger," the content should not be on the platform, and it will be quarantined. This quarantine involves removing the message until a reviewer determines if a final removal is necessary, or if, for context, the detected message can be determined as an exception.

Messages determined to be "Danger" will be prevented from accessing the message and marked as unavailable. The authorized user must certify these messages and give approval for each one, with the possibility to accept or reject the module's suggestion. As the messages depend on their context, the reviewer has the possibility to view the message within the discussion to decide if it is appropriate.

The module offers important information to forum moderators, including the user who posted the message, the course in which it was posted, the reasons why the message has been quarantined, a link to the discussion for context, and a suggestion on how to proceed. For example, if the message is deemed "Danger" level, the suggestion might be to delete it, while if it is "Warning" level, the suggestion might be to review it.

The plugin provides customization controls for tailoring its functionality and can be configured to operate at varying levels of accuracy based on the selected service level agreement.


## Installing via uploaded ZIP file ##

1. Log in to your Moodle site as an admin and go to _Site administration >
   Plugins > Install plugins_.
2. Upload the ZIP file with the plugin code. You should only be prompted to add
   extra details if your plugin type is not automatically detected.
3. Check the plugin validation report and finish the installation.

## Installing manually ##

The plugin can be also installed by putting the contents of this directory to

    {your/moodle/dirroot}/local/forum_review

Afterwards, log in to your Moodle site as an admin and go to _Site administration >
Notifications_ to complete the installation.

Alternatively, you can run

    $ php admin/cli/upgrade.php

to complete the installation from the command line.

## License ##

2022 Aina Palacios & JuanCarlo Castillo & Eurecat.dev

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <https://www.gnu.org/licenses/>.
