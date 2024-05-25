<?php

$id=$_GET['id'];


// se completan los datos del archivo en la bdd
$database="../data/notas.db";

/////////////////////////////////////////////////////////////////////////
// primero que nada se abre la base de datos para obtener un manejador
// global del objeto de base de datos
/////////////////////////////////////////////////////////////////////////
$db = new SQLite3($database) or die('no se puede abrir la base de datos'. $database);


$sqlquery="DELETE FROM notas WHERE id=".$id;




$results = $db->query($sqlquery);

$lastID=$db->lastInsertRowID();


header('Location: mostrarNotas.php');

?>