<?php
    class AlertManager{
        private $listeAlert;
        private static $instance;

        private function __construct()
        {
            if(!empty($_SESSION['alert']))
            {
                $this->listeAlert = $_SESSION['alert'];
                $_SESSION['alert'] = array();
            }
            else
            {
                $this->listeAlert = array();
            }
        }

        public static function getInstance()
        {
            if(self::$instance == null){
                self::$instance = new AlertManager();
            }
            return self::$instance;
        }

        public function addAlert($type,$message)
        {
            $alert = new Alert($type,$message);
            $_SESSION['alert'][] = $alert;
            $this->listeAlert[] = $alert;

        }

        public function addPrimaryAlert($message)
        {
            $this->addAlert('primary',$message);
        }

        public function addSecondaryAlert($message)
        {
            $this->addAlert('secondary',$message);
        }
        
        public function addSuccessAlert($message)
        {
            $this->addAlert('success',$message);
        }
        
        public function addDangerAlert($message)
        {
            $this->addAlert('danger',$message);
        }
        
        public function addWarningAlert($message)
        {
            $this->addAlert('warning',$message);
        }
        
        public function addInfoAlert($message)
        {
            $this->addAlert('info',$message);
        }
        
        public function addLightAlert($message)
        {
            $this->addAlert('light',$message);
        }
        
        public function addDarkAlert($message)
        {
            $this->addAlert('dark',$message);
        }
        

        public function getAlerts()
        {
            return $this->listeAlert;
        }

    }