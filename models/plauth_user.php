<?php
/**
 * User: dOob
 * Date: 30/11/12 @ 21:14
 */
class PLAuth_User extends Eloquent{
    public static $table = 'plauth_users';

    public function sessions(){
        return $this->has_many('PLAuth_Session');
    }
}
