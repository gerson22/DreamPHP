<?php
class app{

    public function __construct(){

    }
    public static function run(){
        require_once __DIR__.'/../routes.php';
    }


}
?>
