<?php

namespace Koween\Vanillaframework\Http;

class Request
{
    protected $segments = [];
    protected $controller;
    protected $method;

    public function __construct()
    {
        $this->segments = explode('/', $_SERVER['REQUEST_URI']);
        var_dump($this->segments);
        $this->setMethod();
        $this->setController();
    }

    function setMethod()
    {
        $this->method = empty($this->segments[2]) ? 
        'index' : $this->segments[2];
    }

    function setController()
    {
        $this->controller = empty($this->segments[1]) ? 
        'home' : $this->segments[1];
    }

    function getMethod()
    {
        return $this->method;
    }

    function getController()
    {
        $controller = ucfirst($this->controller);
        return "Koween\Vanillaframework\Http\Controllers\\{$controller}Controller";
    }

    function send () {
       $method = $this->getMethod();
       $controller = $this->getController();
       var_dump($controller);
       $response = call_user_func(new $controller, $method);
       $response->send();
    }
}
