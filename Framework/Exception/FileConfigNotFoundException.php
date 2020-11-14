<?php
    class FileConfigNotFoundException extends Exception
    {
        public function __construct($message = "Config file was not found")
        {
            parent::__construct($message,'0001');
        }
    }