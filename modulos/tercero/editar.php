<!--Conexión a la base de datos y consulta sql para editar información del tercero por su id -->
<?php
    include("../../conexion.php");
    if(isset($_GET['id'])){
        $txtid=(isset($_GET['id'])?$_GET['id']:"");
        // Se seleccionan todos los datos del tercero a editar para mostrarlos en el formulario 
        $stm=$conexion->prepare("SELECT * FROM terceros WHERE id=:txtid");
        $stm->bindParam(":txtid",$txtid);
        $stm->execute();
        //Se obtienen de datos y se separan 
        $datos=$stm->fetch(PDO::FETCH_LAZY);
        
        $nombre=$datos['nombresTercero'];
        $apellido=$datos['apellidosTercero'];
        $tipoDoc=$datos['tipoDocumento'];
        $numDoc=$datos['numeroDocumento'];
        $fechaNac=$datos['fechaNacimiento'];
        $genero=$datos['genero'];
        $estCivil=$datos['estadoCivil'];
        $esPaciente=$datos['esPaciente'];  
        
        
        // Se toman los nuevos datos enviados desde el formulario
        
        if($_POST){
            $txtid=(isset($_POST['txtid'])?$_POST['txtid']:""); 
            $nombre=(isset($_POST['nombre'])?$_POST['nombre']:""); 
            $apellido=(isset($_POST['apellido'])?$_POST['apellido']:""); 
            $tipoD=(isset($_POST['tipoD'])?$_POST['tipoD']:""); 
            $numeroDocumento=(isset($_POST['numeroDocumento'])?$_POST['numeroDocumento']:""); 
            $fechaNacimiento=(isset($_POST['fechaNacimiento'])?$_POST['fechaNacimiento']:""); 
            $gen=(isset($_POST['gen'])?$_POST['gen']:"");  
            $est=(isset($_POST['est'])?$_POST['est']:"");  
            $switch_button=(isset($_POST['switch_button'])?$_POST['switch_button']:""); 
            // Se actualizan los datos por medio de la consulta SQL
            $stm=$conexion -> 
                prepare("UPDATE terceros 
                SET nombresTercero=:nombre,apellidosTercero=:apellido,tipoDocumento=:tipoD,
                numeroDocumento=:numeroDocumento,fechaNacimiento=:fechaNacimiento,genero=:gen,
                estadoCivil=:est,esPaciente=:switch_button
                WHERE id=:txtid");
            
            $stm -> bindParam(":txtid",$txtid);
            $stm -> bindParam(":nombre",$nombre);
            $stm -> bindParam(":apellido",$apellido);
            $stm -> bindParam(":tipoD",$tipoD);
            $stm -> bindParam(":numeroDocumento",$numeroDocumento);
            $stm -> bindParam(":fechaNacimiento",$fechaNacimiento);
            $stm -> bindParam(":gen",$gen);
            $stm -> bindParam(":est",$est);
            $stm -> bindParam(":switch_button",$switch_button);

            $stm->execute();
            header("location:index.php");

        }
    }
?>

<!-- Include Header -->
<?php include("../../templates/header.php");?>

<form action="" method="post">
    <!-- Se cargan los datos obtenidos del a cada input por medio del parámetro value -->
    <input type="hidden" class="form-control" name="txtid" value="<?php echo $txtid; ?>">

    <label for="" require>Nombres</label>
    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" placeholder="Ingrese el nombre del tercero" required>
    
    <label for="" require>Apellidos</label>
    <input type="text" class="form-control" name="apellido" id="apellidos" value="<?php echo $apellido; ?>" placeholder="Ingrese el apellido del tercero">
    
    <label for="tipoDocumento">Tipo de documento</label><br>
    <select name="tipoD" id="tipoDocumento" class="form-select">
        <option value="<?php echo $tipoDoc; ?>"><?php echo $tipoDoc; ?></option>
        <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
        <option value="Cédula de Extranjería">Cédula de Extranjería</option>
        <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
        <option value="Pasaporte">Pasaporte</option>
        <option value="Registro Civil de Nacimiento">Registro Civil de Nacimiento</option>
        <option value="Permiso Especial de Permanencia">Permiso Especial de Permanencia</option>
        <option value="Documento Nacional de Identidad">Documento Nacional de Identidad</option>
        <option value=""></option>
    </select>
    
    <label for="">Numero de documento</label>
    <input type="text" class="form-control" name="numeroDocumento" value="<?php echo $numDoc; ?>" placeholder="Ingrese número de documento">
    
    <label for=""require>Fecha de nacimiento</label>
    <input type="date" class="form-control" name="fechaNacimiento" value="<?php echo $fechaNac; ?>" placeholder="Ingrese fecha de nacimiento" max="2024-01-01" min="1900-01-01" required>
    
    <label for="genero">Género</label><br>
    <select name="gen" id="genero" class="form-select">
        <option value="<?php echo $genero; ?>"><?php echo $genero; ?></option>
        <option value=""></option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
        <option value="No binario">No binario</option>
    </select>    
    <label for="estadoCivil">Estado civil</label><br>
    <select name="est" id="estadoCivil" class="form-select">
        <option value="<?php echo $estCivil; ?>"><?php echo $estCivil; ?></option>
        <option value="Soltero/a">Soltero/a</option>
        <option value="Unión libre">Unión libre</option>
        <option value="Casado/a">Casado/a</option>
        <option value="Divorciado/a">Divorciado/a</option>
        <option value="Viudo/a">Viudo/a</option>
        <option value=""></option>
    </select>

    <div class="form-check form-switch">
        <input name="switch_button" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if($esPaciente==="on") echo "checked" ?>>
        <label class="form-check-label" for="flexSwitchCheckDefault">¿Es paciente?</label>
    </div>

    <div class="modal-footer">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>

<!-- Include Footer  -->
<?php include("../../templates/footer.php");?>