<?php
    class FileManager
    {
        private $listJsFile;
        private $listCssFile;

        public function __construct($config,$route)
        {
            $this->listJsFile = array();
            $this->listCssFile = array();
            $this->basePath = $config->basePath;
            $this->bundle($config);
        }

        public function addJs($file)
        {
            if(preg_match("#^http#",$file))
            {
                $this->listJsFile[] = $file;
            }
            else
            {
                $this->listJsFile[] = $this->basePath . '/' . $file;
            }
        }

        public function addCss($file)
        {
            if(preg_match("#^http#",$file))
            {
                $this->listCssFile[] = $file;
            }
            else
            {
                $this->listCssFile[] = $this->basePath . '/' . $file;
            }
        }

        private function bundle($config)
        {
            if(count($config->bundle) > 0)
            {
                foreach($config->bundle as $bundle)
                {
                    if($config->environnement == "dev")
                    {
                        foreach($bundle->ListFile as $file)
                        {
                            if(pathinfo($file,PATHINFO_EXTENSION)== 'css')
                            {
                                $this->addCss($file);
                            }
                            elseif(pathinfo($file,PATHINFO_EXTENSION)== 'js')
                            {
                                $this->addJs($file);
                            }
                        }
                    }
                    else
                    {
                        foreach($bundle->ListFile as $file)
                        {
                            if(pathinfo($file,PATHINFO_EXTENSION)== 'css')
                            {
                                $this->addCss($file);
                            }
                            elseif(pathinfo($file,PATHINFO_EXTENSION)== 'js')
                            {
                                $this->addJs($file);
                            }
                        }
                        /*$this->addJs($bundle->Name . '.js');
                        $this->addCss($bundle->Name . '.css');*/
                    }
                }
            }
        }

        public function generateJs()
        {
            $this->listJsFile = array_unique($this->listJsFile);
            $jsContent = '';
            foreach($this->listJsFile as $jsFile)
            {
                $jsContent .= '<script src="'. $jsFile . '" ></script>';
            }
            return $jsContent;
        }

        public function generateCss()
        {
            $this->listCssFile = array_unique($this->listCssFile);
            $cssContent = '';
            foreach($this->listCssFile as $cssFile)
            {
                $cssContent .= '<link rel="stylesheet" type="text/css" href="' . $cssFile . '" />';
            }
            return $cssContent;
        }
    }