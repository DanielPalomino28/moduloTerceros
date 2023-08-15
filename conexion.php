<?php
$servidor = "localhost";
$db = "bdterceros";
$username = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host=$servidor;bdname=$db",$username,$password);
} catch (Exception $ex) {
    echo $ex ->getMessage();
}
?>