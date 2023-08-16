<!-- Conexion a la base de datos -->
<?php
    include("../../conexion.php");
    $stm = $conexion ->prepare("SELECT * FROM terceros");
    $stm->execute();
    $terceros = $stm->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['id'])){

    }


?>
<!-- Include Header -->
<?php include("../../templates/header.php");?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#creartercero">
    Crear tercero
</button> 
<br>
<div class="table-responsive">
    <table class="table table-info">
        <thead>
            <tr>
                <th scope="col">Nombre completo</th>
                <th scope="col">Tipo de documento</th>
                <th scope="col">Número de documento</th>
                <th scope="col">¿Es paciente?</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($terceros as $tercero){ ?>
                <tr class="">
                    <td scope="row"> <?php echo $tercero['nombresTercero'];?> <?php echo $tercero['apellidosTercero'];?></td>
                    <td> <?php echo $tercero['tipoDocumento'];?> </td>
                    <td> <?php echo $tercero['numeroDocumento'];?> </td>
                    <td> <?php echo $tercero['esPaciente'];?> </td>
                    <td>  
                        <a href="" class="btn btn-primary">Editar</a>
                        <a href="index.php?id=<?php echo $tercero['id'];?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("creartercero.php");?>

<!-- Include Footer  -->
<?php include("../../templates/footer.php");?>