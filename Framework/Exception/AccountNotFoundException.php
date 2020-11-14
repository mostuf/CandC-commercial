<?php
    class AccountNotFoundException extends Exception
    {
        public function __construct($message = "Account was not found")
        {
            parent::__construct($message,'0081');
        }
    }