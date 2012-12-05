#PLAuth

##What is it?
PLauth is a simple authentication where the only input you ask to the user is his email address. No username and password to remember. The user will sign-in to your system by clicking a link on his mailbox.

##Scenario
* User request to sign-in by entering his email address (e.g.: /account/request)
* System create a session and send an email
* User check his mailbox and then click on the link to authenticate himself on the system (e.g.: /account/login/(:token))

##Installation
To install, copy the directory in the bundles/ folder.
Then, add the bundle to the bundles array of your project:
    'plauth' => array(
        'auto' => true,
        'handles' => 'account'
    )
Set the driver as "plauth" in the config/(:any)/auth.php

##Notes
This is my first Open Source project, I hope I'm doing everything as it should be. Please tell me if I'm doing something wrong!