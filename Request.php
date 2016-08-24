<?php
class Request{

    private $controlador;
    private $metodo;
    private $argumento;

    public function __construct(){
        //Toda Url primero va controlador,metodo,seccion
        if(isset($_GET['url']) && isset($_GET['metodo'])){
            $ruta = filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
            $metodo = filter_input(INPUT_GET,'metodo',FILTER_SANITIZE_URL);
            $ruta = explode('/',$ruta);
            $ruta = array_filter($ruta);
            $this->controlador=strtolower(array_shift($ruta));
            $this->metodo=str_replace("_","",$metodo);

            if(!$this->metodo)
                $this->metodo="index";

            $this->argumento = $ruta;
        }
        else{
            require_once __DIR__.'/vendor/autoload.php';
                $loader = new Twig_Loader_Filesystem(__DIR__.'/View/');
               $twig = new Twig_Environment($loader);
            session_start();
            echo $twig->render('principal.php',array('nombre'=>$_SESSION['nombre'],
                                                    'nombre_completo'=>"/blog/show/".$_SESSION['nombre'].'_'.$_SESSION['apellido_paterno'].'_'.$_SESSION['apellido_materno']));
        }
    }

    public function getController(){
        return $this->controlador;
    }
    public function getMetodo(){
        return $this->metodo;
    }
    public function getArgumento(){
        return $this->argumento;
    }
}
?>
