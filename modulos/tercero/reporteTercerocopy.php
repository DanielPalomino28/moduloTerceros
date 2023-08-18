<!-- Include Header-->
<?php 
    include("../../templates/header.php");
?>

<!-- Conexión a la base de datos y consulta sql para eliminar por id del tercero-->
<?php
    include("../../conexion.php");
    if($_GET){
        include("filtroReporte.php");
    }
    else{
        $stm = $conexion ->prepare("SELECT * FROM terceros");
        $stm->execute();
        $terceros = $stm->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<form method="GET" action="" >
    <!-- <label for="fecha_inicio">Fecha inicial:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio">
    <label for="fecha_fin">Fecha final:</label>
    <input type="date" id="fecha_fin" name="fecha_fin"> -->

    <div class="opcionesReporte">
        <div class="input-group">
            <span class="input-group-text">Rango de fechas</span>
            <input type="date" id="fecha_inicio" name="fecha_inicio" class="bntRango">
            <input type="date" id="fecha_fin" name="fecha_fin" class="bntRango">
        </div>
        <div class="form-floating">
            <select id="filtro_columna" name="filtro_columna" class="form-select">
                <option value="todos" selected>Todos</option>
                <option value="on">Solo pacientes</option>
                <option value="">Solo terceros</option>
            </select>
            <label for="filtro_columna">Filtrar por:</label>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
            <a href="reporteTercerocopy.php" class="btn btn-warning">Quitar Filtros</a>
        </div>
    </div>
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