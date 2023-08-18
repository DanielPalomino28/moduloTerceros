<?php $url_base="http://localhost/moduloTerceros/"; ?>

<!doctype html>
<html lang="es">

<head>
  <title>Módulo terceros</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- jquery dataTable -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <!-- estilos personalizados -->
  <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <nav class="navbar navbar-expand navbar-light" style="background-color: #e3f2fd">
        <ul class="nav navbar-nav" id="encabezado"> 
               
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo $url_base; ?>" aria-current="page">Página principal<span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/moduloTerceros/modulos/tercero">Listado de terceros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/moduloTerceros/modulos/tercero/reporteTercerocopy.php">Reporte terceros</a>
                </li> 
        </ul>
    </nav>

  <main class="container">