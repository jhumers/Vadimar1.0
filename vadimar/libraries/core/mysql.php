<?php 
	
	class mysql extends connection
	{
		private $connection;
		private $strquery;
		private $arrValues;

		function __construct()
		{
			$this->connection = new connection();
			$this->connection = $this->connection->conect();
		}

		//Insertar un registro
		public function insert(string $query, array $arrValues)
		{
			$this->strquery = $query;
			$this->arrVAlues = $arrValues;
        	$insert = $this->connection->prepare($this->strquery);
        	$resInsert = $insert->execute($this->arrVAlues);
        	if($resInsert)
	        {
	        	$lastInsert = $this->connection->lastInsertId();
	        }else{
	        	$lastInsert = 0;
	        }
	        return $lastInsert; 
		}
		//Busca un registro
		public function select(string $query)
		{
			$this->strquery = $query;
        	$result = $this->connection->prepare($this->strquery);
			$result->execute();
        	$data = $result->fetch(PDO::FETCH_ASSOC);
        	return $data;
		}
		//Devuelve todos los registros
		public function select_all(string $query)
		{
			$this->strquery = $query;
        	$result = $this->connection->prepare($this->strquery);
			$result->execute();
        	$data = $result->fetchall(PDO::FETCH_ASSOC);
        	return $data;
		}
		//Actualiza registros
		public function update(string $query, array $arrValues)
		{
			$this->strquery = $query;
			$this->arrVAlues = $arrValues;
			$update = $this->connection->prepare($this->strquery);
			$resExecute = $update->execute($this->arrVAlues);
	        return $resExecute;
		}
		//Eliminar un registros
		public function delete(string $query)
		{
			$this->strquery = $query;
        	$result = $this->connection->prepare($this->strquery);
			$del = $result->execute();
        	return $del;
		}
	}


 ?>

