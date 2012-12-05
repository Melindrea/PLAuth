<?php



Route::get('(:bundle)/login/(:any)', function($token){
    $session = PLAuth_Session::where_token($token)->where_active(0)->first();
    if(!$session){
        return View::make(Config::get('plauth::plauth.views.fail'));
    }
    $session->active = 1;
    $session->save();

    Auth::login($session->user_id);

    return Redirect::to(Config::get('plauth::plauth.login_success_redirect_to'));
});

Route::get('(:bundle)/logout', function(){
    PLAuth_Session::invalidate(Auth::user()->id);
    Auth::logout();
    return Redirect::home();
});

Route::get('(:bundle)/wait', array( 'as' => 'plauth_wait', 'do' => function(){
    return View::make(Config::get('plauth::plauth.views.wait'));
}));

Route::get('(:bundle)/request', array( 'as' => 'plauth_request', 'do' => function(){
    return View::make(Config::get('plauth::plauth.views.login'));
}));

Route::post('(:bundle)/request', function(){

    // Check the email input
    $input = array(
        'email' => Input::get('email')
    );
    $rules = array(
        'email' => 'required|email'
    );
    $v = Validator::make($input, $rules);
    if($v->fails()){
        return Redirect::to_route('plauth_request')->with_errors($v);
    }

    // Get or Create user
    if(!$user = PLAuth_User::where_email(Input::get('email'))->first()){
        $user = new PLAuth_User();
        $user->email = Input::get('email');
        $user->save();
    }

    // Create a new session and deleted the others
    PLAuth_Session::invalidate($user->id);
    $session = PLAuth_Session::make($user->id);

    // Will improve that in L4
    mail($user->email,
        Config::get('plauth::plauth.mail.subject'),
        sprintf(Config::get('plauth::plauth.mail.message'), $session->token),
        Config::get('plauth::plauth.mail.headers')
    );

    return Redirect::to_route('plauth_wait');
});