<?php
    class CompanyComponent extends Component
    {
        public function __construct()
        {
            foreach(Config::getConfig("clientConfig")->company as $key => $value)
            {
                $this->$key = $value;
            }
            $this->componentName = "Company";
        }
    }