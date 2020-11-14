<?php
    class BreadCrumbComponent extends Component
    {
        public $listCrumb;

        public function __construct($listCrumb)
        {
            $this->listCrumb = $listCrumb;
            $this->componentName = "BreadCrumb";
        }
    }