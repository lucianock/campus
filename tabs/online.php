<?php


include "../config.php";

$db = new sqlite3('../data/campus.db');
$hora=time()-$duracionSesion;

$results = $db->query("SELECT * FROM sesiones WHERE epoch >=". $hora);


$fechaAct=date("H:i d/m/Y",$hora);


echo "<h3> Estan conectados: </h3>";

while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
   $userID=$row["userID"];
   $epoch=$row["epoch"];

   $fechaCon=date("H:i d/m/Y",$epoch);


   $r= $db->query("SELECT * FROM usuarios WHERE ID = '".$userID."'");
   $fila = $r->fetchArray(SQLITE3_ASSOC);

   $foto=$fila["foto"];

   $usuario= $fila["nombre"]." ".$fila["apellido"];

   if($foto=="")$foto="avatares/propios/general.png";
   

   echo '<div style="width:100%; height:50px; display:flex; margin-top:15px;">';
   
   		echo '<div style="width:50px; height:50px; border-radius:50%; overflow: hidden;">';
   		echo '<img src="frontend/'.$foto.'" width="100%">';
   		echo '</div>';
   		echo '<div style="line-height:50px; padding-left:10px;">'.$usuario.' conectado en: '. $fechaCon .'</div>';
   echo '</div>';

}




?>


