<?php
    class SwitchComponent extends Component
    {
        public $name;
        public $text;
        public $checked;
        public $tooltip;
        public $elementName;

        public function __construct($name,$text,$checked,$tooltip)
        {
            $this->elementName = $name;
            if($text == null)
            {
                $this->text = $name;
            }
            else
            {
                $this->text= $text;
            }

            $this->checked = !($checked =='false');
            $this->componentName = "Switch";
            $this->tooltip = $tooltip;
        }
    }