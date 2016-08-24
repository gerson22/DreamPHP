<?php
        /*--------------------------------------
        Requerimos el autoload para cargar las
        clases sin la necesidad de los includes
        ---------------------------------------*/
        if(!class_exists("Autoloader"))
            include_once __DIR__."/../autoload.php";

        /*--------------------------------------
        Corremos la funcion run de nuestro
        Autoloader para poder inicializar
        ---------------------------------------*/
        Autoloader::run();

        /*--------------------------------------
        Requerimos el autoload del vendor con la
        intención de poder utilizar la librería
        TWIG que nos servira para la manipulación
        de plantillas (Herencia, renderización,
        carga con datos, e.t.c)
        ----------------------------------------*/
        if(!class_exists("ComposerAutoloaderInit02091dd026ee4f5f79c5667e18986bfa"))
            include_once __DIR__.'/../vendor/autoload.php';

        /*----------------------------------------
        Creamos la variable $loaderView la cual nos
        indicará donde buscar las vistas a renderizar
        o manipular.
        ------------------------------------------*/

        $loaderView = new Twig_Loader_Filesystem(__DIR__.'/../View/');

        /*----------------------------------------
        La variable $Viewer nos permitirá renderizar
        la vista que querramos en nuestro Index
        ------------------------------------------*/

        $Viewer = new Twig_Environment($loaderView);


?>
