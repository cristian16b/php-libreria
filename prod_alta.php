<?php include 'cnx.php';   ?>
<html>
<head>
	<title>Alta de producto</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<a href='index.php'>Volver</a><br />

<?php

include 'conx.php';

if (isset($_POST['producto'])) {


	if($_POST['producto'] == "") {
		echo 'Debe completar el nombre';
	}
	else {
		$_POST = clean($_POST);

		mysqli_query($cnx,'BEGIN WORK');
	
		$sql = "insert into producto (descripcion) values (" ."'". $_POST['producto'] . "'" .") ";

		$res = mysqli_query($cnx,$sql);

		var_dump($res);
	
		if($res)  {
			mysqli_query($cnx,'COMMIT');
			echo 'Se registro correctamente el producto.';
		}
		else {
			echo 'Ocurrio un error al insertar';
		}
	}
}


echo '<form method=POST action="?">';
echo '<table cellspacing="0">';
echo '<tr>';
echo '<td>Nombre de producto</td><td><input type="text" id="producto" name="producto"></td>';
echo '</tr>';
echo '<tr>';
echo '<td colspan="2"><input value="Dar de Alta" type="submit" name="subgrabar"></td>';
echo '</tr>';
echo '</table>';
echo '</form>';

?>
</body>
</html>
