<?php

class Viewer {

    private static $_viewer;
    private static $dirDefaultViews = 'app/View/';
    private $loaderView, $objTwig;

    private function __construct(){
        $this->loaderView = new Twig_Loader_Filesystem(self::$dirDefaultViews);
        $this->objTwig = new Twig_Environment($this->loaderView);
    }

    public static function singleton(){
        if($_viewer){
            return self::$_viewer;
        }
        else{
            $class = __CLASS__;
            self::$_viewer = new $class();
            return self::$_viewer;

        }
    }


    public static function render($viewToRender = '',$data = array()){
        $view = static::singleton();
        if($viewToRender != '')
            echo $view->objTwig->render($viewToRender,$data);
        else
            throw new ViewNotFoundException("The view is invalid",0);
    }

    public static function setLocationViews($dirViews = '/app/View/'){
        self::$dirDefaultViews = $dirViews;
        if(file_exists($dirViews)){
            $_viewer = false;
            $view = static::singleton();
        }
        else{
            throw new ViewNotFoundException("The path is not exist",1);
        }
    }

    public static function getLocationViews(){
        $view = static::singleton();
        return self::$dirDefaultViews;
    }
}
