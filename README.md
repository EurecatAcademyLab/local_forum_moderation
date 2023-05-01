# forum_review #

# Describe the plugin.

The Multilanguage Plugin is designed to assist forum moderators in identifying potentially inappropriate or harmful content and preventing its misuse by automating certain decisions.

The module offers highly accurate automated moderation of forums and can quarantine the most problematic messages until they are reviewed by a moderator. The plugin also provides a variety of rules and actions to simplify the moderation process.


# More details.

When a user posts a message in any forum, the plugin reads the content, saves the result, and performs one of the following actions based on the detected level:

If the detected level is 1 - "Warning," the content should be reviewed by a subjective authority. Therefore, it will show the local plugin for a review.

If the detected level is 2 - "Danger," the content should not be on the platform, and it will be quarantined. This quarantine involves removing the message until a reviewer determines if a final removal is necessary, or if, for context, the detected message can be determined as an exception.

Messages determined to be "Danger" will be prevented from accessing the message and marked as unavailable. The authorized user must certify these messages and give approval for each one, with the possibility to accept or reject the module's suggestion. As the messages depend on their context, the reviewer has the possibility to view the message within the discussion to decide if it is appropriate.

The module offers important information to forum moderators, including the user who posted the message, the course in which it was posted, the reasons why the message has been quarantined, a link to the discussion for context, and a suggestion on how to proceed. For example, if the message is deemed "Danger" level, the suggestion might be to delete it, while if it is "Warning" level, the suggestion might be to review it.

The plugin provides customization controls for tailoring its functionality and can be configured to operate at varying levels of accuracy based on the selected service level agreement.

## About us #

At Eurecat Academy, we bring together a multidisciplinary team of experts with a passion for improving people’s competencies. Our team's expertise ranges from instructional design to technical development to offer solutions that optimize our partners' training activities. Eurecat Academy is the training department of Eurecat Technology Centre (www.eurecat.org).​

​Eurecat is a research and technology centre headquartered in Barcelona, Spain, that provides advanced technology, innovation, and training services to over 1,500 companies and organizations. Eurecat is considered one of the leading European research and technology centres, being the second largest private non-profit organisation in Southern Europe.​

​Eurecat Academy collaborates with public and private training and labour organizations in a very broad business spectrum as a full-fledged training, content creation, and education consultancy services provider. Eurecat Academy boasts a specialized innovation group that focuses on improving knowledge transfer and evaluation processes through innovative ICT interfaces, adaptive and motivational methodologies, learning analytics and personal training environments. We combine technological and pedagogical knowledge and professional experience to create high-performance training activities, tools and resources, and to develop educational plans and training itineraries.​

Our overall purpose is to offer solutions with the ability to generate a positive impact on individuals and entities, providing them with effective tools to optimize their training activities. We aspire for everyone to unleash their maximum potential and contribute to personal and professional progress, for their own well-being and their contribution to social development.


## Regarding the AI approach​ #

This tool uses AI models to detect hate speech, such as language models like Moderation by OpenAI (https://platform.openai.com/docs/models/moderation) and open ones. It is designed to be as ethical and responsible as possible. The tools using these models are developed with a strong emphasis on privacy and data protection, and are designed to ensure that user data is handled with the utmost care and respect.​

The development team of the plugin is committed to continuously improving the ethical standards of their product. To achieve this, they are actively working on applying new ethical toolboxes and guidelines to their development process. These toolboxes and guidelines are designed to help the team identify and address ethical concerns and considerations throughout the entire product lifecycle, from conception to implementation. ​

​The AI models selected to be used are typically trained on large datasets that have been carefully curated to ensure that they are representative and diverse. This means that the models are dessigned to be as unbiassed as possible towards any particular group or ideology, and that they are capable of identifying hate speech in all its forms, regardless of who is speaking or what they are saying. More information can be found here: https://platform.openai.com/docs/guides/moderation/overview.​

​It's important to note that tools with enhanced functionality provided by AI models are never perfect and should be used in conjunction with human moderation and oversight. This helps to ensure that any potential errors or biases are caught and corrected before they have a chance to cause harm. The overall design and user interface of this tool is intended to assist human forum moderators, with final decisions left to human judgment.

## Specific information about the plugin's saved data #

Although this plugin is a free version, our company will store some data for the proper functioning and maintenance of the plugin. These data will be user name, email and url of the platform where the plugin will be deployed. ​

​The plugin's stay has a temporary duration, and by accepting the privacy settings you will be giving the opportunity to be sent information about the duration of the plugin, as well as other products of the company.  In no case the information will be destined to third parties or purposes that are not informative about this plugin or other plugins of the company. ​

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
