<?php include 'cnx.php';   ?>
<html>
<head>
	<title>Baja de producto</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<a href='index.php'>Volver</a><br />

<?php

$_POST = clean($_POST);

if ($_POST[subgrabar]) {
	for ($i=1; $i<=$_POST['cant']; $i++) {
          // var_dump($_POST);
          $temp = 'check'.$i;
          if ($_POST[$temp]) {
               mysql_query('BEGIN WORK');
               $sql = "delete from producto where id = ".$_POST[$temp];
               $res = mysql_query($sql);
               mysql_query('COMMIT');
		}
	}
}

$sql = "select * from producto order by descripcion asc";
$res = mysql_query($sql);

if (mysql_num_rows($res))    {
     echo '<form action="?" method=POST>';
     echo '<table cellspacing="0">';
     echo '<tr><td>Nombre</td><td>dar de baja</td></tr>';

     $c=1;
     while ($row = mysql_fetch_array($res))  {
          echo '<tr>';
          echo '<td>'.$row['descripcion'].'</td>';
          echo '<td><input type=checkbox name=check'.$c.' value='.$row['id'].'></td>';
          echo '</tr>';
          $c++;
     }
     echo '<input type=hidden name=cant value='.$c.'>';
     echo '<tr>';
     echo '<td colspan="2"><input value="Dar de Baja" type="submit" name="subgrabar"></td>';
     echo '</tr>';
     echo '</table>';
     echo '</form>';
} else {
     echo 'No se encontraron categorias';
}

?>

</body>
</html>