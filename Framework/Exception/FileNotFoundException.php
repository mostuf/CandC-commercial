<?php
    class FileNotFoundException extends Exception
    {
        private $fileName;

        public function __construct($fileName,$message = "File was not found")
        {
            $this->fileName = $fileName;
            parent::__construct($message,'0040');
        }

        public function getMoreDetail()
        {
            return "File name :" . $this->fileName;
        }
    }