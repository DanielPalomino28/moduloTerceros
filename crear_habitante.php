<?php
// Configurar la conexión a la base de datos
$host = "localhost";
$usuario = "danielpalomino";
$contrasena = "ha_z5.X0OPrOo27R";
$bd = "comunidad";


// Crear una conexión a la base de datos
$conn = new mysqli($host, $usuario, $contrasena, $bd);

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $id_habitante = $_POST['id_habitante'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $ocupacion = $_POST['ocupacion'];
    $ingresos = $_POST['ingresos'];
    $miembros_familia = $_POST['miembros_familia'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $estrato = $_POST['estrato'];
    $id_propiedad = $_POST['id_propiedad'];
    $direccionP = $_POST['direccionP'];
    $tamano_terreno = $_POST['tamano_terreno'];
    $num_habitaciones = $_POST['num_habitaciones'];
    $estado_conservacion = $_POST['estado_conservacion'];

    // Insertar los datos en las tablas habitante y propiedad
    $query_habitante = "INSERT INTO habitante (id_habitante, nombre, apellido, edad, ocupacion, ingresos, miembros_familia, telefono, correo, estrato, fk_id_propiedad) VALUES ('$id_habitante','$nombre', '$apellido', '$edad', '$ocupacion', '$ingresos', '$miembros_familia', '$telefono', '$correo', '$estrato', '$id_propiedad')";
    mysqli_query($conn, $query_habitante);

    // Obtener el id del habitante insertado
    $id_habitante = mysqli_insert_id($conn);

    // Insertar los datos en la tabla propiedad
    $query_propiedad = "INSERT INTO propiedad (id_propiedad, direccionP, tamano_terreno; num_habitaciones, estado_conservacion) VALUES ('$tipo_propiedad', '$direccion_propiedad', '$id_habitante')";
    mysqli_query($conn, $query_propiedad);

    // Redirigir a la página de habitantes creados
    header('Location: leer_habitantes.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Habitante</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="crearH">
    
    <form method="post">
        <h2>Ingrese la información del habitante</h2>
        <label>Id:</label>
        <input type="number" name="id_habitante" required>
        <br>
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label>Apellido:</label>
        <input type="text" name="apellido" required>
        <br>
        <label>Edad:</label>
        <input type="number" name="edad" required>
        <br>
        <label>Ocupacion:</label>
        <input type="text" name="ocupacion" required>
        <br>
        <label>Ingresos:</label>
        <input type="number" name="ingresos" required>
        <br>
        <label>Miembros de la familia:</label>
        <input type="number" name="miembros_familia" required>
        <br>
        <label>Teléfono:</label>
        <input type="tel" name="telefono" required>
        <br>
        <label>Correo:</label>
        <input type="email" name="correo" required>
        <br>
        <label>Estrato:</label>
        <select name="estrato" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        <br>
       

        <h2>Ingrese la información de la propiedad</h2> 
        <br>
        <label>Id propiedad:</label>
        <input type="number" name="id_propiedad " required>
        <br>
        <label>Dirección:</label>
        <input type="text" name="direccionP" required>
        <br>
        <label>Tamaño del terreno (mtr^2):</label>
        <input type="number" name="tamano_terreno" required>
        <br>
        <label>Número de habitaciones:</label>
        <input type="number" name="num_habitaciones" required>
        <br>
        <label>Estado de conservación:</label>
        <select name="estado_conservacion" required>
            <option value="Excelente">Excelente</option>
            <option value="Bueno">Bueno</option>
            <option value="Normal">Normal</option>
            <option value="Regular">Regular</option>
            <option value="Malo">Malo</option>
        </select>
        <br>
        <br>

        <input type="submit" value="Crear">
    </form>

    



</body>
</html>
