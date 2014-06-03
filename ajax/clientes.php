<?php

$consulta = new mysqli('localhost', 'root', '1234', 'sarka');

$resultado = $consulta->query('select * from departamento where id_departamento = 1');

var_dump( $resultado->fetch_assoc() );
