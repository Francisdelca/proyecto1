<?php
require_once('conexion.php');
$id = $_GET['id'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
//miniatura
$mininame = $_FILES['imagen']['name'];
$miniArchivo = $_FILES['imagen']['tmp_name'];
//portada
$portname = $_FILES['portada']['name'];
$portArchivo = $_FILES['portada']['tmp_name'];
//guardamos las imagenes
$ubicacion = "img/eventos/";
move_uploaded_file($portArchivo, $ubicacion.$portname);
move_uploaded_file($miniArchivo, $ubicacion.$mininame);

$sql="UPDATE eventos SET descripcion = '$descripcion', imagen = '$mininame', portada ='$portname', precio = '$precio' WHERE id = $id";
$resultado = $conexion->query($sql);

if($resultado)
{
    $ruta = 'location: plantilla.php?id='.$id;
}
else
{
    //incorrecto
    $ruta = 'location: regevento.php?V=1';
}

header($ruta);
?>