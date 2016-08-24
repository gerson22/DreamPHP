<?php
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('display_errors', '1');

    class Autoloader{
        public static function run(){
            spl_autoload_register(function($class){
                $ruta = str_replace("\\","/",$class).".php";
                //echo $ruta."<br>";
                if(file_exists($ruta))
                    if(!class_exists($class))
                        include_once $ruta;
            });
        }

    }
?>

