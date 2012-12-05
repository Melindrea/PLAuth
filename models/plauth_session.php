<?php
/**
 * User: dOob
 * Date: 30/11/12 @ 21:12
 */
class PLAuth_Session extends Eloquent{
    public static $table = 'plauth_sessions';


    public static function make($user_id){
        $session = new PLAuth_Session(array(
            'user_id' => $user_id,
            'token' => uniqid(),
            'active' => 0
        ));
        $session->save();
        return $session;
    }

    // Delete all previous sessions of the user
    public static function invalidate($user_id){
        $sessions = PLAuth_Session::where_user_id($user_id)->get();
        foreach($sessions as $s){
            $s->delete();
        }
    }

    public function user(){
        return $this->belongs_to('PLAuth_User', 'user_id');
    }
}
