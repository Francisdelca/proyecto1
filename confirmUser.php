<?php
session_start();
if(isset($_SESSION['usuarivalido']))
{
   
}
else
{
    header('location: login.php?b=2');
}
?>