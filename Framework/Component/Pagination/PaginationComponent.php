<?php
    class PaginationComponent extends Component
    {
        public $previous;
        public $next;
        public $listPage;
        public $current;

        public function __construct($current,$elementPerPage,$totalElement)
        {
            $this->current = $current;
            if($this->current <=1)
            {
                $this->previous = null;
            }
            else
            {
                $this->previous = $this->current - 1;
            }
            if($this->current * $elementPerPage >= $totalElement)
            {
                $this->next = null;
            }
            else
            {
                $this->next = $this->current + 1;
            }
            $this->listPage = range(1,ceil($totalElement / $elementPerPage));
            $this->componentName = "Pagination";
        }
    }