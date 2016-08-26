<?php
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('display_errors', '1');

    class Autoloader{
        public static function run(){
            spl_autoload_register(function($class){

                include_once 'vendor/fileRead/File.php';
                $loadClass = new vendor\fileRead\File();
                $loadClass->searchFile(__DIR__.'/../..',$class.".php");
                if(is_array($loadClass->routes)){
                     foreach($loadClass->routes as $key => $value){
                        $ruta = str_replace("\\","/",$value);
                        if(file_exists($ruta))
                            if(!class_exists($class)){
                                include_once $ruta;
                            }
                    }
                }
            });
        }

    }
?>
