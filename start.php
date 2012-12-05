<?php
Autoloader::map(array(
    'PLAuth_Session'   => path('bundle').'plauth/models/plauth_session.php',
    'PLAuth_User'      => path('bundle').'plauth/models/plauth_user.php',
    'PLAuth'        => path('bundle').'plauth/libraries/plauth.php'
));


Auth::extend('plauth', function() {
    return new PLAuth();
});