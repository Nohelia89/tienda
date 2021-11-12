<?php
	
	function Conectarse(){
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "clase";
		$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		return $link;
	}
	
	function Conectar(){
		// CONECTAR AL SERVIDOR
		$dbadd = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "clase";
		$conex = mysqli_connect($dbadd,$dbuser,$dbpass,$db);
		// CONTROLAR CONEXION AL SERVIDOR
		if (!$conex) {
			die("ATENCION!!!.. No se pudo conectar al SERVIDOR".mysqli_error($conex));
		} // endif
				
		return $conex;
	}//end
	
	function Ejecutar($sql){
		// EJECUTAR SENTENCIA SQL
		$con = Conectar();
		$result = mysqli_query($con,$sql);
		mysqli_close($con);
		return $result;
	}//end
	
	function EjecutarConexion($con, $sql){
		$result = mysqli_query($con, $sql);
		return $result;
	}//end
	
	function Desconectar($con){
		if($con!=null){
			mysqli_close($con);
		}
	}//end
?>