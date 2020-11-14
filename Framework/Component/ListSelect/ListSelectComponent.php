<?php
    include("Framework/Component/ListSelect/SelectElement.php");
    class ListSelectComponent extends Component
    {
        public $listElement;
        public $selectedKey;
        public $selectName;

        public function __construct($listElement,$selectedKey,$selectName,$optionName)
        {
            $this->componentName = "ListSelect";
            $this->selectedKey = $selectedKey;
            $this->listElement = array();
            $this->selectName = $selectName;
            if(is_array($listElement) && count($listElement) > 0)
            {
                if(property_exists($listElement[0],"idParent"))
                {
                    $this->hierarchicSort($listElement,$this->listElement,$optionName);
                }
                else
                {
                    foreach($listElement as $element)
                    {
                        $this->listElement[] = new SelectElement($element->id,$element->$optionName,0);
                    }
                }
            }
        }

        public function hierarchicSort($listElement,&$resultList,$name,$parentId = null,$level = 0)
        {
            $parentElement = array_filter($listElement,function($e) use($parentId){
                return $e->idParent == $parentId;
            });
            foreach($parentElement as $element)
            {
                $select = new SelectElement($element->id,$element->$name,$level);
                $this->listElement[] = $select;
                $this->hierarchicSort($listElement,$select->listElement,$name,$element->id,$level +1);
            }
        }
    }