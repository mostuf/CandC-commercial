<?php
    class Alert{
            public $message;
            public $type;

            public function __construct($type,$message)
            {
                $this->type = $type;
                $this->message = $message;
            }
        }