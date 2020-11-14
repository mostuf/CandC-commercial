<?php 
    class ProductPlacementComponent extends Component
    {
        public $listProduct;
        public $type;
        public $number;

        public function __construct($type,$number)
        {
            global $controller;
            /*$controller->addCss("css/slick.css");
            $controller->addJs("js/slick.js");*/
            $this->type = $type;
            $this->number = $number;
            $this->loadProduct();
            $this->componentName = 'ProductPlacement';
        }

        public function loadProduct()
        {
            $productManager = new ProductManager(Config::getConfig("config")->dbSource);
            switch($this->type)
            {
                case "bestSell":
                    $this->listProduct = $productManager->getBestSeller($this->number);
                break;
                case "newProduct":
                    $this->listProduct = $productManager->getAll();
                break;
            }
        }

        public function getTitle()
        {
            switch($this->type)
            {
                case "bestSell":
                    return "Nos meilleures ventes";
                break;
                case "newProduct":
                    return "Nouveaux produits";
                break;
            }
        }
    }
?>