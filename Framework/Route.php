<?php 
    class Route
    {
        public $title;
        public $path;
        public $method;
        public $controller;
        public $action;
        public $routeParam;
        public $param;
        public $auth;
        public $ajax;
        public $manager;
        public $redirect;
        private $paramValues = array();
        private $container;
        private $profil;

        public function __construct($jsonRoute)
        {
            $this->title = $jsonRoute->Title;
            $this->path = $jsonRoute->Path;
            if(!empty($jsonRoute->redirect))
            {
                $this->redirect = $jsonRoute->redirect;
            }
            else
            {
                $this->method = $jsonRoute->Method;
                $this->controller = $jsonRoute->Controller;
                $this->action = $jsonRoute->Action;
                $this->param = $jsonRoute->Param;
                $this->ajax = $jsonRoute->Ajax;
                $this->manager = $jsonRoute->Manager;
                
                if(!empty($jsonRoute->container))
                {
                    $this->container = $jsonRoute->container;
                }
                if($jsonRoute->Auth != '')
                {
                    $this->auth = $jsonRoute->Auth;
                }
                $this->routeParam = $jsonRoute->RouteParam;
                if(!empty($_SESSION['profil']))
                {
                    $this->profil = $_SESSION['profil'];
                }
            }
        }

        public function run($httpRequest,$config,$listParam = null)
        {
            try
            {
                if(!empty($this->redirect))
                {
                    header("location: " . $this->redirect);
                }
                $this->manageMaintenance($config);
                $this->manageRole($httpRequest);
                $this->bindParam($httpRequest,$listParam);
                $this->callAction($httpRequest,$config,$listParam);
            }
            catch(Exception $e)
            {
                throw $e;
            }
            
        }

        private function manageMaintenance($config)
        {
            if($this->controller != "Maintenance" && $config->maintenance->isActivated)
            {
                if($this->controller == "Error")
                {
                    return true;
                }
                else
                {
                    if($this->profil != null && $this->profil->checkRole("WebMaster"))
                    {
                        return false;
                    }
                    else
                    {
                        throw new MaintenanceException();
                    }
                }
            }
        }

        private function manageRole($httpRequest)
        {
            if($this->hasAuth())
            {
                if($this->profil == null)
                {
                    header("location: /Login" . $httpRequest->url);
                }
                elseif($this->profil->checkRole($this->auth))
                {
                    return true;
                }
                else
                {
                    throw new NotAllowedException();
                }
            }
            else
            {
                return true;
            }
        }

        private function callAction($httpRequest,$config)
        {
            global $controller;
            $controllerName = $this->controller . "Controller";
            if(class_exists($controllerName))
            {
                $controller = new $controllerName($httpRequest,$config,$this->profil);
                $this->loadManager($httpRequest,$controller,$config);
                if(method_exists($controller,$this->action))
                {
                    call_user_func_array(array($controller,$this->action),$this->paramValues);
                    if(!$httpRequest->route->ajax)
                    {
                        $controller->layout();
                    }
                    else
                    {
                        echo $controller->content;
                    }
                }
                else
                {
                    throw new ActionDoesNotExistException();
                }
            }
            else
            {
                throw new ControllerDoesNotExistException();
            }
        }

        private function loadManager($httpRequest,$controller,$config)
        {
            if($httpRequest->route->manager != null)
            {
                foreach(explode(";",$httpRequest->route->manager) as $manager)
                {
                    $managerName = $manager . "Manager";
                    $controller->$managerName = new $managerName($config->dbSource);
                }
            }
        }

        private function bindParam($httpRequest,$listParam)
        {
            $this->bindHttpParam($httpRequest->method);
            $this->bindRouteParam($httpRequest->url);
            $this->bindOtherParam($listParam);
            if(false)
            {
                throw new ParameterMissingException();
            }
        }

        private function bindRouteParam($url)
        {
            $routeParam = explode(";",$this->routeParam);
            if(preg_match('#^' . $this->path . '\/?$#',$url,$listRouteParam) > 0)
            {
                for($i=0;$i<=count($listRouteParam)-2;$i++)
                {
                    $this->paramValues[$routeParam[$i]] = $listRouteParam[$i+1];
                }
            }
        }

        private function bindOtherParam($listParam)
        {
            if($listParam != null)
            {
                foreach($listParam as $key => $param)
                {
                    $this->paramValues[$key] = $param;
                }
            }
        }

        private function bindHttpParam($method)
        {
            if(!Empty($this->param))
            {
                switch($method)
                {
                    case "GET":
                    case "DELETE":
                        foreach(explode(";",$this->param) as $param)
                        {
                            if(!empty($_GET[$param]))
                            {
                                $this->paramValues[$param] = $_GET[$param];
                            }
                        }
                    break;
                    case "POST":
                    case "PUT":
                        foreach(explode(";",$this->param) as $param)
                        {
                            if(class_exists(ucfirst($param)))
                            {
                                $this->paramValues[$param] = $this->bindClass($param);
                            }
                            else
                            {
                                if(isset($_POST[$param]))
                                {
                                    $this->paramValues[$param] = $_POST[$param];
                                }
                            }
                        }
                    break;
                    default:
                        throw new ParameterMissingException();
                }
            }
        }

        public function bindClass($param)
        {
            $element = new $param(null);
            foreach(get_object_vars($element) as $property => $value)
            {
                if(!empty($_POST[$param . '_' . $property]))
                {
                    if(is_array($_POST[$param . '_' . $property]))
                    {

                            $element->$property = $this->bindArray($param . '_' . $property,$property);
                    }
                    else
                    {
                        $element->$property = $_POST[$param . '_' . $property];
                    }
                }
                
            }
            return $element;
        }

        public function bindArray($postName,$property)
        {
            $listElementName = str_replace("list","",$property);
            $listElement = array();
            foreach($_POST[$postName] as $case)
            {
                $element = new $listElementName();
                foreach(get_object_vars($element) as $property => $value)
                {
                    if(!empty($case[$property]))
                    {
                        $element->$property = $case[$property];
                    }
                }
                $listElement[] = $element;
            }
            return $listElement;
        }

        public function hasAuth()
        {
            return $this->auth != null && $this->auth != '';
        }

        public function isFluid()
        {
            return $this->container == "fluid";
        }
    }