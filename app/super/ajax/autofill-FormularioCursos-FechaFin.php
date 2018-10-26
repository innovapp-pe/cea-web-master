<?php   
    session_start();
    include('../../config.php');
    $id_curso = $_POST['id_curso'];
    //$dni = 72186198;
    if(isset($_POST['id_curso']) && !empty($_POST['id_curso'])){
    //Get all Razón data
    $query = $link->query("SELECT fecha_fin FROM cursos WHERE id_curso='$id_curso'");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    if($rowCount > 0){
        $row = $query->fetch_assoc(); 
        echo $row["fecha_fin"];
    }
}else{
        echo "Error";
    }
?>