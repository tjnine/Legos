<?php 
namespace App\Models\Core;

class Config
{

    /*
    *   get('session/session_name')
    */
    public static function get($path = null)
    {
        if($path) {
            $config = $GLOBALS['config'];
            $path = explode('/', $path);

            foreach($path as $p) {
                if(isset($config[$p])) {
                    $config = $config[$p];
                }
            }
            return $config;
        }
        return FALSE;
    }

}

?>