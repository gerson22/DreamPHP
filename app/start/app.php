<?php
class app{

    public function __construct(){

    }
    public static function run(){

        /*--------------------------------------
        Requerimos el autoload del vendor con la
        intención de poder utilizar la librería
        TWIG que nos servira para la manipulación
        de plantillas (Herencia, renderización,
        carga con datos, e.t.c)
        ----------------------------------------*/
        require_once 'vendor/autoload.php';

        require_once __DIR__.'/../routes.php';

    }


}
?>
