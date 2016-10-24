<?php 
namespace App\Models\Core;

class Token
{
    public static function generate()
    {
        return Session::put(Config::get('session/session_name'), md5(uniqid()));
    }

    public static function check($token)
    {
        $tokenName = Config::get('session/session_name');

        if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }

}
?>