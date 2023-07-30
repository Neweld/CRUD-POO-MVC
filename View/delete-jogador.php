<?php
include_once '../Controller/ControllerJogador.php';
if (isset($_GET['id_jogador'])) 
{
    $id = $_GET['id_jogador'];

    $userJogador = new ControllerJogador();
    $userJogador->deleteJogador($id);
}
?>