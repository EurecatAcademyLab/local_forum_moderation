# forum_review #

Describe the plugin.

The plugin is in charge of reading the forums in Moodle, and detecting inappropriate content, saving and displaying the results. In addition, the plugin incorporates a set of actions and rules to avoid sensitive content in the forum.

Thus allowing automatic moderation of the forums with a very precise level of precision, and quarantining the worst messages until they are validated by a moderator.

More details.
When a user posts a message in any forum, the plugin will read the content, save the result and depending on the detected level will perform one of the following actions:

If the detected level is 1 - "Warning", it will consider that the content should be reviewed by a subjective authority. Therefore it will show the local plugin for a review.

If the detected level is 2 - "Danger", it will consider that this content should not be on the platform and will therefore be quarantined. This quarantine consists of removing the message until a reviewer determines if a final removal is necessary or if, for context, the detected message can be determined as an exception.

Messages determined to be "Danger" will be prevented from accessing the message and will be marked as unavailable.

It will be necessary for the authorized user to certify these messages and give approval for each one, having the possibility to accept or reject the module's suggestion. As the messages depend on their context, the reviewer has the possibility to view the message within the discussion to decide if it is appropriate.

The module provides relevant information such as: the user, the course, the reasons why the message has been quarantined, a link to the discussion to view the context and a suggestion on how to proceed: Delete the message if it is detected as "Danger" level or review it in case it is "warning" level.

Finally, the detected messages will be displayed or not depending on the review.


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
