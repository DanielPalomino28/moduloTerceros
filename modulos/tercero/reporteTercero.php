<!-- Include Header-->
<?php 
    include("../../templates/header.php");
?>

<!-- Conexión a la base de datos y consulta sql para eliminar por id del tercero-->
<?php
    include("../../conexion.php");
    $stm = $conexion ->prepare("SELECT * FROM terceros");
    $stm->execute();<!-- Include Header-->
    <?php 
        include("../../templates/header.php");
    ?>
    
    <!-- Conexión a la base de datos y consulta sql para eliminar por id del tercero-->
    <?php
        include("../../conexion.php");
        if($_GET){
            $fechaInicio = $_GET['fecha_inicio'];
            $fechaFin = $_GET['fecha_fin'];
            $filtroColumna = $_GET['filtro_columna'];
            // Construir la consulta SQL con los filtros
            $sql = "SELECT * FROM terceros WHERE fechaNacimiento BETWEEN '$fechaInicio' AND '$fechaFin'";
    
            if ($filtroColumna !== "todos") {
                $sql .= " AND esPaciente = '$filtroColumna'";
            }
            
            $stm = $conexion ->prepare($sql);
            $stm->execute();
            $terceros = $stm->fetchAll(PDO::FETCH_ASSOC);
    
        }
        else{
            $stm = $conexion ->prepare("SELECT * FROM terceros");
            $stm->execute();
            $terceros = $stm->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>
    
    <form method="GET" action="">
        <label for="fecha_inicio">Fecha inicial:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required>
        <label for="fecha_fin">Fecha final:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" required>
        
        <label for="filtro_columna">Filtrar tipo de tercero:</label>
        <select id="filtro_columna" name="filtro_columna">
            <option value="todos">Todos</option>
            <option value="on">Solo pacientes</option>
            <option value="">Solo terceros</option>
        </select>
        <button type="submit">Aplicar Filtros</button>
        <a href="reporteTercerocopy.php" class="quitar-filtros">Quitar Filtros</a>
    </form>
    
    
    <!-- Tabla terceros -->
    <div class="table-responsive" >
        <table table id="myTable" class="table table-secondary table-striped table-hover table-borderless" >
            
            <thead>
                <tr>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Tipo de documento</th>
                    <th scope="col">Número de documento</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">¿Es paciente?</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($terceros as $tercero){?>
                    <tr class="">
                        <td scope="row"> <?php echo $tercero['nombresTercero'];?></td>
                        <td><?php echo $tercero['apellidosTercero'];?></td>
                        <td> <?php echo $tercero['tipoDocumento'];?> </td>
                        <td> <?php echo $tercero['numeroDocumento'];?> </td>
                        <td> 
                            <?php 
                                // Se obtienen las fecha de nacimiento del paciente y la fecha actual
                                $fechaInicial =$tercero['fechaNacimiento'];
                                $fechaActual = date("Y-m-d");
                                // Las fechas se convienten a tipo objeto DateTime
                                $datetime1 = new DateTime($fechaInicial);
                                $datetime2 = new DateTime($fechaActual);
                                // Se calcula la diferencia entre las dos fecha
                                $interval = $interval = $datetime1->diff($datetime2);
                                //Se muestra la diferencia (edad del tercero) en años y meses
                                    // echo $interval->format('%y años y %m meses');
                                // Se muestra edad en años
                                echo $interval->format('%y años');
                            ?> 
                        </td>
                        <td>
                            <?php echo $tercero['fechaNacimiento'];?>
                        </td>
                        <td> 
                            <?php if($tercero['esPaciente']==="on"){
                                echo "Si";}
                                else{
                                    echo "No";
                                }
                            ?> 
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    
    
    <!-- Include Footer  -->
    <?php include("../../templates/footer.php");?>
    <?php include("creartercero.php");?>
    $terceros = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Button trigger modal para crear tercero -->
<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#creartercero">
    Crear tercero
</button> 


<!-- Tabla terceros -->
<div class="table-responsive" >
    <table table id="myTable" class="table table-secondary table-striped table-hover table-borderless" >
        
        <thead>
            <tr>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Tipo de documento</th>
                <th scope="col">Número de documento</th>
                <th scope="col">Edad</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">¿Es paciente?</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($terceros as $tercero){?>
                <tr class="">
                    <td scope="row"> <?php echo $tercero['nombresTercero'];?></td>
                    <td><?php echo $tercero['apellidosTercero'];?></td>
                    <td> <?php echo $tercero['tipoDocumento'];?> </td>
                    <td> <?php echo $tercero['numeroDocumento'];?> </td>
                    <td> 
                        <?php 
                            // Se obtienen las fecha de nacimiento del paciente y la fecha actual
                            $fechaInicial =$tercero['fechaNacimiento'];
                            $fechaActual = date("Y-m-d");
                            // Las fechas se convienten a tipo objeto DateTime
                            $datetime1 = new DateTime($fechaInicial);
                            $datetime2 = new DateTime($fechaActual);
                            // Se calcula la diferencia entre las dos fecha
                            $interval = $interval = $datetime1->diff($datetime2);
                            //Se muestra la diferencia (edad del tercero) en años y meses
                                // echo $interval->format('%y años y %m meses');
                            // Se muestra edad en años
                            echo $interval->format('%y años');
                        ?> 
                    </td>
                    <td>
                        <?php echo $tercero['fechaNacimiento'];?>
                    </td>
                    <td> 
                        <?php if($tercero['esPaciente']==="on"){
                            echo "Si";}
                            else{
                                echo "No";
                            }
                        ?> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>



<!-- Include Footer  -->
<?php include("../../templates/footer.php");?>
<?php include("creartercero.php");?>