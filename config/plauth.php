<?php
return array(
    'login_success_redirect_to' => '/admin',
    'views' => array(
        'login' => 'users.login',
        'wait'  => 'users.wait',
        'fail'  => 'users.fail'
    ),
    'mail' => array(
        'subject' => "Sign-in to MyWebsite",
        'message' => "You may sign-in by clicking this link: ".URL::home().Bundle::option('plauth', 'handles')."/login/%s",
        'headers' => 'From: webmaster@example.com' . "\r\n" . 'Reply-To: webmaster@example.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion()
    )
);