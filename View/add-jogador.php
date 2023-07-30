<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Usuário</title>
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
</head>
<body>

<?php
include_once '../Controller/ControllerJogador.php';
$userJogador = new ControllerJogador();

if (isset($_POST['Submit'])) {
    $userJogador->addJogador();
}
?>

    <form method="post" name="form1" action="">
        <center>
            <h1>Incluir registros </h1>
</center> 
<table width="588" border="0" align="center">
<td>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome do Jogador:</font>
            </td>
            <td>
                <font size="2">
                    <input name="nome_jogador" type="text" id="nome_jogador" class="formbutton">
                </font>
            </td>
        </tr>
        <tr>
            <td>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Data de Nascimento:</font>
            </td>
            <td>
                <font size="2">
                    <input name="idade_jogador" type="date" id="idade_jogador" class="formbutton">
                </font>
            </td>
        </tr>
        <tr>
            <td>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Posição do Jogador:</font>
            </td>
            <td>
                <font size="2">
                    <input name="posicao_jogador" type="text" id="posicao_jogador" class="formbutton">
                </font>
            </td>
        </tr>
        <tr>
            <td>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Classificação do Jogador:</font>
            </td>
            <td>
                <font size="2">
                <input name="class_jogador" type="number" id="class_jogador" class="formbutton" min="1" max="99">
                </font>
            </td>
        </tr>
        <tr>
    <td>
        <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Time do Jogador:</font>
    </td>
    <td>
        <font size="2">
            <select name="id_time" id="id_time" class="formbutton">
                <?php
              
                $times = $userJogador->getTimes();

               
                if (!empty($times)) 
                {
                    foreach ($times as $time) 
                    {
                        echo '<option value="' . $time['id_time'] . '">' . $time['nome_time'] . '</option>';
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
<tr>
    <td></td>
    <td><input type="submit" name="Submit" value="Cadastrar">
    <button type='submit' formaction='../View/view-jogadores.php'> Consultar</button>
    <button type='' formaction='../View/cadastro.html'> Voltar</button>
</td>
</tr>
</table>
</form>

    
</body>
</html>