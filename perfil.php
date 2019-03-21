<?php
require_once('header.php');
require_once('conexion.php');
if(isset($_SESSION['usuarivalido']))
{
    $userId = $_GET['idu'];
    $user = $conexion -> query("SELECT * FROM usuario WHERE id = $userId");
    $row = $user -> fetch_array();
}
else
{
    header('location: login.php?v=1');
}
?>
<div class="perfil-container">
    <div class="perfil">
        <div class="foto-perfil">
            <img src="" alt="">
        </div>
        <div class="name-user">
            <h2><?php echo $row["nombre"], " ", $row["apellido"] ?></h2>
            <p><?php echo $row["usuario"] ?></p>
        </div>
        <div class="info-user">
            <ul>
                <li><i class="far fa-envelope">&nbsp;</i><?php echo $row["email"] ?></li>
                <li><i class="fas fa-calendar-day">&nbsp;</i><?php echo $row["nacimiento"] ?></li>
                <li><i class="fas fa-genderless">&nbsp;</i><?php echo $row["sexo"]?></li>
            </ul>
        </div>

        <div class="perfil-links">
            <ul>
                <li><a id="tusEventos" class="link-active" href="#">Tus eventos</a></li>
                <li><a id="tusEntradas" href="#">Tus entradas</a></li>
            </ul>
        </div>
    </div>
    <div id="contenido">

    </div>
</div>
<?php
require_once('footer.php');
?>