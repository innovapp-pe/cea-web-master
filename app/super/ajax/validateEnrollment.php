<?php   
    session_start();
    include('../../config.php');
    $dni = $_POST['dni'];
    $id_curso = $_POST['curso'];
    //$dni = 72186198;
    if(isset($_POST['dni']) && !empty($_POST['dni'])){
    //Get all Razón data
    $query = $link->query("SELECT id_curso, dni_alumno FROM matriculados WHERE dni_alumno='$dni' AND id_curso LIKE '$id_curso'");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    echo $rowCount;
}
?>