<?php
//Include database configuration file
include('../../config.php');

if(isset($_POST["id_curso"]) && !empty($_POST["id_curso"])){
    //Get all Razón data
    $query = $link->query("SELECT * FROM cursos WHERE status = 1 ORDER BY nombre DESC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display reasson list
    if($rowCount > 0){
        echo '<option value="">Curso</option>';
        while($row = $query->fetch_assoc()){ 
            $print = '<option value="'.$row['id_curso'].'">'.$row['nombre'].'</option>';
            echo utf8_decode($print);
        }
    }else{
        echo '<option value="">Cursos no disponibles</option>';
    }
}

if(isset($_POST["metodo_pago"]) && !empty($_POST["metodo_pago"])){
    //Get all Razón data
    $query = $link->query("SELECT * FROM metodos_pago WHERE status = 1 ORDER BY nombre DESC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display reasson list
    if($rowCount > 0){
        echo '<option value="">Metodo de Pago:</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
        }
    }else{
        echo '<option value="">Metodos de pago no disponibles</option>';
    }
}

if(isset($_POST["canal"]) && !empty($_POST["canal"])){
    //Get all Razón data
    $query = $link->query("SELECT * FROM canales WHERE status = 1 ORDER BY nombre DESC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display reasson list
    if($rowCount > 0){
        echo '<option value="">Canales:</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
        }
    }else{
        echo '<option value="">Canales no disponibles</option>';
    }
}

?>