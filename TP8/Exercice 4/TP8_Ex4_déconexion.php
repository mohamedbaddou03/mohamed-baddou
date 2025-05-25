<?php
session_start();
session_destroy();
header("Location: TP8_EX4_conexion.php");
exit();
?>