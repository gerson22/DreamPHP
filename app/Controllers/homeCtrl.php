<?php

class homeCtrl{

    public function home(){
        Viewer::render('hello.php');
    }
}
