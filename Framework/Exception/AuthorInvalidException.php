<?php
    class AuthorInvalidException extends Exception
    {
        public function __construct($message = "You have no right to update this courses.")
        {
            parent::__construct($message,'0101');
        }
    }