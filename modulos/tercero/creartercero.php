<?php
  if($_POST){
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:""); 
    $apellido=(isset($_POST['apellido'])?$_POST['apellido']:""); 
    $tipoD=(isset($_POST['tipoD'])?$_POST['tipoD']:""); 
    $numeroDocumento=(isset($_POST['numeroDocumento'])?$_POST['numeroDocumento']:""); 
    $fechaNacimiento=(isset($_POST['fechaNacimiento'])?$_POST['fechaNacimiento']:""); 
    $gen=(isset($_POST['gen'])?$_POST['gen']:"");  
    $est=(isset($_POST['est'])?$_POST['est']:"");  
    $switch_button=(isset($_POST['switch_button'])?$_POST['switch_button']:""); 
    $aux=1;
    $stm=$conexion -> 
      prepare("INSERT INTO terceros(nombresTercero,apellidosTercero,tipoDocumento,numeroDocumento,fechaNacimiento,genero,estadoCivil,esPaciente)
      VALUES (:nombre,:apellido,:tipoD,:numeroDocumento,:fechaNacimiento,:gen,:est,:switch_button)");
    $stm -> bindParam(":nombre",$nombre);
    $stm -> bindParam(":apellido",$apellido);
    $stm -> bindParam(":tipoD",$tipoD);
    $stm -> bindParam(":numeroDocumento",$numeroDocumento);
    $stm -> bindParam(":fechaNacimiento",$fechaNacimiento);
    $stm -> bindParam(":gen",$gen);
    $stm -> bindParam(":est",$est);
    $stm -> bindParam(":switch_button",$switch_button);
    $stm->execute();
    // header("location: index.php");
  }
?>

<!-- Modal create-->
<div class="modal fade" id="creartercero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear nuevo tercero</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="post">

        <div class="modal-body">
          <label for="" require>Nombres</label>
            <input type="text" class="form-control" name="nombre" id="" placeholder="Ingrese nombres" require>
          
          <label for="" require>Apellidos</label>
            <input type="text" class="form-control" name="apellido" id="apellidos" placeholder="Ingrese apellidos" require>
          
          <label for="tipoDocumento">Tipo de documento</label><br>
            <select name="tipoD" id="tipoDocumento" class="form-select">
              <option value="">Seleccione</option>
              <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
              <option value="Cédula de Extranjería">Cédula de Extranjería</option>
              <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
              <option value="Pasaporte">Pasaporte</option>
              <option value="Registro Civil de Nacimiento">Registro Civil de Nacimiento</option>
              <option value="Permiso Especial de Permanencia">Permiso Especial de Permanencia</option>
              <option value="Documento Nacional de Identidad">Documento Nacional de Identidad</option>
            </select>
          
          <label for="">Numero de documento</label>
            <input type="tex" class="form-control" name="numeroDocumento" id="" placeholder="Ingrese número de documento">
          
          <label for=""require>Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fechaNacimiento" id="" placeholder="Ingrese fecha de nacimiento" max="2024-01-01" min="1900-01-01" require>
          
          <label for="genero">Género</label><br>
            <select name="gen" id="genero" class="form-select">
              <option value="">Seleccione</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="No binario">No binario</option>
            </select>
            
          <label for="estadoCivil">Estado civil</label><br>
            <select name="est" id="estadoCivil" class="form-select">
              <option value="">Seleccione</option>
              <option value="Soltero/a">Soltero/a</option>
              <option value="Unión libre">Unión libre</option>
              <option value="Casado/a">Casado/a</option>
              <option value="Divorciado/a">Divorciado/a</option>
              <option value="Viudo/a">Viudo/a</option>
            </select>

            
            <div class="form-check form-switch">
              <input name="switch_button" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
              <label class="form-check-label" for="flexSwitchCheckDefault">¿Es paciente?</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>