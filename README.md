iLanceJoomlaCMS
===============
An iLance Wrapper for the Joomla! 2.5 CMS

demo: http://ilancecms.magneticmg.com/example-pages.html

You should have used both iLance 3.2.1 and Joomla! 2.5 to try and use his package. 

This package is designed to work with your marketplace folder as the root and the joomla files in the /cms directory. 

# Configuration

You will also need to use two configuration files. One for the front and one for the /cms/administrator/index.php url. 
This is because we are using a special Joomla!/iLance session handler for the cms front pages so we can carry a session, otherwise its kicked out (Both iLance and CMS want to be the only session).
This means that no Joomla! user registration and login are to be used here (For the moment), its simply a way for you to publish content.

The configuration.php file in the root has the $session_handler set to 'ilance'. The /cms/configuration.php $session_handler should be 'database';

# Other Components & Modules

Most Component and Module extensions should work as long as they have nothing to do with reading information of a specific user.

# Template: 

* We are forcing 'template' varialble = 'ilance' so we load "/cms/templates/ilance"
* Only 2 module positions: Left and Right (adding more is easy). 
* Left and right module chrome use the Block styling from iLance

# SEF / .htaccess

The .htaccess file has the Joomla! portion appended to the end so that SEF urls will still work. 

 
