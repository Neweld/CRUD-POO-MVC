<?php
include_once '../Controller/ControllerCampeonato.php';
if (isset($_GET['id_campeonato'])) 
{
    $id = $_GET['id_campeonato'];

    $userCampeonato = new ControllerCampeonato();
    $userCampeonato->deleteCampeonato($id);
}
?>