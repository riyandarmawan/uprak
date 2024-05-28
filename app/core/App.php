<?php

class App
{
    protected $controller = 'NotFound';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if(isset($url[1])) {
            if(file_exists('app/controller/' . $url[1] . '.php')) {
                $this->controller = $url[1];
                unset($url[1]);
            }
        }
        
        require_once 'app/controller/'   . $this->controller . '.php';
        $this->controller = new $this->controller();
        
        if(isset($url[2])) {
            if(method_exists($this->controller, $url[2])) {
                $this->method = $url[2];
                unset($url[2]);
            }
        }

        if(!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        $url = rtrim($_SERVER['REQUEST_URI'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        return $url;
    }
}