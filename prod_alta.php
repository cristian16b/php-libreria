<?php include 'cnx.php';   ?>
<html>
<head>
	<title>Alta de producto</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<a href='index.php'>Volver</a><br />

<?php

if ($_POST[subgrabar]) {

	$_POST = clean($_POST);

	if ($_POST[producto]) {
		mysql_query('BEGIN WORK');

		$sql = "select max(cod_cat) as M from producto";
		$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		if ($row[M]>0)
		$max = $row[M] +1;
		else
		$max = 1;

		$sql = "insert into producto values (";
		$sql .= $max.", ";
		$sql .= "'".$_POST[producto]."') ";
		$res = mysql_query($sql);

		mysql_query('COMMIT');
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
