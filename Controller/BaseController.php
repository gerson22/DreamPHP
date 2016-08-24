<?php namespace Controller;

class BaseController{
    public static function init(){
        /*---------------------------------------
        - Requerimos el autoload_real para asi poder
        - cargar las clases en tiempo de ejecucion
        ----------------------------------------*/

        require_once __DIR__.'/autoload_real.php';

        /*----------------------------------------
        - Retornamos la variable Viewer que contienes
        - los metodos twig para renderizar la vista
        ------------------------------------------*/

        return $Viewer;

    }

}
?>
