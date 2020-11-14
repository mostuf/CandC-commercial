<?php
    class AccountNotActivatedException extends Exception
    {
        public function __construct($message = "Account was not activated")
        {
            parent::__construct($message,'0083');
        }
    }
