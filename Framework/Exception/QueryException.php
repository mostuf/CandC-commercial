<?php
	class QueryException extends Exception
	{
        public function __construct($errorInfo){
            $this->message = $errorInfo[2];
            $this->code = $errorInfo[0];
        }
		
	}
?>