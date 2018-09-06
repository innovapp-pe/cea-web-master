<?php
session_start();
include('../../config.php');

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
$id = $_SESSION['id'];
$dni = $_POST['dni_table'];

$columns = array( 
// datatable column index  => database column name
    0 => 'id_curso',
    1=> 'nombre',
    2 => 'apellido',
    3 => 'telefono',
    4 => 'correo',
    5 => 'universidad',
    6 => 'carrera',
    7 => 'ciclo',
    8 => 'distrito',
    9 => 'metodo_pago',
    10 => 'descuento',
    11 => 'monto_pagado',
    12 => 'monto_restante',
    13 => 'devolucion_pagada',
    14 => 'certificado',
    15 => 'certificado_recogido',
    16 => 'canal',
    17 => 'matriculado_por',
    18 => 'fecha_matricula',
    19 => 'fecha_actualizacion',
    20 => 'comentario',
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM matriculados";
$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get ventas");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT *";
$sql.=" FROM matriculados WHERE dni_alumno='$dni'";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
    $sql.=" AND ( dni_alumno LIKE '".$requestData['search']['value']."%' ";    
    $sql.=" OR nombre LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR apellido LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR telefono LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR correo LIKE '".$requestData['search']['value']."%' ";
}
$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get ventas");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY fecha_matricula";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */    
$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get ventas");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 

    $nestedData[] = $row["id_curso"];
    $nestedData[] = $row["nombre"];
    $nestedData[] = $row["apellido"];
    $nestedData[] = $row["telefono"];
    $nestedData[] = $row["correo"];
    $nestedData[] = $row["universidad"];
    $nestedData[] = $row["carrera"];
    $nestedData[] = $row["ciclo"];
    $nestedData[] = $row["distrito"];
    $nestedData[] = $row["metodo_pago"];
    $nestedData[] = $row["descuento"];
    $nestedData[] = $row["monto_pagado"];
    $nestedData[] = $row["monto_restante"];
    $nestedData[] = $row["devolucion_pagada"];
    $nestedData[] = $row["certificado"];
    $nestedData[] = $row["certificado_recogido"];
    $nestedData[] = $row["canal"];
    $nestedData[] = $row["matriculado_por"];
    $nestedData[] = $row["fecha_matricula"];
    $nestedData[] = $row["fecha_actualizacion"];
    $nestedData[] = $row["comentario"];
    
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
