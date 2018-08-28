<?php   
    session_start();
    include('../../config.php');
    $curso = $_POST['curso'];
    //$dni = 72186198;
    if(isset($_POST['curso']) && !empty($_POST['curso'])){
    //Get all Razón data
    $query = $link->query("SELECT costo FROM cursos WHERE id_curso LIKE '$curso'");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    //echo $rowCount;
    //echo $rowCount;
    if($rowCount > 0){
        $row = $query->fetch_assoc(); 
        //echo ("%s (%s)\n",$row["nombre"],$row["apellido"]);
        //echo "nombre: " . $row["nombre"]."";
        echo $row["costo"];
    }
}else{
        echo "LLenar DNI para buscar entre los prospectos";
    }
?>