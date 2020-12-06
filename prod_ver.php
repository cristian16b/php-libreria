<?php include 'cnx.php';   ?>
<html>
<head>
	<title>Ver producto</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<a href='index.php'>Volver</a><br />

<?php

$_POST = clean($_POST);
$_GET = clean($_GET);

if ($_GET['id']) {

	$sql = "select * from producto where id = ".$_GET['id'];
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);

	echo '<table cellspacing="0">';
	echo '<tr>';
	echo '<td>Nombre de categoria</td><td><input type=text name=categoria value="'.$row['descripcion'].'"></td>';
	echo '</tr>';
	echo '<tr>';
	echo '</tr>';
	echo '</table>';

} else {
     
	$sql = "select * from producto order by id asc";
	$res = mysql_query($sql);

	if (mysql_num_rows($res)>0)     {
		echo '<table cellspacing="0">';
		echo '<tr><td>Nombre del producto</td><td>ver detalle</td></tr>';
		while ($row = mysql_fetch_array($res)) {
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