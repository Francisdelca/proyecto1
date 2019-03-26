<?php
require_once('conexion.php');
$rel = $conexion -> query("SELECT * FROM eventos"); 
$titulo=array();
while($row = $rel -> fetch_array())
{
    $titulo[] = $row['titulo'];
}

require_once('userConnect.php');
session_start();
$Usuario=$_SESSION['usuarivalido']['usuario'];
$limit = count($titulo);
for($i = 0; $i < $limit; $i++)
{
    $t = str_replace(" ", "_", $titulo[$i]);
    $row = $conexion -> query("SELECT * FROM $t")->fetch_array();


    
    echo $row['usuario']."<br>";
}

?>
