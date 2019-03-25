<?php
require_once('conexion.php');
$categoria = $_POST['categoria'];
$color = $_POST['color'];

$sql = "INSERT INTO categoria (categoria, color) VALUE('$categoria', '$color')";
$resultado = $conexion->query($sql);

header('location: categoria.php');
?>