<?php 
namespace App\Models\Core;

class Cookie
{
    public static function exists($name)
    {
        return(isset($_COOKIE[$name])) ? true : false;
    }

    public static function get($name)
    {
        return $_COOKIE[$name];
    }

    public static function put($name, $val, $expires)
    {
        if(setcookie($name, $val, time() + $expires, '/')) {
            return true;
        }
        return false;
    }

    public static function reset($name)
    {
        self::put($name, '', time() -1);
    }

}
?>