<?php
    class Component
    {
        protected $componentName = null;

        public function Display()
        {
            global $controller;
            if(file_exists('Framework/Component/' . $this->componentName . '/' . $this->componentName . 'Component.css'))
            {
                $controller->addCss('Framework/Component/' . $this->componentName . '/' . $this->componentName . 'Component.css');
            }
            if(file_exists('Framework/Component/' . $this->componentName . '/' . $this->componentName . 'Component.js'))
            {
                $controller->addJs('Framework/Component/' . $this->componentName . '/' . $this->componentName . 'Component.js');
            }
            ob_start();
            if(file_exists('Framework/Component/' . $this->componentName . '/' . $this->componentName . 'Template.php'))
            {
                extract(array(lcfirst($this->componentName) => $this));
                include('Framework/Component/' . $this->componentName . '/' . $this->componentName . 'Template.php');
            }
            ob_end_flush();
        }

        public static function Comment($listComment,$type,$idAttachement)
        {
            $comment = new CommentComponent($listComment,$type,$idAttachement);
            $comment->Display();
        }

        public static function Switch($name,$text=null,$checked=null,$tooltip=null)
        {
            $switch = new SwitchComponent($name,$text,$checked,$tooltip);
            $switch->Display();
        }

        public static function Pagination($page,$elementPerPage,$totalElement)
        {
            $pagination = new PaginationComponent($page,$elementPerPage,$totalElement);
            $pagination->Display();
        }

        public static function ListSelect($listElement,$selectedKey,$name,$optionName)
        {
            $listSelect = new ListSelectComponent($listElement,$selectedKey,$name,$optionName);
            $listSelect->Display();
        }


        public static function CalendarCollect($collectTiming,$reservedTiming)
        {
            $calendarCollect = new CalendarCollectComponent($collectTiming,$reservedTiming);
            $calendarCollect->Display();
        }

        public static function ProductPlacement($type,$number)
        {
            $productPlacement = new ProductPlacementComponent($type,$number);
            $productPlacement->Display();
        }

        public static function BreadCrumb($listCrumb)
        {
            $breadCrumb = new BreadCrumbComponent($listCrumb);
            $breadCrumb->Display();
        }

        public static function Company()
        {
            $company = new CompanyComponent();
            $company->Display();
        }

        public static function Contact()
        {
            $contact = new ContactComponent();
            $contact->Display();
        }
    }