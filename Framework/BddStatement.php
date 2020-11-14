<?php
    class BddStatement extends PDOStatement
    {
        public function fetchClass($class)
        {
            foreach($this->fetchAll() as $ligne)
            {
                foreach($ligne as $col)
                {
                    
                }
            }
        }
    }
?>

