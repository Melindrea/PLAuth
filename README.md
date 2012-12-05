#PLAuth

##What is it?
PLauth is a simple authentication where the only input you ask to the user is his email address. No username and password to remember. The user will sign-in to your system by clicking a link on his mailbox.

##Scenario
* User request to sign-in by entering his email address (e.g.: /account/request)
* System create a session and send an email to the user
* User check his mailbox and then click on the link to authenticate himself on the system (e.g.: /account/login/(:token))

##Installation
To install this bundle, retrieve it with artisan:

`php artisan bundle:install plauth`

Then, add the bundle to your project (bundles.php):
<pre>
'plauth' => array(
    'auto' => true,
    'handles' => 'account'
)
</pre>
Set the driver as "plauth" in the config/(:any)/auth.php
Create the tables using the artisan migrate tools:
`php artisan migrate:install`
`php artisan migrate`

In the config file, you can modify the view used and where to redirect when the user have signed-in. You can also change the mail texts and headers.

##Notes
This is my first Open Source project, I hope I'm doing everything as it should be. Please tell me if I'm doing something wrong!

The mail is sent using the PHP mail() function. When Laravel 4 will be out, I'll use the new Laravel Mail class.