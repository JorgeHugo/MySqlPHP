<?php 
require_once "config.php";

class ConnectionMySQL{
  // Definicion de atributos
	Private $host;
	private $user;
	private $password;
	private $database;
	private $conn;

	public function __construct(){ 
	//Constructor
		$this->host=HOST;
		$this->user=USER;
		$this->password=PASSWORD;
		$this->database=DATABASE;
	}

	public function CreateConnection(){
  	  // Metodo que crea y retorna la conexion a la BD.
		$this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		mysqli_set_charset($this->conn, 'utf8');
		if ($this->conn->connect_errno) {
		  header("Location: error.html");
		  die("Error al conectarse a MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error);
		}
	}

	public function CloseConnection(){
    //Metodo que cierra la conexion a la BD
		$this->conn->close();
	}

	public function ExecuteQuery($sql){
	/* Metodo que ejecuta un query sql
	Retorna un resultado si es un SELECT*/
	$result = $this->conn->query($sql);
	return $result;
	}

	public function GetRows($result){
	/* Metodo que retorna la ultima fila
	de un resultado en forma de arreglo.*/
	return $result->fetch_assoc();
	}

	public function SetFreeResult($result){
	//Metodo que libera el resultado del query.
		$result->free_result();
	}

	public function GetCountAffectedRows(){
	/* Metodo que retorna la cantidad de filas
	afectadas con el ultimo query realizado.*/
	return $this->conn->affected_rows;
	}

}
?>