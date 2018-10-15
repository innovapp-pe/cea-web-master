<?php
//Include database configuration file
include('../config.php');

if(isset($_POST["tipo_contacto_id"]) && !empty($_POST["tipo_contacto_id"])){
    //Get all Resultado data
    $query = $link->query("SELECT * FROM resultado WHERE tipo_contacto_id = '".$_POST['tipo_contacto_id']."' AND status = 1 ORDER BY nombre ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display result list
    if($rowCount > 0){
        echo '<option value="">Resultado</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
        }
    }else{
        echo '<option value="">Resultado no disponible</option>';
    }
}

if(isset($_POST["resultado_id"]) && !empty($_POST["resultado_id"])){
    //Get all Razón data
    $query = $link->query("SELECT * FROM observacion WHERE resultado_id = '".$_POST['resultado_id']."' AND status = 1 ORDER BY nombre ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display reasson list
    if($rowCount > 0){
        echo '<option value="">Observacion</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
        }
    }else{
        echo '<option value="">Observacion no disponible</option>';
    }
}

if(isset($_POST["reasson_id"]) && !empty($_POST["reasson_id"])){
    //Get all Razón data
    $query = $link->query("SELECT * FROM plan WHERE status = 1 ORDER BY plan_id ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display reasson list
    if($rowCount > 0){
        echo '<option value="">Plan</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['precio'].'">'.$row['plan_nombre'].'</option>';
        }
    }else{
        echo '<option value="">Plan no disponible</option>';
    }
}

if(isset($_POST["plan_id"]) && !empty($_POST["plan_id"])){
    //Get all Razón data
    $query = $link->query("SELECT * FROM phone_model WHERE status = 1 ORDER BY phone_model_id ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display reasson list
    if($rowCount > 0){
        echo '<option value="">Modelo</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['phone_model_nombre'].'">'.$row['phone_model_nombre'].'</option>';
        }
    }else{
        echo '<option value="">Modelo no disponible</option>';
    }
}
?>