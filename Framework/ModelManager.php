<?php
	class ModelManager
	{
		private $_table;
		private $_obj;
		protected $_bdd;
		protected $dbSrc;
		
		protected function __construct($table,$obj,$dbSrc)
		{
			$this->_table = $table;
			$this->_obj = $obj;
			$this->dbSrc = $dbSrc;
			$this->_bdd = BDD::GetInstance($dbSrc);
		}
		
		public function GetById($id,$nested = false)
		{
			$req = $this->_bdd->PQuery('SELECT * FROM ' . $this->_table . ' WHERE id = ?',array($id));
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->_obj,array('nested' => $nested));
			return $req->fetch();
		}
		
		public function GetAll()
		{
			$req = $this->_bdd->PQuery('SELECT * FROM ' . $this->_table,null);
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->_obj,get_class_vars($this->_obj));
			return $req->fetchAll();
		}
		
		public function Create($object)
		{
			$requestParam = get_object_vars($object);
			return $this->_bdd->PQuery('INSERT INTO ' . $this->_table . ' (' . implode(', ',array_keys($requestParam)) . ') VALUES (' . implode(', ', array_fill(0, count($requestParam), '?')) . ')',array_values($requestParam));
		}
		
		public function Update($object)
		{
			$requestParam = get_object_vars($object);
			unset($requestParam['id']);
			$query = 'UPDATE ' . $this->_table . ' SET ';
			$valueArray = array();
			foreach($requestParam as $key=>$value)
			{
				$setValue = (is_null($value))?"null":'\'' . $value . '\'';
				$valueArray[] = $key . ' = ' . $setValue;
			}
			$query .= implode(', ',$valueArray) . ' WHERE id = ?';
			return $this->_bdd->PQuery($query,array($object->id));
		}
		
		public function Remove($id)
		{
			if(!empty($id))
			{
				return $this->_bdd->PQuery('DELETE FROM ' . $this->_table . ' WHERE ID = ?',array($id));
			}
		}

		public function lastId()
		{
			return $this->_bdd->lastId($this->_table);
		}
	}
?>