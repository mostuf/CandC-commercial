<?php
    class StructuredData
    {
        public $context;
        public $type;
        public $url;
        public $logo;

        public function __construct($httpRequest)
        {
            $this->context = "https://schema.org";
            $this->logo = "/Img/Shared/training-dev.png";
            $this->url = "https://www.training-dev.fr" . $httpRequest->url;
            $this->provider = new stdClass();
            $this->provider->type = "EducationalOrganization";
            $this->provider->name = "Training-dev.fr";
        }

        public function serialize()
        {
            $string = json_encode($this,JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
            $string = str_replace('"type"','"@type"',$string);
            $string = str_replace('"context"','"@context"',$string);
            $string = str_replace('"id"','"@id"',$string);
            return $string;
        }

        public function setData($key,$data)
        {
            $this->$key = $data;
        }
    }