<?php
//Include database configuration file
include('config.php');

if(isset($_POST["universidad_id"]) && !empty($_POST["universidad_id"])){
    //Get all Razón data
    $query = $link->query("SELECT * FROM universidades WHERE universidad_status = 1 ORDER BY universidad_nombre ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display reasson list
    if($rowCount > 0){
        echo '<option value="">Universidad</option>';
        while($row = $query->fetch_assoc()){ 
            $print = '<option value="'.$row['universidad_nombre'].'">'.$row['universidad_nombre'].'</option>';
            echo utf8_decode($print);
        }
    }else{
        echo '<option value="">Universidad no disponible</option>';
    }
}

if(isset($_POST["carrera_id"]) && !empty($_POST["carrera_id"])){
    //Get all Razón data
    $query = $link->query("SELECT * FROM carreras WHERE carrera_status = 1 ORDER BY carrera_nombre ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display reasson list
    if($rowCount > 0){
        echo '<option value="">Carrera:</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['carrera_nombre'].'">'.$row['carrera_nombre'].'</option>';
        }
    }else{
        echo '<option value="">Carrera no disponible</option>';
    }
}

if(isset($_POST["distrito_id"]) && !empty($_POST["distrito_id"])){
    //Get all Razón data
    $query = $link->query("SELECT * FROM distritos ORDER BY distrito_nombre ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display reasson list
    if($rowCount > 0){
        echo '<option value="">Distrito:</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['distrito_nombre'].'">'.$row['distrito_nombre'].'</option>';
        }
    }else{
        echo '<option value="">Distrito no disponible</option>';
    }
}
?>