<?php
require_once('conexion.php');

$usuario = $_POST['usser'];
$clave = $_POST['pass'];
$bandera = 0;
//echo "valores: " .$usuario. " " .$clave;

$sql = "SELECT *FROM usuario";

$resultado = $conexion -> query($sql);

while($fila = $resultado -> fetch_array(MYSQLI_ASSOC))
{
    if($fila['email']==$usuario or $fila['usuario']==$usuario) //usuario
    {

        //clave
        if($fila['clave']==$clave)
        {
            $bandera = 1;
            //inicio de una sesion valida 
            session_start();
            $_SESSION['usuarivalido']=$fila; //guardar todo registro corecto 
            break; 
        }
        else
        {
            echo "error en la clave";
            $bandera = 2;
            break;
        }
    }
    else
    {
        echo "usuario no existe";
        $bandera = 3;
        //break;
    }

}

//analizar el comportamiento de los estados

$ruta = "";
switch($bandera)
{
    case 1: //todo correcto
        $ruta="location: index.php";
        break;
    case 2: //error en la clave
        $ruta="location: login.php?v=2";
        break;
    case 3: //error en el usuario
        $ruta="location: login.php?v=3";
        break;
}

header($ruta);//redireciona según el caso
?>