<?php
    class RouteNotFoundException extends Exception
    {
        public function __construct($message = "Route was not found")
        {
            parent::__construct($message,'0020');
        }
    }