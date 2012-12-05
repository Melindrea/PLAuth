#PLAuth v0.1

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
Set the driver as "plauth" in the config/(:any?)/auth.php

Create the tables using the artisan migrate tools:

`php artisan migrate:install`

`php artisan migrate`

Create the 3 views required ('login', 'wait' & 'fail') in your application/views directory and configure the config file to point to them.

Here is a simple 'login' view:
<code>
    {{ Form::open('account/request') }}
        @if(Session::has('error'))
            <p class="error">Error!</p>
        @endif

        <p>
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email') }}
        </p>

        <p>
           {{ Form::submit('Request an email to sign-in') }}
        </p>
    {{ Form::close() }}
</code>
The 'wait' & 'fail' views are just feedback.

The 'wait' view is called right after the user requested to sign-in.

The 'fail' view is called if an user try to sign-in with a wrong token.


##Usage
* Route '/account/request' will display the login view
* Route '/account/logout' will logout the user
* Route '/account/login/(:any)' will try to authenticate an user with a token
* You can still use Auth methods in your application (Auth::user(), Auth::guest()...)
* You may change the bundle's handle as you please, just change it in the configuration array and all the routes will change.

##Notes
This is my first Open Source project, I hope I'm doing everything as it should be. Please tell me if I'm doing something wrong!

The mail is sent using the PHP mail() function. When Laravel 4 will be out, I'll use the new Laravel Mail class.

The bundle doesn't check if the session is still valid at any time. It will be implemented on the next version!