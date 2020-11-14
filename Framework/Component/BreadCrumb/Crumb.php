<?php
    class Crumb
    {
        public $link;
        public $title;

        public function __construct($link,$title)
        {
            $this->link = $link;
            $this->title = $title;
        }
    }