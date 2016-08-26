<?php

class Router
{

    private $base_path;

    private $path;

    public $routes = array();

    private static $_rout;

    private function __construct($base_path = '')
    {
        $this->base_path = $base_path;
        $path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $path = substr($path, strlen($base_path));
        $this->path = $path;
    }

    public static function singleton(){
        if (self::$_rout) {
            return self::$_rout;
        } else {
            $class = __CLASS__;
            self::$_rout = new $class();
            return self::$_rout;

        }

    }

    public static function Error404($callback){
        self::add('/*.', $callback);
    }

    public static function all($expr, $callback, $methods = null)
    {
        $router = self::singleton();
        $router->routes[] = new Route($expr, $callback, $methods);
    }

    public static function  add($expr, $callback, $methods = null)
    {
        $router = self::singleton();
        $router->all($expr, $callback, $methods);
    }

    public static function get($expr, $callback)
    {
        $router = self::singleton();
        $router->routes[] = new Route($expr, $callback, 'GET');
    }

    public static function post($expr, $callback)
    {
        $router = self::singleton();
        $router->routes[] = new Route($expr, $callback, 'POST');
    }

    public static function head($expr, $callback)
    {
        $router = self::singleton();
        $router->routes[] = new Route($expr, $callback, 'HEAD');
    }

    public static function put($expr, $callback)
    {
        $router = self::singleton();
        $router->routes[] = new Route($expr, $callback, 'PUT');
    }

    public static function delete($expr, $callback)
    {
        $router = self::singleton();
        $router->routes[] = new Route($expr, $callback, 'DELETE');
    }

    public static function run()
    {
        $router = self::singleton();
        foreach ($router->routes as $route) {
            if ($route->matches($router->path)) {
                return $route->exec();
            }
        }
        throw new RouteNotFoundException("The route  [{$router->path}] is undefined");
    }

    public function url($path = null)
    {
        if ($path === null) {
            $path = $this->path;
        }
        return $this->base_path . $path;
    }

    public function redirect($from_path, $to_path, $code = 302)
    {
        self::all($from_path, function () use ($to_path, $code) {
            http_response_code($code);
            header("Location: {$to_path}");
        });
    }
}
