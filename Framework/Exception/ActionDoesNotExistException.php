<?php
    class ActionDoesNotExistException extends Exception
    {
        public function __construct($message = "Action does not exists")
        {
            parent::__construct($message,'0022');
        }
    }