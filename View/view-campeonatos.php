<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar campeonatos</title>
</head>
<body>
    <?php
    include_once '../Controller/ControllerCampeonato.php';
    $userCampeonato = new ControllerCampeonato();
    $campeonatos = $userCampeonato->viewCampeonatos();
    ?>

    <h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;">Adicionar Novo Campeonato </h2>
    <button style="font-family: Verdana, Arial, Helvetica, sans-serif;" class="styled-button"
        onclick="window.location.href='add-campeonato.php'">Adicionar Novo campeonato</button>
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
                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>País</strong></font>
            </td>
            <td>
                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ações</strong></font>
            </td>
        </tr>
        <?php
        foreach ($campeonatos as $campeonato) {
            echo "<tr>";
            echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $campeonato['id_campeonato'] . "</td>";
            echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $campeonato['nome_campeonato'] . "</td>";
            echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $campeonato['pais_campeonato'] . "</td>";
            echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''><a href=\"edit-campeonato.php?id_campeonato={$campeonato['id_campeonato']}\">Editar</a> | <a href=\"delete-campeonato.php?id_campeonato={$campeonato['id_campeonato']}\" onClick=\"return confirm('Tem certeza que deseja excluir?')\">Excluir</a> | <a href=\"cadastro.html\">Voltar ao inicio</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
