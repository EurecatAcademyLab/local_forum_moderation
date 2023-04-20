# Forum Moderation #

Modul:  Forum moderation 

Keywords : anti-bulling / anti-harassment / automated forum checker/ relevant to schools Hate detection forums / Hatecheck / Bullingcheck. 
 
## Describing the plugin ## 

The multilanguage plugin is designed to assist forum moderators in identifying potentially inappropriate or harmful content and preventing misuse by automating certain decisions. 

The module offers highly accurate automated moderation of forums, and can quarantine the most problematic messages until they are reviewed by a moderator. The plugin also provides a variety of rules and actions to simplify the moderation process. 

 
## More details ##
When a user posts a message in any forum, the plugin will read the content, save the result and depending on the detected level will perform one of the following actions: 

If the detected level is 1 - "Warning", it will consider that the content should be reviewed by a subjective authority. Therefore it will show the local plugin for a review. 

If the detected level is 2 - "Danger", it will consider that this content should not be on the platform and will therefore be quarantined. This quarantine consists of removing the message until a reviewer determines if a final removal is necessary or if, for context, the detected message can be determined as an exception. 

Messages determined to be "Danger" will be prevented from accessing the message and will be marked as unavailable. 

It will be necessary for the authorized user to certify these messages and give approval for each one, having the possibility to accept or reject the module's suggestion. As the messages depend on their context, the reviewer has the possibility to view the message within the discussion to decide if it is appropriate. 

The module offers important information to forum moderators. This includes the user who posted the message, the course it was posted in, the reasons why the message has been quarantined, a link to the discussion for context, and a suggestion on how to proceed. For example, if the message is deemed "Danger" level, the suggestion might be to delete it, while if it is "Warning" level, the suggestion might be to review it. 

The plugin provides customization controls for tailoring its functionality,  and can be configured to operate at varying levels of accuracy based on the selected service level agreement. 

## About Us ## 

Eurecat Academy is the training department of Eurecat Technology Centre (www.eurecat.org). As a full-fledged training, content creation, and education consultancy services provider, we specialize in developing effective e-learning solutions through the “Lab”, our software division. 

At Eurecat Academy Lab, we bring together a multidisciplinary team of experts with a passion for improving people's abilities. Our team's expertise ranges from instructional design to technical development to offer solutions that optimize our clients' training activities. 

Our purpose is to offer solutions with the ability to generate a positive impact on individuals and entities, providing them with effective tools to optimize their training activities. We aspire for everyone to unleash their maximum potential and contribute to personal and professional progress, for their own well-being and their contribution to social development. 

## Specific information about the plugin's saved data. ##

Although this plugin is a free version, our company will store some data for the proper functioning and maintenance of the plugin. These data will be user  name, email and url of the platform where the plugin will be deployed.  

The plugin's stay has a temporary duration, and by accepting the privacy settings you will be giving the opportunity to be sent information about the duration of the plugin, as well as other products of the company.  In no case the information will be destined to third parties or purposes that are not informative about this plugin or other plugins of the company.  
 
If you have any questions, doubts or suggestions please do not hesitate to contact us.  


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
