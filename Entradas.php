<?php
require_once('conexion.php');
require_once("header.php");

$iduser=$_SESSION['usuarivalido']['id'];
$id = $_GET['id'];
$rel = $conexion -> query("SELECT * FROM eventos WHERE id = $id");
$row = $rel -> fetch_array();
?>
<link href="css/1.css" rel="stylesheet" id="bootstrap-css">
<div class="contain background">
    <div class="entradas-contain">
        <form action="comprarEntrada.php?idu=<?php echo $iduser ?>&&ev=<?php echo str_replace(" ", "_", $row['titulo']) ?>&&id=<?php echo $id ?>" method="post">
        <h1>Compra tus entradas</h1>
                    <br>
            <div class="ticket">
                <div class="numero-entradas">
                    <div class="prev"><a href="#" onclick="mas()"><i class="fas fa-chevron-up"></i></a></div>
                    <input type="text" id="numeroEntrada" name="numero" value="1" readonly>
                    <div class="next"><a href="#"><i class="fas fa-chevron-down"></i></a></div>
                </div>
                <div class="total">
                    <h2 id="total">Total: S/.<?php echo $row['precio'] ?></h2> 
                </div>  
            </div><br>
            <input type="submit" value="Comprar">
        </form>
        <div class="preview-entrada">
            <h1><?php echo $row['titulo'] ?></h1>
            <p>Fecha: <?php echo $row['fecha'] ?></p>
            <p>Hora: <?php echo $row['hora'] ?></p>
            <p>Dirección: <?php echo $row['direccion'] ?></p>
            <div class="barCode">
                <h2>Eventual.com</h2>
                <img src="https://hdnh.es/wp-content/uploads/2009/08/codigo-barras.png" alt="">
            </div>
        </div>
   </div>
</div>
<?php
require_once("footer.php");
?>