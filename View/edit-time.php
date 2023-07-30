<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Time</title>
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
    include_once '../Controller/ControllerTime.php';

    if (isset($_GET['id_time'])) {
        $id = $_GET['id_time'];

        $timeController = new ControllerTime();
        $time = $timeController->getTimeById($id);

        if (!$time) {
            echo 'Time não encontrado';
            exit;
        }

        if (isset($_POST['Submit'])) {
            $nome_time = $_POST['nome_time'];
            $alcunha_time = $_POST['alcunha_time'];
            $estadio_time = $_POST['estadio_time'];
            $mascote_time = $_POST['mascote_time'];
            $id_campeonato = $_POST['id_campeonato'];

            $timeController->updateTime($id, $nome_time, $alcunha_time, $estadio_time, $mascote_time, $id_campeonato);
        }
    } else {
        echo 'ID do time não fornecido';
        exit;
    }
    ?>

    <form name="form1" method="post" action="">
        <table border="0">
            <tr>
                <td>Nome do Time</td>
                <td><input type="text" name="nome_time" value="<?php echo $time['nome_time']; ?>"></td>
            </tr>
            <tr>
                <td>Alcunha do Time</td>
                <td><input type="text" name="alcunha_time" value="<?php echo $time['alcunha_time']; ?>"></td>
            </tr>
            <tr>
                <td>Estádio do Time</td>
                <td><input type="text" name="estadio_time" value="<?php echo $time['estadio_time']; ?>"></td>
            </tr>
            <tr>
                <td>Mascote do Time</td>
                <td><input type="text" name="mascote_time" value="<?php echo $time['mascote_time']; ?>"></td>
            </tr>
            <tr>
                <td>Campeonato do Time</td>
                <td>
                    <select name="id_campeonato" id="id_campeonato" class="formbutton">
                        <?php
                        $campeonatos = $timeController->getCampeonatos();

                        if (!empty($campeonatos)) 
                        {
                            foreach ($campeonatos as $campeonato) 
                            {
                                $selected = ($time['id_campeonato'] == $campeonato['id_campeonato']) ? 'selected' : '';
                                echo '<option value="' . $campeonato['id_campeonato'] . '" ' . $selected . '>' . $campeonato['nome_campeonato'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="Submit" value="Atualizar"></td>
                <td><button type="submit" formaction="../View/view-times.php">Voltar</button></td>
            </tr>
        </table>
    </form>

</body>
</html>
