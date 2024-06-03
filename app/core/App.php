<?php

class App
{
    protected $controller = 'NotFound';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        $routes = $this->loadRoutes();
        $routeKey = '/' . implode('/', array_slice($url, 1));

        foreach ($routes as $route => $routeInfo) {
            $routePattern = preg_replace('/\{[a-zA-Z0-9]+\}/', '([a-zA-Z0-9]+)', $route);

            if (preg_match('#^' . $routePattern . '$#', $routeKey, $matches)) {
                $this->controller = $routeInfo[0];
                $this->method = $routeInfo[1];
                array_shift($matches);
                $this->params = $matches;
                break;
            }
        }

        if (file_exists('app/controller/' . $this->controller . '.php')) {
            require_once 'app/controller/'   . $this->controller . '.php';
            $this->controller = new $this->controller();
        }

        if (!method_exists($this->controller, $this->method)) {
            require_once 'app/controller/NotFound.php';
            $this->controller = new NotFound();
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl()
    {
        $url = rtrim($_SERVER['REQUEST_URI'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        return $url;
    }

    private function loadRoutes()
    {
        return include 'Routes.php';
    }
}
