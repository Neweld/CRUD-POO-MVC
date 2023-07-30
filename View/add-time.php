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
    include_once '../Controller/ControllerTime.php';
    $userTime = new ControllerTime();

    if(isset($_POST['Submit'])) {
        $userTime->addTime();       
    }
    ?>
<form method="post" name="form1" action="">
    <center>
        <h1>Incluir registros</h1>
    </center>
    <table width="588" border="0" align="center">
    
        <tr>
            <td>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome do Time:</font>
            </td>
            <td>
                <font size="2">
                    <input name="nome_time" type="text" id="nome_time" class="formbutton" >
                </font>
            </td>
        </tr>
        <tr>
            <td>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Alcunha do Time:</font>
            </td>
            <td>
                <font size="2">
                    <input name="alcunha_time" type="text" id="alcunha_time" class="formbutton" >
                </font>
            </td>
        </tr>
        <tr>
            <td>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Estádio do Time:</font>
            </td>
            <td>
                <font size="2">
                    <input name="estadio_time" type="text" id="estadio_time" class="formbutton" >
                </font>
            </td>
        </tr>
        <tr>
            <td>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Mascote do Time:</font>
            </td>
            <td>
                <font size="2">
                    <input name="mascote_time" type="text" id="mascote_time" class="formbutton" >
                </font>
            </td>
        </tr>
        <td>
        <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Campeonato do Time:</font>
    </td>
    <td>
        <font size="2">
            <select name="id_campeonato" id="id_campeonato" class="formbutton">
                <?php
                $campeonatos = $userTime->getCampeonatos();

                if (!empty($campeonatos)) 
                {
                    foreach ($campeonatos as $campeonato) 
                    {
                        echo '<option value="' . $campeonato['id_campeonato'] . '">' . $campeonato['nome_campeonato'] . '</option>';
                    }
                }
                ?>
            </select>
        </font>
    </td>
</tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="Submit" value="Cadastrar">
                <button type='submit' formaction='../View/view-times.php'>Consultar</button>
                <button type='' formaction='../View/cadastro.html'> Voltar</button>
            </td>
        </tr>
    </table>
</form>

</body>
</html>