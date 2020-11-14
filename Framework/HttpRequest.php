<?php
    class HttpRequest
    {
        public $route;
        public $url;
        public $method;
        public $param;
        public $construct;

        public function __construct($route,$url,$method,$param)
        {
            $this->route = $route;
            $this->url = $url;
            $this->method = $method;
            $this->param = $param;
        }

        public function run($config,$listParam = null)
        {
            $this->route->run($this,$config,$listParam);
        }

        public function onConstruct(){
            $this->construct = true;
        }
    }