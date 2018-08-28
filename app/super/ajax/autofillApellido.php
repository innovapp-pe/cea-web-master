<?php   
    session_start();
    include('../../config.php');
    $dni = $_POST['dni'];
    //$dni = 72186198;
    if(isset($_POST['dni']) && !empty($_POST['dni'])){
    //Get all Razón data
    $query = $link->query("SELECT nombre, apellido FROM prospectos WHERE dni=$dni");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    //echo $rowCount;
    //echo $rowCount;
    if($rowCount > 0){
        $row = $query->fetch_assoc(); 
        //echo ("%s (%s)\n",$row["nombre"],$row["apellido"]);
        //echo "nombre: " . $row["nombre"]."";
        echo $row["apellido"];
    }
}else{
        echo "LLenar DNI para buscar entre los prospectos";
    }
?>