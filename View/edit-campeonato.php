<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Campeonato</title>
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
     include_once '../Controller/ControllerCampeonato.php';

     if (isset($_GET['id_campeonato'])) 
     {
         $id = $_GET['id_campeonato'];

         $campeonatoController = new ControllerCampeonato();
         $campeonato = $campeonatoController->getCampeonatoById($id);

         if (!$campeonato) 
         {
             echo 'Campeonato não encontrado';
             exit;
         }

         if (isset($_POST['Submit'])) 
         {
             $nome = $_POST['nome_campeonato'];
             $pais = $_POST['pais_campeonato'];

             $campeonatoController->updateCampeonato($id, $nome, $pais);
         }
     } 
     else 
     {
        echo 'ID dO CAMPEONATO não fornecido';
        exit;
     }
     ?>

     <form name="form1" method="post" action="">
         <table border="0">
             <tr>
                 <td>Nome</td>
                 <td><input type="text" name="nome_campeonato" value="<?php echo $campeonato['nome_campeonato']; ?>"></td>
    </tr>
    <tr>
    <td>País de origem</td>
                 <td><input type="text" name="pais_campeonato" value="<?php echo $campeonato['pais_campeonato']; ?>"></td>
    </tr>
    <tr>
        <td><input type="submit" name="Submit" value="Atualizar"></td>
        <td><button type='submit' formaction='../View/view-campeonatos.php'>Voltar</button>
    </td>
    </tr>
    </table>
    </form> 
    
</body>
</html>