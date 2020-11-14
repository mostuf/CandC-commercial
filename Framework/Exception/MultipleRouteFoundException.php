<?php
    class MultipleRouteFoundException extends Exception
    {
        public function __construct($message = "Multiple route was found")
        {
            parent::__construct($message,'0021');
        }
    }