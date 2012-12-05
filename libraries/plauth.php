<?php
class PLAuth extends Laravel\Auth\Drivers\Driver {

    // We don't need an attempt() method, since we sign-in directly the user
    public function attempt($arguments = array()){}

    // Response of Auth::user()
    public function retrieve($id){
        return PLAuth_User::find($id);
    }
}