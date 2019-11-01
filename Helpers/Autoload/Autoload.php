<?php

namespace Autoloader;

class Autoload
{
    /**
     * @param $dir
     */
    public static function load($dir){
        $NameSpaces = [
            "Models\\" => "Models",
            "Connection\\" => "Helpers/Connection",
            "Classes\\" => "Helpers/Classes",
            "Request\\" => "Helpers/Request",
            "Sessions\\" => "Helpers/Sessions",
            "Controllers\\" => ["Controllers"]
        ];
        foreach ($NameSpaces as $namespace => $classpaths) {
            if (!is_array($classpaths)) {
                $classpaths = array($classpaths);
            }
            spl_autoload_register(function ($classname) use ($namespace, $classpaths, $dir) {
                if (preg_match("#^".preg_quote($namespace)."#", $classname)) {
                    $classname = str_replace($namespace, "", $classname);
                    $filename = preg_replace("#\\\\#", "/", $classname).".php";
                    foreach ($classpaths as $classpath) {
                        $fullpath = $dir."/".$classpath."/$filename";
                        if (file_exists($fullpath)) {
                            include_once $fullpath;
                        }
                    }
                }
            });
        }
        $Files = [
            "Config/config.php",
            "Helpers/Functions/AppFunctions.php",
        ];
        foreach($Files as $file){
            $fullpath = $dir."/".$file;
            if(file_exists($fullpath)){
                include_once($fullpath);
            }
        }
    }
}

Autoload::load(str_replace('/Helpers/Autoload','',str_replace('\\','/',__DIR__)));
