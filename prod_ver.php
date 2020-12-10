<?php include 'cnx.php';   ?>
<html>
<head>
	<title>Ver producto</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php 
	if (!isset($_GET['id'])) {
?>
<a href='index.php'>Volver</a><br />
<?php 
	}
	else {
?>
<a href='prod_ver.php'>Volver al listado</a><br />
<?php
	} 
?>


<?php

$_POST = clean($_POST);
$_GET = clean($_GET);

include 'conx.php';

if ($_GET['id']) {

	$sql = "select * from producto where id = ".$_GET['id'];
	$res = mysqli_query($cnx,$sql);
	$row = mysqli_fetch_array($cnx,$res);

	echo '<table cellspacing="0">';
	echo '<tr>';
	echo '<td>Nombre de categoria</td><td><input type=text name=categoria value="'.$row['descripcion'].'"></td>';
	echo '</tr>';
	echo '<tr>';
	echo '</tr>';
	echo '</table>';

} else {
     
	$sql = "select * from producto order by id asc";
	$res = mysqli_query($cnx,$sql);

	if (mysqli_num_rows($res)>0)     {
		echo '<table cellspacing="0">';
		echo '<tr><td>Nombre del producto</td><td>ver detalle</td></tr>';
		while ($row = mysqli_fetch_array($res)) {
			echo '<tr>';
			echo '<td>'.$row['descripcion'].'</td><td><a href=prod_ver.php?id='.$row['id'].'>ver detalle</a></td>';
			echo '</tr>';
		}
		echo '</table>';
	} else                          {
		echo 'no hay productos disponibles';
	}
}

?>
</body>
</html>