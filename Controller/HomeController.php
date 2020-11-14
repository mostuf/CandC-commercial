<?php
    class HomeController extends BaseController
    {
        public function Home()
        {
            $this->addParam("clientConfig",Config::getConfig("clientConfig"));
            $this->view("home");
        }

        public function Test()
        {
            $this->onMaintenance();
            $this->view("test");
        }
        public function Login($url)
        {
            $this->addCss("View/Home/css/home.css");
            $this->addParam("url",$url);
            $this->View("home");
        }

        public function Profil($id,$url = null)
        {
            $arrayDev = array_filter($this->listeDev,function($dev) use ($id){
                return $dev->id == $id;
            });
            if(count($arrayDev) == 1)
            {
                $_SESSION['profil'] = array_shift($arrayDev);
                $this->addParam("profil",$_SESSION['profil']);
            }
            if($url != null){
                header("location: /" . $url);
            }
            else
            {
                $this->View("profil");
            }
        }

        public function ChangeProfil()
        {
            unset($_SESSION["profil"]);
            $this->removeParam("profil");
            $this->addCss("View/Home/css/home.css");
            $this->View("home");
        }

        public function CGU()
        {
            $this->View("cgu");
        }

        public function Partenaires()
        {

        }

        public function Presentation()
        {
            
        }
    }