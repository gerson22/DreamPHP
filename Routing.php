<?php
class Routing{
    public static function run(Request $request){
        $controlador = $request->getController()."Controller";
        $ruta = "Controller/".$controlador.".php";
        $metodo = $request->getMetodo();
        $argumento = $request->getArgumento();
        if(is_readable($ruta)){
            include_once $ruta;
            $mostrar = "Controller\\$controlador";
            $controlador = new $mostrar;
            if(!isset($argumento)){
                 call_user_func(array($controlador,$metodo));
            }
            else{
                call_user_func_array(array($controlador,$metodo),$argumento);
            }
        }
        else{
            new throw Exception("La ruta establecida no puede ser encontrada");
        }

    }
}

?>
