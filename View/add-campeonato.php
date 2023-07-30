<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        background-color: #f2f2f2;
    }

    table {
        width: 588px;
        margin: 0 auto;
        background-color: #fff;
        border-collapse: collapse;
        border: 1px solid #ccc;
    }

    th,
    td {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    th {
        background-color: #f2f2f2;
        text-align: left;
    }

    input[type="text"],
    input[type="submit"],
    button {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[type="submit"],
    button {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover,
    button:hover {
        background-color: #0056b3;
    }
</style>
<body>
    
<?php
    include_once '../Controller/ControllerCampeonato.php';
    $userCampeonato = new ControllerCampeonato();

    if(isset($_POST['Submit'])) {
        $userCampeonato->addCampeonato();       
    }
    ?>

<form method="post" name="form1" action="">
    <center>
        <h1>Incluir registros</h1>
    </center>
    <table width="588" border="0" align="center">
        <tr>
            <td>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome do Campeonato:</font>
            </td>
            <td>
                <font size="2">
                    <input name="nome_campeonato" type="text" id="nome_campeonato" class="formbutton">
                </font>
            </td>
        </tr>
        <tr>
            <td>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">País de origem do Campeonato:</font>
            </td>
            <td>
                <font size="2">
                    <input name="pais_campeonato" type="text" id="pais_campeonato" class="formbutton">
                </font>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="submit" name="Submit" value="Cadastrar">
                <button type='submit' formaction='../View/view-campeonatos.php'>Consultar</button>
                <button type='' formaction='../View/cadastro.html'> Voltar</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>