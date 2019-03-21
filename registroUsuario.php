<?php
require_once('conexion.php');

$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$clave = $_POST['clave'];
$nacimiento = $_POST['fecha'];
$sexo = $_POST['sexo'];

$sql = "INSERT INTO usuario(usuario, nombre, apellido, email, clave, nacimiento, sexo) VALUE('$usuario','$nombre', '$apellido', '$email', '$clave', '$nacimiento', '$sexo')";
$resultado = $conexion->query($sql);

if($resultado)
{
    $ruta = 'location: login.php';

}
else
{
    $ruta = 'location: registro.php';

}
header($ruta);
?>