<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Jogadores</title>
</head>
<body>
    <?php
    include_once '../Controller/ControllerJogador.php';
    $userJogador = new ControllerJogador();
    $jogadores = $userJogador->viewJogadores();
    ?>

    <h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;">Adicionar Novo Jogador </h2>
    <button style="font-family: Verdana, Arial, Helvetica, sans-serif;" class="styled-button"
        onclick="window.location.href='add-jogador.php'">Adicionar Novo Jogador</button>
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
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Posição</strong></font>
</td>
<td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Classificação</strong></font>
</td>
<td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Time</strong></font>
</td>
<td>
                                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ações</strong></font>
</td>
</tr>
<?php
foreach ($jogadores as $jogador)
{
    echo "<tr>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $jogador['id_jogador'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $jogador['nome_jogador'] . "</td>";
    $dataNascimento = $jogador['idade_jogador'];
    $dataAtual = new DateTime();
    $dataNasc = new DateTime($dataNascimento);
    $idade = $dataAtual->diff($dataNasc)->y;
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $idade . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $jogador['posicao_jogador'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $jogador['class_jogador'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $jogador['nome_time'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''><a href=\"edit-jogador.php?id_jogador={$jogador['id_jogador']}\">Editar</a> | <a href=\"delete-jogador.php?id_jogador={$jogador['id_jogador']}\" onClick=\"return confirm('Tem certeza que deseja excluir?')\">Excluir</a> | <a href=\"cadastro.html\">Voltar ao inicio</a></td>";
    echo "</tr>";
}
?>
</table>
    
</body>
</html>