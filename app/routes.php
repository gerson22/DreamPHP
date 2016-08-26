<?php

    /*
        @Ruter::get ::all ::post ::add ::put etc
        nos  ayudara a almacenar nuestras rutas
        personalizadas el segundo paramentro nos dira
        su callback o a que controlador ira
    */
    Router::get('/getUser','User:get');









    //---Echar andar todas las rutas existentes
    Router::run();
