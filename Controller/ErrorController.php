<?php
    class ErrorController extends BaseController
    {
        public function Display(Exception $e)
        {
            $this->addParam('error',$e);
            if(file_exists("View/Error/" . lcfirst(str_replace("Exception","",get_class($e))) . ".php"))
            {
                $this->View(lcfirst(str_replace("Exception","",get_class($e))));
            }
            else
            {
                $this->View("error");
            }
        }

    }