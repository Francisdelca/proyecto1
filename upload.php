<?php
require_once('header.php');
require_once('conexion.php');
if(isset($_SESSION['usuarivalido']))
{
    $id = $_GET['id'];
    $result = $conexion->query("SELECT * FROM eventos where id = $id");
    $row = $result->fetch_array();
    $userId = $row['organizador'];
    $user = $conexion->query("SELECT * FROM usuario WHERE id = $userId")->fetch_array();
}
else
{
    header('location: login.php?v=1');
}
 
?>
<link rel="stylesheet" href="css/event.css">

<form action="comeon.php?id=<?php echo $row['id'];?>" method="post" class="contenedor" enctype="multipart/form-data">
    <div class="todo-evento">
        <div id="imgPortada" >
        <img id="port">
            <input type="file" name="portada" id="portada">
            <label for="portada" id="imgname2"><i class="far fa-image">&nbsp;</i>Elige una portada</label>
        </div>
        <div class="datos-evento">
            <div id="imgMini">
                <img id="mini">
                <input type="file" name="imagen" id="miniatura">
                <label for="miniatura" id="imgname1"><i class="far fa-image">&nbsp;</i>Elige una miniatura</label>
            </div>
            <div class="info-evento">
                <h1><?php echo $row['titulo'];?></h1>
                <a href="perfil.php?user=<?php echo $user['id']?>"><i class="fas fa-user-astronaut">&nbsp;</i><?php echo $user['usuario']?></a>
                <div class="datitos">
                <p><i class="fas fa-map-marker-alt">&nbsp;</i><?php echo $row['direccion'];?></p>
                <p><i class="fas fa-calendar-day">&nbsp;</i><?php echo $row['fecha'];?></p>
                <p><i class="fas fa-clock">&nbsp;</i><?php echo $row['hora'];?></p>
                <p><i class="fas fa-users">&nbsp;</i><?php echo $row['asistentes'];?></p>
                </div>
            </div>
        </div>
        <div class="descript">
            <h2>Descripcion:</h2><br>
            <p><textarea maxlength="500" name="descripcion"  rows="7" placeholder="Describe tu evento..."></textarea></p>
        </div>
    </div>

    <!-- ads -->
    <div class="sidebar">
        <div class="entradas">
            <h2>S/.<input type="text" name="precio" planceholder="Precio"></h2> <a href="#">Comprar</a>
        </div>
    </div>
    <div class="envio">
        <input type="submit" value="Guardar">
    </div>
</form>
<?php
require_once('footer.php');
?>