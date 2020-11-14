<?php 
    class SelectElement{
        public $name;
        public $key;
        public $level;
        public $listElement;

        public function __construct($key,$name,$level)
        {
            $this->key = $key;
            $this->name = $name;
            $this->level = $level;
            $this->listSelectElement = array();
        }
    }