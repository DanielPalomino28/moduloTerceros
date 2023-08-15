<?php
// Conexión a la base de datos
$host = "localhost";
$usuario = "DanielPalomino";
$contrasena = "6at6AOuepMk3ryBr";
$bd = "bdterceros";

$con = mysqli_connect($host, $usuario, $contrasena, $bd);
if (mysqli_connect_errno()) {
	echo "Error al conectarse a la base de datos: " . mysqli_connect_error();
	exit();
}
header("Location: bienvenida.php");

// Cerrar la conexión a la base de datos
mysqli_close($con);
?>

