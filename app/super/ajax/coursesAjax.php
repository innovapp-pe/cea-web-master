<?php
session_start();
include('../../config.php');

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
$id = $_SESSION['id'];


$columns = array( 
// datatable column index  => database column name
    0 => 'id_curso', 
    1 => 'nombre',
    2 => 'capacidad',
    3 => 'profesor',
    4 => 'sede',
    5 => 'fecha_inicio',
    6 => 'fecha_fin',
    7 => 'horario',
    8 => 'costo',
    9 => 'matriculados_actuales',
    10 => 'creado_por',
    11 => 'status',
);

// getting total number records without any search
$sql = "SELECT id_curso, nombre, capacidad, profesor, sede, fecha_inicio, fecha_fin, horario, costo, matriculados_actuales, creado_por, status";
$sql.=" FROM cursos";
$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get ventas");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT id_curso, nombre, capacidad, profesor, sede, fecha_inicio, fecha_fin, horario, costo, matriculados_actuales, creado_por, status";
$sql.=" FROM cursos";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
    $sql.=" AND ( id_curso LIKE '".$requestData['search']['value']."%' ";    
    $sql.=" OR nombre LIKE '".$requestData['search']['value']."%' ";

    $sql.=" OR sede LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get ventas");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY fecha_inicio";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */    
$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get ventas");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 

    $nestedData[] = '<a href="course_detail.php?id_curso='.$row["id_curso"].'&nombre='.$row["nombre"].'&capacidad='.$row["capacidad"].'&profesor='.$row["profesor"].'&sede='.$row["sede"].'&fecha_inicio='.$row["fecha_inicio"].'&fecha_fin='.$row["fecha_fin"].'&horario='.$row["horario"].'&costo='.$row["costo"].'&matriculados_actuales='.$row["matriculados_actuales"].'&creado_por='.$row["creado_por"].'&status='.$row["status"].'">'.$row["id_curso"].'</a>';
    //$nestedData[] = $row["id_curso"];
    $nestedData[] = $row["nombre"];
    $nestedData[] = $row["capacidad"];
    $nestedData[] = $row["profesor"];
    $nestedData[] = $row["sede"];
    $nestedData[] = $row["fecha_inicio"];
    $nestedData[] = $row["fecha_fin"];
    $nestedData[] = $row["horario"];
    $nestedData[] = $row["costo"];
    $nestedData[] = ''.$row["matriculados_actuales"].'/'.$row["capacidad"].'';
    $nestedData[] = $row["creado_por"];
    $nestedData[] = $row["status"];
    
    $data[] = $nestedData;
}



$json_data = array(
            "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal"    => intval( $totalData ),  // total number of records
            "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   // total data array
            );

echo json_encode($json_data);  // send data as json format

?>
