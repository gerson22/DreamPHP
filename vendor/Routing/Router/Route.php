<?php


class Route
{

    private $expr;

    private $callback;

    private $matches;

    private $methods = array('GET', 'POST', 'HEAD', 'PUT', 'DELETE');

    public function __construct($expr, $callback, $methods = null)
    {
        // Allow an optional trailing backslash
        $this->expr = '#^' . $expr . '/?$#';
        $this->callback = $callback;
        if ($methods !== null) {
            $this->methods = is_array($methods) ? $methods : array($methods);
        }
    }

    public function matches($path)
    {
        if (preg_match($this->expr, $path, $this->matches) &&
            in_array($_SERVER['REQUEST_METHOD'], $this->methods)) {
            return true;
        }
        return false;
    }

    public function exec()
    {
        if(is_callable($this->callback))
            return call_user_func_array($this->callback, array_slice($this->matches, 1));
        else{
            $callbackStr = explode(':',$this->callback);
            $controller = new $callbackStr[0];
            var_dump($callbackStr[1]);
            return call_user_func_array(array($controller,$callbackStr[1]),array_slice($this->matches, 1));

        }
    }
}
