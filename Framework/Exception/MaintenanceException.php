<?php
    class MaintenanceException extends Exception
    {
        public function __construct($message = "Site on maintenance")
        {
            parent::__construct($message,'1000');
        }
    }
