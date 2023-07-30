<?php
include_once '../Models/Crud.php';
include_once '../Models/Validation.php';

class ControllerJogador
{
    private $crud;
    private $validation;

    public function __construct()
    {
        $this->crud = new Crud();
        $this->validation = new Validation();
    }

    // MÉTODO ADD-JOGADORES
    public function addJogador()
    {
        if (isset($_POST['Submit'])) {
            $nome_jogador = $this->crud->escape_string($_POST['nome_jogador']);
            $idade_jogador = $this->crud->escape_string($_POST['idade_jogador']);
            $posicao_jogador = $this->crud->escape_string($_POST['posicao_jogador']);
            $class_jogador = $this->crud->escape_string($_POST['class_jogador']);
            $id_time = $this->crud->escape_string($_POST['id_time']);

            $msg = $this->validation->check_empty($_POST, array('nome_jogador', 'idade_jogador', 'posicao_jogador', 'class_jogador'));

            if ($msg == null) {
                $result = $this->crud->execute("INSERT INTO jogadores (nome_jogador, idade_jogador, posicao_jogador, class_jogador, id_time) VALUES ('$nome_jogador', '$idade_jogador', '$posicao_jogador', '$class_jogador', '$id_time')");

                echo "<script language='javascript' type='text/javascript'> 
                        var divAlerta = document.createElement('div');
                        divAlerta.style.color = 'green';
                        divAlerta.style.backgroundColor = 'lightgreen';
                        divAlerta.style.padding = '10px';
                        divAlerta.style.margin = '10px';
                        divAlerta.style.position = 'fixed';
                        divAlerta.style.bottom = '0';
                        divAlerta.style.left = '0'; 
                        divAlerta.style.width = '100%';
                        divAlerta.style.textalign = 'center'; 
                        divAlerta.textContent = 'Dados cadastrados com sucesso!'; 
                        document.body.appendChild(divAlerta);

                        setTimeout(function() {
                            document.body.removeChild(divAlerta); 
                            // window.location.href = '../View/view-jogadores.php'; 
                        }, 3000); 
                    </script>";
            } else {
                echo "<script language='javascript' type='text/javascript'> 
                        var divAlerta = document.createElement('div');
                        divAlerta.style.color = 'red';
                        divAlerta.style.backgroundColor = 'lightcoral';
                        divAlerta.style.padding = '10px';
                        divAlerta.style.margin = '10px';
                        divAlerta.style.position = 'fixed';
                        divAlerta.style.bottom = '0';
                        divAlerta.style.left = '0'; 
                        divAlerta.style.width = '100%';
                        divAlerta.style.textalign = 'center'; 
                        divAlerta.textContent = 'Preencha os dados nos campos!'; 
                        document.body.appendChild(divAlerta);

                        setTimeout(function() {
                            document.body.removeChild(divAlerta); 
                            // window.location.href = '../View/add-jogador.php'; 
                        }, 3000); 
                    </script>";
            }
        }
    }

    // MÉTODO VIEW-JOGADORES
    public function viewJogadores()
    {
        $query = "SELECT jogadores.*, times.nome_time FROM jogadores JOIN times ON jogadores.id_time = times.id_time ORDER BY jogadores.id_jogador";
        $result = $this->crud->getData($query);
        return $result;
    }
    // MÉTODO GET TIMES
    function getTimes()
    {
        $query = "SELECT * FROM times";
        $result = $this->crud->getData($query);
        return $result;
    }

    // MÉTODO DELETE-JOGADOR
    public function deleteJogador($id)
    {
        $table = 'jogadores';
        $query = "DELETE FROM $table WHERE id_jogador = $id";
        $result = $this->crud->delete($query);
        if ($result) {
            header("location:../View/view-jogadores.php");
        }
    }

    // MÉTODO UPDATE-JOGADOR
    public function updateJogador($id, $nome_jogador, $idade_jogador, $posicao_jogador, $class_jogador, $id_time)
    {
        $nome_jogador = $this->crud->escape_string($nome_jogador);
        $idade_jogador = $this->crud->escape_string($idade_jogador);
        $posicao_jogador = $this->crud->escape_string($posicao_jogador);
        $class_jogador = $this->crud->escape_string($class_jogador);
        $id_time = $this->crud->escape_string($id_time);

        $msg = $this->validation->check_empty($_POST, array('nome_jogador', 'idade_jogador', 'posicao_jogador', 'class_jogador'));
        if ($msg == null) {
            $query = "UPDATE jogadores SET nome_jogador='$nome_jogador', idade_jogador='$idade_jogador', posicao_jogador='$posicao_jogador', class_jogador='$class_jogador', id_time='$id_time' WHERE id_jogador=$id";
            $result = $this->crud->execute($query);

            if ($result) {
                echo "<script language='javascript' type='text/javascript'> 
                        var divAlerta = document.createElement('div');
                        divAlerta.style.color = 'green';
                        divAlerta.style.backgroundColor = 'lightgreen';
                        divAlerta.style.padding = '10px';
                        divAlerta.style.margin = '10px';
                        divAlerta.style.position = 'fixed';
                        divAlerta.style.bottom = '0';
                        divAlerta.style.left = '0'; 
                        divAlerta.style.width = '100%';
                        divAlerta.style.textalign = 'center'; 
                        divAlerta.textContent = 'Dados atualizados com sucesso!'; 
                        document.body.appendChild(divAlerta);

                        setTimeout(function() {
                            document.body.removeChild(divAlerta); 
                            // window.location.href = '../View/view-jogadores.php'; 
                        }, 3000); 
                    </script>";
            } else {
                echo "<script language='javascript' type='text/javascript'> 
                        var divAlerta = document.createElement('div');
                        divAlerta.style.color = 'red';
                        divAlerta.style.backgroundColor = 'lightcoral';
                        divAlerta.style.padding = '10px';
                        divAlerta.style.margin = '10px';
                        divAlerta.style.position = 'fixed';
                        divAlerta.style.bottom = '0';
                        divAlerta.style.left = '0'; 
                        divAlerta.style.width = '100%';
                        divAlerta.style.textalign = 'center'; 
                        divAlerta.textContent = 'Preencha os dados nos campos!'; 
                        document.body.appendChild(divAlerta);

                        setTimeout(function() {
                            document.body.removeChild(divAlerta); 
                            // window.location.href = '../View/view-jogadores.php'; 
                        }, 3000); 
                    </script>";
            }
        }
    }

    // MÉTODO GETJOGADORBYID
    public function getJogadorById($id)
    {
        $id = $this->crud->escape_string($id);

        $query = "SELECT jogadores.*, times.nome_time FROM jogadores JOIN times ON jogadores.id_time = times.id_time WHERE jogadores.id_jogador=$id";
        $result = $this->crud->getData($query);

        if (!empty($result)) 
        {
            return $result[0];
        } else {
            return null;
        }
    }
}
?>
