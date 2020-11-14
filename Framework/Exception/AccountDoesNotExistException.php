<?php
    class AccountDoesNotExistException extends Exception
    {
        public function __construct($message = "Account does not exists")
        {
            parent::__construct($message,'0080');
        }
    }