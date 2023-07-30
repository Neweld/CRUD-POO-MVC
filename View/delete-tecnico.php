<?php
include_once '../Controller/ControllerTecnico.php';
if (isset($_GET['id_tecnico'])) 
{
    $id = $_GET['id_tecnico'];

    $userTecnico = new ControllerTecnico();
    $userTecnico->deleteTecnico($id);
}
?>