<?php
    class ParameterMissingException extends Exception
    {
        public function __construct($message = "Route parameter is missing in http call")
        {
            parent::__construct($message,'0010');
        }
    }