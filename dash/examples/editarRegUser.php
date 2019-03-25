<?php
    require_once("cabeza.php");
    require_once("conexion.php");

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $sql="SELECT *FROM usuario where id=$id";
        $resultado=$conexion->query($sql);
        $fila=$resultado->fetch_array(MYSQLI_ASSOC); //obtenemos el registro del resultado
        $id=$fila['id'];
        $usuario=$fila['usuario'];
        $nombre=$fila['nombre'];
        $apellido=$fila['apellido'];
        $email=$fila['email'];
        $clave=$fila['clave'];
        $nacimiento=$fila['nacimiento'];
        $sexo=$fila['sexo'];
    }
?>

    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Editar usuarios</li>
    </ol>
    <hr>
        <p>Lista de usuario para Editar al Sistema.</p>


    <form method="post" action="editarUs.php">

        <p>ID: <input type="text" name="id" value="<?php echo $id; ?>" readonly></p>
        <p>USUARIO: <input type="text" name="usuario" value="<?php echo $usuario; ?>" id=""></p>
        <p>NOMBRES: <input type="text" name="nombre" value="<?php echo $nombre; ?>" id=""></p>
        <p>APELLIDOS: <input type="text" name="apellido" value="<?php echo $apellido; ?>" id=""></p>
        <p>EMAIL: <input type="text" name="email" value="<?php echo $email; ?>" id=""></p>
        <p>CONTRASEÑA: <input type="text" name="clave" value="<?php echo $clave; ?>" id=""></p>
        <p>FECHA: <input type="text" name="nacimiento" value="<?php echo $nacimiento; ?>" id=""></p>
        <p>SEXO: 
        <select name="sexo" id="" required>
                <?php
                if($sexo == 1)
                {
                ?>
                    <option value="1" selected>Masculino</option>
                    <option value="2">Femenino</option>
                <?php
                }else 
                {
                ?>
                    <option value="1">Masculino</option>
                    <option value="2" selected>Femenino</option>
                <?php 
                }
                ?>
            </select>
        </p>
        <p><input type="submit" value="ACTUALIZAR"></p>
    
    </form>
<?php
require_once("footer.php");
?>