<?php
  // Configurar la conexión a la base de datos
    $host = "localhost";
    $usuario = "danielpalomino";
    $contrasena = "ha_z5.X0OPrOo27R";
    $bd = "comunidad";


  // Crear una conexión a la base de datos
  $conn = new mysqli($host, $usuario, $contrasena, $bd);

  // Verificar si la conexión es exitosa
  if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
  }

  // Realizar una consulta SQL para obtener los datos de las entidades
  $query = "SELECT * FROM usuario";
  $result = $conn->query($query);

  // Verificar si la consulta es exitosa
  if ($result === false) {
    die("Error al realizar la consulta: " . $conn->error);
  }

  // Obtener los datos de las entidades
  $comunidad = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Leer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    <h1>Usuarios registrados</h1>
    <br>
<table class="tabla-comunidad">
  <thead>
    <tr>
      <th>Id usuario</th>
      <th>Nombre usuario</th>
      <th>Contraseña</th>
      <th>Rol</th>
      <th>Fecha_creación</th>
      <th>Última sesión</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($comunidad as $comunidad) : ?>
      <tr>
        <td><?php echo $comunidad['id_usuario'] ?></td>
        <td><?php echo $comunidad['nombre_usuario'] ?></td>
        <td><?php echo $comunidad['contrasena'] ?></td>
        <td><?php echo $comunidad['rol'] ?></td>
        <td><?php echo $comunidad['fecha_creacion'] ?></td>
        <td><?php echo $comunidad['ultima_sesion'] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>


</body>
</html>
