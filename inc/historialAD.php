<?php
	include("conex.php");
		
	function getHistorialVenta($user){
		$resu = array();
		//$sql = "SELECT documento, nombre, apellido, esadmin FROM usuario WHERE user='".strtoupper($user)."' AND pass='".passEnc(strtoupper($pass))."'";
		$sql = "SELECT id, fechahora, total FROM venta WHERE usuario='".$user."' order by fechahora desc" ;
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysqli_fetch_array($rs)){
			$resu[$i] = $reg;
			$i++;
		}//wend
		return $resu;
	}
	
	function getVentaDetalle($idventa){
		$resu = array();
		//$sql = "SELECT documento, nombre, apellido, esadmin FROM usuario WHERE user='".strtoupper($user)."' AND pass='".passEnc(strtoupper($pass))."'";
		$sql = "SELECT nrolinea, detalle, cantidad, precio FROM ventalineas WHERE idventa=".$idventa." order by nrolinea " ;
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysqli_fetch_array($rs)){
			$resu[$i] = $reg;
			$i++;
		}//wend
		return $resu;
	}
	//end





?>


