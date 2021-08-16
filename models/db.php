<?php

class db
{

	function __construct(){}

	function connection(){
		try {

			ini_set('max_execution_time', 400);
			$dsn = "mysql:dbname=gphoteles;host=localhost;charset=UTF8";
			//$dsn = "mysql:dbname=gphotel_corporativo;host=localhost;charset=UTF8";
			//$conn = new PDO($dsn, "gphotel_dev", "uWV%6l{TNPl7");
			$conn = new PDO($dsn, "root", "");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch (Exception $e) {
			$message = "Hubo un problema con la conexión a la base de datos para más información: ".$e->getMessage();
			return $message;
		}
	}

	function connection2(){
		try {

			//$dsn = "mysql:dbname=clubestrella;host=localhost;charset=UTF8";
			$dsn = "mysql:dbname=clubestr_ella;host=okcloud.arvixecloud.com;charset=UTF8";
			$conn = new PDO($dsn, "clubestr_adhara", "Harimakenji01@");
			//$conn = new PDO($dsn, "root", "");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch (Exception $e) {
			$message = "Hubo un problema con la conexión a la base de datos para más información: ".$e->getMessage();
			return $message;
		}
	}

	function connection3(){

		try {

			$dsn = "mysql:dbname=oktravel_db;host=localhost;charset=UTF8";
			$conn = new PDO($dsn, "root", "");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
			
		} catch (Exception $e) {
			$message = "Hubo un problema con la conexión a la base de datos para mas información: ".$e->getMessage();
		}
	}

	//SELECT: Consultas a la base de datos
	//Consultas sólo un registro -> fetch
	function select($query){
		try {
			$conn =  $this->connection2();
			$stmt = $conn->query($query);
			$stmt->execute();
			$count = $stmt->rowCount();
			$conn = NULL;
			if($count > 0){
				$rows = $stmt->fetch(PDO::FETCH_ASSOC);
				return $rows;
			}
			return false;
		} catch (Exception $e) {
			return $e;			
		}

	}

	//Consultas todos los registros -> fetchAll
	function selectAll($query){
		try {
			$conn =  $this->connection2();
			$stmt = $conn->query($query);
			$stmt->execute();
			$count = $stmt->rowCount();
			$conn = NULL;
			if($count > 0){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $rows;
			}
			return NULL;
		} catch (Exception $e) {
			return $e;			
		}

	}
}


?>