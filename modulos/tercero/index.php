<!-- Include Header-->
<?php 
    include("../../templates/header.php");
?>

<!-- Conexión a la base de datos y consulta sql para eliminar por id del tercero-->
<?php
    include("../../conexion.php");
    // Preparar una consulta SQL para seleccionar todos los registros de la tabla "terceros"
    $stm = $conexion->prepare("SELECT * FROM terceros");

    // Ejecutar la consulta preparada
    $stm->execute();
    // Recupera todos los registros de la consulta y los almacena en un array asociativo
    $terceros = $stm->fetchAll(PDO::FETCH_ASSOC);   

    if(isset($_GET['id'])){
        $txtid=(isset($_GET['id'])?$_GET['id']:"");
        $stm=$conexion->prepare("DELETE FROM terceros WHERE id=:txtid");
        $stm->bindParam(":txtid",$txtid);
        $stm->execute();
        header("location: index.php");
    }
?>

<div class="crearT">
    <!-- Button trigger modal para crear tercero -->
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#creartercero" id="btnCrearT">
        Crear tercero
    </button> 
</div>

<!-- Tabla terceros -->
<div class="table-responsive" >
    <table table id="myTable" class="table table-secondary table-striped table-hover table-borderless" >
        
        <thead>
            <tr>
                <th scope="col">Nombre completo</th>
                <th scope="col">Tipo de documento</th>
                <th scope="col">Número de documento</th>
                <th scope="col">Edad</th>
                <th scope="col">¿Es paciente?</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($terceros as $tercero){?>
                <tr class="">
                    <td scope="row"> <?php echo $tercero['nombresTercero'];?> <?php echo $tercero['apellidosTercero'];?></td>
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
                        <?php if($tercero['esPaciente']==="on"){
                            echo "Si";}
                            else{
                                echo "No";
                            }
                        ?> 
                    </td>
                    <td>  
                        <a href="editar.php?id=<?php echo $tercero['id'];?>" class="btn btn-primary">Editar</a>
                        <a href="index.php?id=<?php echo $tercero['id'];?>" class="btn btn-danger" id="eliminar">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>



<!-- Include Footer  -->
<?php include("../../templates/footer.php");?>
<?php include("creartercero.php");?>