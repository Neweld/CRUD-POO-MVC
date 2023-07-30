<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    // incluir jogadores
    include_once '../Controller/ControllerJogador.php';
    $userJogador = new ControllerJogador();
    $jogadores = $userJogador->viewJogadores();

    // incluir times
    include_once '../Controller/ControllerTime.php';
    $userTime = new ControllerTime();

    // incluir campeonatos
    include_once '../Controller/ControllerCampeonato.php';
    $userCampeonato = new ControllerCampeonato();
    $campeonatos = $userCampeonato->viewCampeonatos();

    // incluir técnicos
    include_once '../Controller/ControllerTecnico.php';
    $userTecnico = new ControllerTecnico();
    $tecnicos = $userTecnico->viewTecnicos();
    ?>

    <h2>Jogadores</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Time</th>
            <th>Campeonato</th>
        </tr>
        <?php foreach ($jogadores as $jogador): ?>
            <tr>
                <td><?php echo $jogador['id_jogador']; ?></td>
                <td><?php echo $jogador['nome_jogador']; ?></td>
                <td><?php echo $jogador['nome_time']; ?></td>
                <td>
                    <?php
                   
                    $time = $userTime->getTimeById($jogador['id_time']);
                    if ($time) {
                        
                        $campeonato = $userCampeonato->getCampeonatoById($time['id_campeonato']);
                        if ($campeonato) {
                            echo $campeonato['nome_campeonato'];
                        } else {
                            echo "Campeonato não encontrado";
                        }
                    } else {
                        echo "Time não encontrado";
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Técnicos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Time</th>
        </tr>
        <?php foreach ($tecnicos as $tecnico): ?>
            <tr>
                <td><?php echo $tecnico['id_tecnico']; ?></td>
                <td><?php echo $tecnico['nome_tecnico']; ?></td>
                <td>
                    <?php
                    $dataNascimento = $tecnico['idade_tecnico'];
                    $dataAtual = new DateTime();
                    $dataNasc = new DateTime($dataNascimento);
                    $idade = $dataAtual->diff($dataNasc)->y;
                    echo $idade;
                    ?>
                </td>
                <td><?php echo $tecnico['nome_time']; ?></td>
            </tr>
        <?php endforeach; 
         echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''><a href=\"cadastro.html\">Voltar ao inicio</a></td>";?>
    </table>
</body>
</html>
