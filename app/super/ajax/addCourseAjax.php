<?php
//Include database configuration file
include('../../config.php');

if(isset($_POST["profesor_id"]) && !empty($_POST["profesor_id"])){
    //Get all Razón data
    $query = $link->query("SELECT * FROM profesores WHERE status = 1 ORDER BY nombre DESC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display reasson list
    if($rowCount > 0){
        echo '<option value="">Profesor</option>';
        while($row = $query->fetch_assoc()){ 
            $print = '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
            echo utf8_decode($print);
        }
    }else{
        echo '<option value="">Profesores no disponible</option>';
    }
}

if(isset($_POST["sede_id"]) && !empty($_POST["sede_id"])){
    //Get all Razón data
    $query = $link->query("SELECT * FROM sedes WHERE status = 1 ORDER BY nombre DESC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display reasson list
    if($rowCount > 0){
        echo '<option value="">Sede:</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
        }
    }else{
        echo '<option value="">Sedes no disponible</option>';
    }
}

?>