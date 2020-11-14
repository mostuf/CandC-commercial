<?php
    class ContactComponent extends Component
    {
        public $company;
        public $listType;

        public function __construct()
        {
            $this->company = Config::getConfig("clientConfig")->company;
            $this->componentName = "Contact";
            $contactManager = new ContactManager(Config::getConfig("config")->dbSource);
            $this->listType = $contactManager->getTypeContact();
        }
    }