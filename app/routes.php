<?php

    /*
        @Ruter::get ::all ::post ::add ::put etc
        nos  ayudara a almacenar nuestras rutas
        personalizadas el segundo paramentro nos dira
        su callback o a que controlador ira
    */
    Router::get('/','homeCtrl:home');

    Router::Error404(function () {
        //Obtiene el error 404 para personalizarlo
        echo '<h1>404 - El sitio solicitado no existe</h1>';
    });








    //---Echar andar todas las rutas existentes
    Router::run();
