# forum_review #

Describe the plugin.

The plugin is in charge of reading the forums in Moodle, and detecting inappropiate content, saving and displaying the results. In addition, the plugin incorporates a set of actions and rules to avoid sensitive content in the forum.

The module is intented to give authority to a reviewer to detect if the text detected as "Hate" is inappropiate. 


More details.

When a user makes a post to any forum, the plugin will read the content, call the API, save the result and depending on the detected level will do one of the following actions:

If the detected level is 1, it will consider that the contigut has to be checked by a subjective authority. Therefore it will show the local plugin for a review.

If the level detected is 2, it will be considered that this content should not be on the platform and therefore it will be quarantined. This quarantine consists of removing the post until a reviewer determines whether a final removal is necessary or if, for context, the detected post can be determined as an exception.

The analysis will quarantine those messages that are level 2, preventing access to it and giving the notice of unavailable.

It will be necessary for the authorized user to certify these messages and give approval for each one, having the possibility to accept or decline the module's suggestion. Since the messages depend on their context, the reviewer has the possibility to view the message within the discussion to decide if it is appropriate.

In the meantime, messages rated as level 2 will be quarantined.

The module offers relevant information such as: the user, the course, the reasons why the message has been quarantined, a link to the discussion to see the context and a suggestion on how to proceed: Delete the message if it is detected as level 2 or review it in case it is level 1.

Finally, those messages detected will be displayed or not depending on the review.


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

2022 Aina Palacios & Eurecat.dev

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <https://www.gnu.org/licenses/>.
