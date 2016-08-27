<?php
        /*--------------------------------------
            Created by Dreamsteam
                - Gerson Isaias
                - Wilvardo Ramirez
                - Rogelio Jinestas
        ---------------------------------------*/

        /*---------------------------------------
        Declaramos constantes como DS y ROOt que
        nos ayudarán a las rutas amigables
        ----------------------------------------*/

        define('DS',DIRECTORY_SEPARATOR);
        define('ROOT',realpath(dirname(__FILE__)).DS );

        /*---------------------------------------
        - Requerimos el autoload para asi poder
        - cargar las clases en tiempo de ejecucion
        ----------------------------------------*/
        require_once 'app/start/autoload.php';
        Autoloader::run();


        /*---------------------------------------
        Inicializamos la app con los requerido
        por default
        ----------------------------------------*/
        app::run();



?>
