<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Usuários</title>
</head>
<body>
    <?php
    include_once '../Controller/ControllerTecnico.php';
    $userTecnico = new ControllerTecnico();
    $tecnicos = $userTecnico->viewTecnicos();
    ?>

    <h2 size="1" style="font-family: Verdana, Arial, Helvetica, sans-serif;">Adicionar Novo Técnico </h2>
    <button size="1" style="font-family: Verdana, Arial, Helvetica, sans-serif;" class="styled-button"
        onclick="window.location.href='add-tecnico.php'">Adicionar Novo Técnico</button>
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
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Idade</strong></font>
                        </td>
                        <td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Time</strong></font>
                        </td>
                        <td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ações</strong></font>
                        </td>
                </tr>
                <?php
                foreach ($tecnicos as $tecnico)
                {
                    echo "<tr>";
                    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $tecnico['id_tecnico'] . "</td>";
                    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $tecnico['nome_tecnico'] . "</td>";
                    $dataNascimento = $tecnico['idade_tecnico'];
                    $dataAtual = new DateTime();
                    $dataNasc = new DateTime($dataNascimento);
                    $idade = $dataAtual->diff($dataNasc)->y;
                    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $idade . "</td>";
                    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $tecnico['nome_time'] . "</td>";
                    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''><a href=\"edit-tecnico.php?id_tecnico={$tecnico['id_tecnico']}\">Editar</a> | <a href=\"delete-tecnico.php?id_tecnico={$tecnico['id_tecnico']}\" onClick=\"return confirm('Tem certeza que deseja excluir?')\">Excluir</a> | <a href=\"cadastro.html\">Voltar ao inicio </a></td>";
                    echo "</tr>";
                }
                ?>
        </table>
</body>
</html>
