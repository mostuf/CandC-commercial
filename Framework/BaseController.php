<?php
    class BaseController
    {
        public $debug = false;
        protected $param = array();
        public $langue = 'fra';
        public $screen;
        public $httpRequest;
        private $fileManager;
        public $content;
        protected $VMLib;
        protected $listeDev;
        public $profil;
        public $AlertManager;
        public $config;
        public $title;
        public $structuredData;

        public function __construct($httpRequest,$config,$profil)
        {
            $this->profil = $profil;
            //$messageManager = new MessageManager($this->config->dbSource);
            //$this->profil->numberNewMessages = $messageManager->getNumberNewMessages($this->profil);
            $this->addParam("profil",$this->profil);
            $this->httpRequest = $httpRequest;
            $this->title = $httpRequest->route->title;
            $this->config = $config;
            $this->addParam('httpRequest',$this->httpRequest);
            $this->addParam('config',$this->config);
            if($this->config->environnement == "dev")
            {
                $this->debug = true;
                $this->addParam('debug',$this->debug);
                error_reporting(-1);
                ini_set("display_errors",1);
            }
            $this->fileManager = new FileManager($this->config,$this->httpRequest->route);
            $this->addParam('fileManager',$this->fileManager);
            $this->AlertManager = AlertManager::getInstance();
            $this->content = "";
            //$this->structuredData = new StructuredData($this->httpRequest);
        }

        public function View($template)
        {
            $this->content .= $this->addView($template);
        }

        public function addView($template)
        {
            $content = "";
            if(file_exists('View/' . $template) && !is_dir('View/' . $template))
            {
                ob_start();
                extract($this->param,EXTR_REFS);
                require('View/' . $template);
                $content .= ob_get_contents();
                ob_end_clean();
            }
            elseif(file_exists('View/Shared/' . $template . ".php"))
            {
                if(file_exists('View/Shared/css/' . $template . '.css'))
                {
                    $this->addCss('View/Shared/css/' . $template . '.css');
                }
                if(file_exists('View/Shared/js/' . $template . '.js'))
                {
                    $this->addJs('View/Shared/js/' . $template . '.js');
                }
                ob_start();
                extract($this->param,EXTR_REFS);
                require('View/Shared/' . $template . ".php");
                $content .= ob_get_contents();
                ob_end_clean();
            }
            elseif(file_exists('View/' . $this->httpRequest->route->controller . '/' . $template . '.php'))
            {
                if(file_exists('View/' . $this->httpRequest->route->controller . '/css/' . $template . '.css'))
                {
                    $this->addCss('View/' . $this->httpRequest->route->controller . '/css/' . $template . '.css');
                }
                if(file_exists('View/' . $this->httpRequest->route->controller . '/js/' . $template . '.js'))
                {
                    $this->addJs('View/' . $this->httpRequest->route->controller . '/js/' . $template . '.js');
                }
                ob_start();
                extract($this->param,EXTR_REFS);
                require('View/' . $this->httpRequest->route->controller . '/' . $template . '.php');
                $content .= ob_get_contents();
                ob_end_clean();
            }
            else
            {
                throw new ViewNotFoundException();
            }
            return $content;
        }

        public function layout()
        {
            ob_start();
            $data = array(  "content" => $this->content,
            "httpRequest" => $this->httpRequest,
            "fileManager" => $this->fileManager,
            "listeAlert" => $this->AlertManager->getAlerts(),
            "config" => $this->config,
            "structuredData" =>$this->structuredData);
            if(!empty($_SESSION['profil']))
            {
                $data['profil'] = $_SESSION['profil'];
            }
            extract($data);
            require_once("View/layout.php");
            ob_end_flush();
        }

        public function addParam($key,$value,$force = false)
        {
            if(empty($this->param[$key]) || $force)
            {
                $this->param[$key] = $value;
            }
            else
            {
                //throw exception
            }
        }

        public function removeParam($key)
        {
            if(!empty($this->param[$key]))
            {
                unset($this->param[$key]);
            }
            else
            {
                //throw exception
            }
        }

        public function cleanParam()
        {
            $this->param = array();
        }

        public function addJs($file)
        {
            $this->fileManager->addJs($file);
        }

        public function addCss($file)
        {
            $this->fileManager->addCss($file);
        }

        public function onConstruct()
        {
            if($this->profil == null)
            {
                throw new ConstructException();
            }
            elseif(!$this->profil->checkRole("WebMaster"))
            {
                throw new ConstructException();
            }
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }

        public function onMaintenance()
        {
            if($this->profil == null)
            {
                throw new MaintenanceException();
            }
            elseif(!$this->profil->checkRole("WebMaster"))
            {
                throw new MaintenanceException();
            }
        }

        public function Json($data)
        {
            echo json_encode($data);
        }
    }