<?php
session_start();
include('../../config.php');

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
$id = $_SESSION['id'];


$columns = array( 
// datatable column index  => database column name
    0 => 'nombre', 
    1 => 'dni',
    2 => 'correo',
    3 => 'telefono',
    4 => 'creado_por',
    5 => 'status',
);

// getting total number records without any search
$sql = "SELECT nombre, dni, correo, telefono, creado_por, status";
$sql.=" FROM profesores";
$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get ventas");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT nombre, dni, correo, telefono, creado_por, status";
$sql.=" FROM profesores WHERE status=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
    $sql.=" AND ( nombre LIKE '".$requestData['search']['value']."%' ";
    $sql.=" AND ( telefono LIKE '".$requestData['search']['value']."%' ";
    $sql.=" AND ( correo LIKE '".$requestData['search']['value']."%' ";    
    $sql.=" OR dni LIKE '".$requestData['search']['value']."%' ";
}
$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get ventas");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY nombre";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */    
$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get ventas");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 

    /*$nestedData[] = '<a href="change_status.php?dni='.$row["dni"].'&nombre='.$row["nombre"].'&apellido='.$row["apellido"].'&telefono='.$row["telefono"].'&correo='.$row["correo"].'&universidad='.$row["universidad"].'&carrera='.$row["carrera"].'&ciclo='.$row["ciclo"].'&distrito='.$row["distrito"].'&premio='.$row["premio"].'&manager_id='.$row["manager_id"].'&fecha_gestionado='.$row["fecha_gestionado"].'">'.$row["id_curso"].'</a>';*/
    $nestedData[] = $row["nombre"];
    $nestedData[] = $row["dni"];
    $nestedData[] = $row["correo"];
    $nestedData[] = $row["telefono"];
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
