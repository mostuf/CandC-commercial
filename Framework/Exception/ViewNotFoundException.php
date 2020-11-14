<?php
    class ViewNotFoundException extends Exception
    {
        public function __construct($message = "View was not found")
        {
            parent::__construct($message,'0030');
        }
    }