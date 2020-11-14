<?php
    class Param
    {
        public $get;
        public $post;

        public function __construct()
        {
            $this->get = $_GET;
            $this->post = $_POST;
        }
    }