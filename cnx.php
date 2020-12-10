<?php

$cnx = mysqli_connect('localhost', 'root','', 'bdproductos') or die('Error en la conexion');


session_start();

function clean($s) {
	if (is_array($s)) {
		foreach($s as $c => $v) {
			$s[$c] = mysql_real_escape_string($v);
		}
	} else $s = mysql_real_escape_string($s);
	
	return $s;
}

?>