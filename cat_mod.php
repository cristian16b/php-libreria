<?php include 'cnx.php';   ?>
<html>
<head>
	<title>Modificacion de Categorias</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php

include 'menu.php';

$_POST = clean($_POST);
$_GET = clean($_GET);

if ($_POST[subgrabar]) {
     $sql =  " update categoria set";
     $sql .= " desc_cat = '".$_POST[categoria]."'";
     $sql .= " where cod_cat = ".$_POST[cod_cat];

     $res = mysql_query($sql);
     $_GET[cod_cat]='';
}

if ($_GET[cod_cat]) {

	$sql = "select * from categoria where cod_cat = ".$_GET[cod_cat];
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);

	echo '<form method=POST action="?">';

	echo '<table cellspacing="0">';
	echo '<tr>';
	echo '<td>Nombre de categoria</td><td><input type=text name=categoria value="'.$row[desc_cat].'"></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td colspan="2"><input value="Modificar" type="submit" name="subgrabar"></td>';
	echo '</tr>';
	echo '</table>';

	echo '<input type=hidden name=cod_cat value='.$row[cod_cat].'>';

	echo '</form>';

} else {
     
	$sql = "select * from categoria order by desc_cat asc";
	$res = mysql_query($sql);

	if (mysql_num_rows($res)>0)     {
		echo '<table cellspacing="0">';
		echo '<tr><td>Nombre de categoria</td><td>ver detalle</td></tr>';
		while ($row = mysql_fetch_array($res)) {
			echo '<tr>';
			echo '<td>'.$row[desc_cat].'</td><td><a href=cat_mod.php?cod_cat='.$row[cod_cat].'>ver detalle</a></td>';
			echo '</tr>';
		}
		echo '</table>';
	} else                          {
		echo 'no hay categorias disponibles';
	}
}

?>
</body>
</html>
