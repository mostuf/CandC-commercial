<?php
    class ContactController extends BaseController
    {
        public function Contact($type)
        {
            if($type != null)
            {
                switch($type){
                    case "Moderation":
                        $this->addParam("typeContactValue",5);
                    break;
                    case "Redaction":
                        $this->addParam("typeContactValue",6);
                    break;
                }
            }
            $this->addParam("typeContact",$this->ContactManager->getTypeContact());
            $this->addParam("clientConfig",Config::getConfig("clientConfig"));
            $this->View("contact");
        }

        public function Send($contact)
        {
            $this->ContactManager->Add($contact);
            $this->addParam("typeContact",$this->ContactManager->getTypeContact());
            $this->addParam("clientConfig",Config::getConfig("clientConfig"));
            $this->AlertManager->addSuccessAlert('Votre message a bien été envoyé, nous vous répondrons dès que possible.');
            $this->View("contact");
        }
    }