<?php
namespace vendor\fileRead;
class File {
    /*--------------------
    The @var routes its a array
    for save the routes where
    could be the file
    ---------------------*/
    public $routes = [];
    public function __construct(){

    }

    public function searchFile($d = '/',$fileSearch){


        if (is_dir($d) )
        {
            // Abrimos el directorio y comprobamos que
            if ($aux = opendir($d))
            {
                while (($file = readdir($aux)) !== false)
                {

                    if ($file!="." && $file!=".." && !preg_match('/^\./',$file))
                    {
                        $ruta_completa = $d.'/'.$file;

                        // Comprobamos si la ruta más file es un directorio (es decir, que file es
                        // un directorio), y si lo es, decimos que es un directorio y volvemos a
                        // llamar a la función de manera recursiva.

                        if (is_dir($ruta_completa))
                        {

                            $this->searchFile($ruta_completa,$fileSearch);
                        }
                        else
                        {

                            if($file == $fileSearch){
                                $route = $ruta_completa;
                                array_push($this->routes,$d.'/'.$fileSearch);
                            }
                        }
                    }
                }

                closedir($aux);
            }
        }
        else
        {
            throw new \Exception("The directory [$ruta] isn't valid");
        }

    }
}
