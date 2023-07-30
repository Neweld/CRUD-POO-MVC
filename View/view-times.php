<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar times</title>
</head>
<body>
    <?php
    include_once '../Controller/ControllerTime.php';
    $userTime = new ControllerTime();
    $times = $userTime->viewTimes();
    ?>

    <h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;">Adicionar Novo time </h2>
    <button style="font-family: Verdana, Arial, Helvetica, sans-serif;" class="styled-button"
        onclick="window.location.href='add-time.php'">Adicionar Novo time</button>
        <br />
        <br />
        <table width='80%' border=0 align='center'>
                <tr bgcolor='#CCCCCC'>
                        <td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>ID</strong></font>
</td>
                            <td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nome</strong></font>
</td>
<td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Alcunha</strong></font>
</td>
<td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Estadio</strong></font>
</td>
<td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Mascote</strong></font>
</td>
<td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Campeonato</strong></font>
</td>
<td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ações</strong></font>
</td>
</tr>
<?php
foreach ($times as $time)
{
    echo "<tr>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $time['id_time'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $time['nome_time'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $time['alcunha_time'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $time['estadio_time'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $time['mascote_time'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $time['nome_campeonato'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''><a href=\"edit-time.php?id_time={$time['id_time']}\">Editar</a> | <a href=\"delete-time.php?id_time={$time['id_time']}\" onClick=\"return confirm('Tem certeza que deseja excluir?')\">Excluir</a> | <a href=\"cadastro.html\">Voltar ao inicio
    </a></a></td>";
    echo "</tr>";
}
?>
</table>
    
</body>
</html>