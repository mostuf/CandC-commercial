<?php
    class ConstructException extends Exception
    {
        public function __construct($message = "Page on construction")
        {
            parent::__construct($message,'1001');
        }
    }
