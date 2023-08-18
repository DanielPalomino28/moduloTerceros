<?php
// Obtener datos del formualrio de filtro
$fechaInicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '';
$fechaFin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';
$filtroColumna = isset($_GET['filtro_columna']) ? $_GET['filtro_columna'] : 'todos';

// Construir la consulta básica para luego aplicar los filtros
$sql = "SELECT * FROM terceros "; 

//Primer condicional valida que filtro de tipo de tercero se seleccionó
if($filtroColumna == "todos"){
    // Si se filtro por fecha se agrega a la consulta, sino no se hace nada
    if($fechaInicio !== "" && $fechaFin !== "")
        $sql .= "WHERE fechaNacimiento BETWEEN '$fechaInicio' AND '$fechaFin'";
// Se filtró por solo pacientes
}else if($filtroColumna == "on"){
    // Si se filtro por fecha se agrega a la consulta, sino solo se aplica el primer filtro
    if($fechaInicio !== "" && $fechaFin !== "")
        $sql .= "WHERE fechaNacimiento BETWEEN '$fechaInicio' AND '$fechaFin' AND esPaciente = '$filtroColumna'";
    else
        $sql .= "WHERE esPaciente = '$filtroColumna'";
// Se filtro por solo terceros
}else{
    // Si se filtro por fecha se agrega a la consulta, sino solo se aplica el primer filtro
    if($fechaInicio !== "" && $fechaFin !== "")
        $sql .= "WHERE fechaNacimiento BETWEEN '$fechaInicio' AND '$fechaFin' AND esPaciente = '$filtroColumna'";
    else
        $sql .= "WHERE esPaciente = '$filtroColumna'";
}
//Se ve la posibilidad de quitar el último else, ya que hace exactamente los mismo que el
// anterior condicional, con la diferencia de validar que tipo de tercero selecciono



$stm = $conexion ->prepare($sql);
$stm->execute();
$terceros = $stm->fetchAll(PDO::FETCH_ASSOC);

?>