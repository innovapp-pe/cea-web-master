<?php
session_start();
include('../../config.php');

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
$id = $_SESSION['id'];
$id_curso = $_POST['id_curso'];

$columns = array( 
// datatable column index  => database column name
    0 => 'id_curso',
    1 => 'dni', 
    2=> 'nombre',
    3 => 'apellido',
    4 => 'telefono',
    5 => 'correo',
    6 => 'universidad',
    7 => 'carrera',
    8 => 'ciclo',
    9 => 'distrito',
    10 => 'mensaje',
    11 => 'gestionado',
    12 => 'tipo_contacto',
    13 => 'resultado',
    14 => 'manager_id',
    15 => 'fecha_registro',
    16 => 'fecha_actualizacion',
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM interesados_formulario";
$query=mysqli_query($link, $sql) or die(mysqli_error($link));
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT *";
$sql.=" FROM interesados_formulario WHERE id_curso='$id_curso'";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
    $sql.=" AND ( dni LIKE '".$requestData['search']['value']."%' ";    
    $sql.=" OR nombre LIKE '".$requestData['search']['value']."%' ";

    $sql.=" OR telefono LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get ventas");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
/*$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";*/
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */    
$query=mysqli_query($link, $sql) or die(mysqli_error($link));

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 
    $nestedData[] = $row["id_curso"];
    $nestedData[] = '<a href="change_status.php?dni='.$row["dni"].'&nombre='.$row["nombre"].'&apellido='.$row["apellido"].'&telefono='.$row["telefono"].'&correo='.$row["correo"].'&universidad='.$row["universidad"].'&carrera='.$row["carrera"].'&ciclo='.$row["ciclo"].'&distrito='.$row["distrito"].'&manager_id='.$row["manager_id"].'">'.$row["dni"].'</a>';
    $nestedData[] = $row["nombre"];
    $nestedData[] = $row["apellido"];
    $nestedData[] = $row["telefono"];
    $nestedData[] = $row["correo"];
    $nestedData[] = $row["universidad"];
    $nestedData[] = $row["carrera"];
    $nestedData[] = $row["ciclo"];
    $nestedData[] = $row["distrito"];
    $nestedData[] = $row["mensaje"];
    $nestedData[] = $row["gestionado"];
    $nestedData[] = $row["tipo_contacto"];
    $nestedData[] = $row["resultado"];
    $nestedData[] = $row["manager_id"];
    $nestedData[] = $row["fecha_registro"];
    $nestedData[] = $row["fecha_actualizacion"];
    
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
