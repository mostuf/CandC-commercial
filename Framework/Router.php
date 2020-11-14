<?php
    class Router
    {
        private $listRoute = array();

        public function __construct()
        {
            $this->listRoute = array();
            foreach(scandir("ConfigFile") as $file)
            {
                if(preg_match("#route\..*\.?json#s",$file))
                {
                    $this->listRoute = array_merge($this->listRoute,json_decode(file_get_contents("ConfigFile/" . $file)));
                }            
            }
        }

        public function findRoute($url,$basePath,$method = "GET")
        {
            $url = str_replace($basePath,"",$url);
            $resultRoute = array_filter($this->listRoute,function($route) use($url,$method){
                return preg_match('#^' . $route->Path . '\/?$#', $url) && $route->Method == $method;
            });
            $countRoute = count($resultRoute);
            if($countRoute == 0)
            {
                throw new RouteNotFoundException();
            }
            elseif($countRoute > 1)
            {
                throw new MultipleRouteFoundException();
            }
            else
            {
                return new HttpRequest(new Route(array_shift($resultRoute)),$url,$method,new Param());
            }
        }
    }