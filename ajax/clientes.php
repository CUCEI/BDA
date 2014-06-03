<?php

$consulta = new mysqli('localhost', 'root', '1234', 'sarka');

if( $_GET['llamada'] == 'consulta' ){

	$resultado = $consulta->query('select * from cliente;');

	while ( $datos_raw = $resultado->fetch_assoc() ) {
		$datos[] = $datos_raw;
	}
	echo json_encode($datos);
}
else if( $_GET['llamada'] == 'inserta' ){
	$resultado = $consulta->query('select count(id_cliente) as num from cliente;');

	$datos = $resultado->fetch_assoc();

	$id_cliente = $datos['num']; 

	$resultado = $consulta->query("insert into cliente values('" . $id_cliente ."','" . $_GET['nombre'] ."','" . $_GET['telefono'] . "','" . $_GET['direccion'] . "','" . $_GET['nombre_contacto'] . "','" . $_GET['RFC'] . "');");
	echo 'insert into cliente values(' . $id_cliente .',' . $_GET['nombre'] .',' . $_GET['telefono'] . ',,, ' . $_GET['RFC'] . ');';
	$datos = $resultado->fetch_assoc();
	echo json_encode($datos);
	foreach ( $datos as $key=>$value) {
		echo $key;
	}
}

/*


var_dump( $resultado->fetch_assoc() );
*/