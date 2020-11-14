<?php
    class NotAllowedException extends Exception
    {
        public function __construct($message = "You don't have right to access this page")
        {
            parent::__construct($message,'0084');
        }
    }