<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px 0;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"],
        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button {
            background-color: #ccc;
        }
    </style>
</head>
<body>

    <?php
    include_once '../Controller/ControllerJogador.php';

    if (isset($_GET['id_jogador'])) 
    {
        $id = $_GET['id_jogador'];

        $jogadorController = new ControllerJogador();
        $jogador = $jogadorController->getJogadorById($id);

        if (!$jogador) 
        {
            echo 'Jogador não encontrado';
            exit;
        }

        if (isset($_POST['Submit'])) 
        {
            $nome = $_POST['nome_jogador'];
            $idade = $_POST['idade_jogador'];
            $posicao = $_POST['posicao_jogador'];
            $classificacao = $_POST['class_jogador'];
            $id_time = $_POST['id_time'];

            $jogadorController->updateJogador($id, $nome, $idade, $posicao, $classificacao, $id_time);
        }
    } 
    else 
    {
        echo 'ID do jogador não fornecido';
        exit;
    }
    ?>

    <form name="form1" method="post" action="">
        <table border="0">
            <tr>
                <td>Nome do Jogador</td>
                <td><input type="text" name="nome_jogador" value="<?php echo $jogador['nome_jogador']; ?>"></td>
            </tr>
            <tr>
                <td>Idade do Jogador</td>
                <td><input type="date" name="idade_jogador" value="<?php echo $jogador['idade_jogador']; ?>"></td>
            </tr>
            <tr>
                <td>Posição do Jogador</td>
                <td><input type="text" name="posicao_jogador" value="<?php echo $jogador['posicao_jogador']; ?>"></td>
            </tr>
            <tr>
                <td>Classificação do Jogador</td>
                <td><input type="text" name="class_jogador" value="<?php echo $jogador['class_jogador']; ?>"></td>
            </tr>
            <td>Time</td>
                <td>
                    <select name="id_time" id="id_time" class="formbutton">
                        <?php
                       
                        $times = $jogadorController->getTimes();

                        if (!empty($times)) 
                        {
                            foreach ($times as $time) 
                            {
                                $selected = ($time['id_time'] == $jogador['id_time']) ? 'selected' : '';
                                echo '<option value="' . $time['id_time'] . '" ' . $selected . '>' . $time['nome_time'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="Submit" value="Atualizar"></td>
                <td><button type='submit' formaction='../View/view-jogadores.php'>Voltar</button></td>
            </tr>
        </table>
    </form>

</body>
</html>
