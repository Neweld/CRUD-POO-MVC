<?php
include_once '../Controller/ControllerTime.php';
if (isset($_GET['id_time'])) 
{
    $id = $_GET['id_time'];

    $userTime = new ControllerTime();
    $userTime->deleteTime($id);
}
?>