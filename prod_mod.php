<?php include 'cnx.php';   ?>
<html>
<head>
	<title>Modificacion de producto</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<a href='index.php'>Volver</a><br />

<?php

include 'conx.php';

$_POST = clean($_POST);
$_GET = clean($_GET);

if ($_POST[subgrabar]) {
	 mysqli_query($cnx,'BEGIN WORK');
     $sql =  " update producto set";
     $sql .= " descripcion = '".$_POST['categoria']."'";
	 $sql .= " where id = ".$_POST['id'];

	 $res = mysqli_query($cnx,$sql);
	 mysqli_query($cnx,'COMMIT');
     $_GET['id']='';
}

if ($_GET['id']) {

	$sql = "select * from producto where id = ".$_GET['id'];
	$res = mysqli_query($cnx,$sql);
	$row = mysqli_fetch_array($res);

	echo '<form method=POST action="?">';

	echo '<table cellspacing="0">';
	echo '<tr>';
	echo '<td>Nombre de categoria</td><td><input type=text name=categoria value="'.$row['descripcion'].'"></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td colspan="2"><input value="Modificar" type="submit" name="subgrabar"></td>';
	echo '</tr>';
	echo '</table>';

	echo '<input type=hidden name=id value='.$row['id'].'>';

	echo '</form>';

} else {
     
	$sql = "select * from producto order by id asc";
	$res = mysqli_query($cnx,$sql);

	if (mysqli_num_rows($res)>0)     {
		echo '<table cellspacing="0">';
		echo '<tr><td>Nombre del producto</td><td>ver detalle</td></tr>';
		while ($row = mysqli_fetch_array($res)) {
			echo '<tr>';
			echo '<td>'.$row['descripcion'].'</td><td><a href=prod_mod.php?id='.$row['id'].'>ver detalle</a></td>';
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
