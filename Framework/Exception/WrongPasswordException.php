<?php
    class WrongPasswordException extends Exception
    {
        public function __construct($message = "Password was not correct")
        {
            parent::__construct($message,'0082');
        }
    }