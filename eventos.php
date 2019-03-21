<?php 
require_once("header.php");
require_once("conexion.php");

$filtro = $_GET['f'];
$id = $_GET['id'];
?>
<div class="categoria">
<?php
if($id > 0)
{
    $cat = $conexion->query("SELECT * FROM categoria WHERE id != $id");
}
else
{
    $cat = $conexion->query("SELECT * FROM categoria");
}

echo "<div class='cate'> <h4>Categorias</h4><br>";
while($catRow = $cat->fetch_array())
{
?>
<a class="cate-item" href="eventos.php?f=<?php echo $filtro?>&&id=<?php echo $catRow['id']?>" style="background:<?php echo $catRow['color']?>">
<?php echo $catRow['categoria']?>
</a>
<?php
}
?>
</div>

<div class="cat-select">
<?php
$sel = $conexion->query("SELECT * FROM categoria WHERE id = $id");
$catRow = $sel->fetch_array();
?>
<a class="cate-item" href="eventos.php?f=<?php echo $filtro?>&&id=<?php echo $catRow['id']?>" style="background:<?php echo $catRow['color']?>">
<?php echo $catRow['categoria']?>
</a>
</div>

<div class="order">
<p><i class="fas fa-sliders-h"></i></p>
<ul>
    <li><a href="eventos.php?f=1&&id=<?php echo $id ?>"><i class="fas fa-chart-line">&nbsp;</i>Top ventas</a></li>
    <li><a href="eventos.php?f=2&&id=<?php echo $id ?>"><i class="far fa-calendar-alt">&nbsp;</i>Esta semana</a></li>
    <li><a href="eventos.php?f=3&&id=<?php echo $id ?>"><i class="fas fa-fire">&nbsp;</i>Nuevos eventos</a></li>
</ul>
</div>
<a href="eventos.php?f=0&&id=0" class="clean">Limpiar filtros</a>
</div>
<!-- fin categorias -->
<div class="event-content">
<?php
switch($filtro)
{
    case 0:
        if($id == 0)
        {
            $rel = $conexion->query("SELECT * FROM eventos"); 
        }
        else
        {
            $rel = $conexion->query("SELECT * FROM eventos WHERE categoria = $id");
        }
    break;
    case 1:
    if($id == 0)
    {
        $rel = $conexion->query("SELECT * FROM eventos WHERE asistentes > 30 ORDER BY asistentes DESC"); 
    }
    else
    {
        $rel = $conexion->query("SELECT * FROM eventos WHERE asistentes > 30 AND categoria = $id ORDER BY asistentes DESC"); 
    }
    break;
    case 2:
    if($id == 0)
    {
        $rel = $conexion->query("SELECT * FROM eventos WHERE fecha  BETWEEN CURDATE() and CURDATE() + INTERVAL 7 DAY"); 
    }
    else
    {
        $rel = $conexion->query("SELECT * FROM eventos WHERE fecha  BETWEEN CURDATE() and CURDATE() + INTERVAL 7 DAY AND categoria = $id");  
    }
    break;
    case 3:
    if($id == 0)
    {
        $rel = $conexion->query("SELECT * FROM eventos ORDER BY id DESC"); 
    }
    else
    {
        $rel = $conexion->query("SELECT * FROM eventos  WHERE categoria = $id ORDER BY id DESC"); 
    } 
    break;
}

require_once("itemEvento.php");
?>
</div>
<?php
require_once("footer.php");
?>