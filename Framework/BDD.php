<?php
	class BDD
	{
		private static $_instance;
		private $_bdd;
		
		public static function GetInstance($dbSrc){
			if(is_null(self::$_instance)){
				self::$_instance = new BDD($dbSrc);
			}
			return self::$_instance;
		}
		
		private function __construct($dbSrc){
			$this->_bdd = new PDO('mysql:dbname=' . $dbSrc->dbname . ';host=' . $dbSrc->host . ";port=" . $dbSrc->port,$dbSrc->user,$dbSrc->password, array(1002 => 'SET NAMES utf8'));
		}
		
		public function PQuery($query,$param)
		{
			$req = $this->_bdd->prepare($query);
			if($req->execute($param))
			{
				return $req;
			}
			else
			{
				throw new QueryException($req->errorInfo());
			}
			
		}

		public function Prepare($query)
		{
			return $this->_bdd->prepare($query);
		}
		
		public function Query($query){
			return $this->_bdd->query($query);
		}

		public function lastId($table = null){
			return $this->_bdd->lastInsertId($table);
		}
	}
?>