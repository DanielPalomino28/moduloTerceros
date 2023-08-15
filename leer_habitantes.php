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
  $query = "SELECT * FROM habitante LEFT JOIN propiedad ON habitante.fk_id_propiedad = propiedad.id_propiedad";
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
    <h1>Información registrada de los habitantes y sus propiedades.</h1>
    <br>
<table class="tabla-comunidad">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Edad</th>
      <th>Ocupación</th>
      <th>Miembros de la familia</th>
      <th>Estrato</th>
      <th>Ingresos</th>
      <th>Teléfono</th>
      <th>Correo</th>
      <th>Id propiedad</th>
      <th>Dirección propiedad</th>
      <th>Tamaño terreno(mtr^2)</th>
      <th>Habitaciones</th>
      <th>Estado conservación</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($comunidad as $comunidad) : ?>
      <tr>
        <td><?php echo $comunidad['id_habitante'] ?></td>
        <td><?php echo $comunidad['nombre'] ?></td>
        <td><?php echo $comunidad['apellido'] ?></td>
        <td><?php echo $comunidad['edad'] ?></td>
        <td><?php echo $comunidad['ocupacion'] ?></td>
        <td><?php echo $comunidad['miembros_familia'] ?></td>
        <td><?php echo $comunidad['estrato'] ?></td>
        <td><?php echo $comunidad['ingresos'] ?></td>
        <td><?php echo $comunidad['telefono'] ?></td>
        <td><?php echo $comunidad['correo'] ?></td>
        <td><?php echo $comunidad['id_propiedad'] ?></td>
        <td><?php echo $comunidad['direccionP'] ?></td>
        <td><?php echo $comunidad['tamano_terreno'] ?></td>
        <td><?php echo $comunidad['num_habitaciones'] ?></td>
        <td><?php echo $comunidad['estado_conservacion'] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>


</body>
</html>
