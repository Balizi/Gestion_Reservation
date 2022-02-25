<?php

session_start();

require_once './bootstrap.php';

spl_autoload_register('autoload');

function autoload($calss_name)
{
    $array_paths=array(
        'database/',
        'app/classes',
        'models/',
        'views/',
        'controllers/'
    );

    $parts=explode('\\',$calss_name);
    $name=array_pop($parts);

    foreach($array_paths as $path)
    {
        $file=sprintf($path.'%s.php',$name);
        if(is_file($file))
        {
            include_once $file;
        }
    }
}

?>