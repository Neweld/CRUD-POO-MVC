<?php
include_once '../Models/Crud.php';
include_once '../Models/Validation.php';

class ControllerTime
{
    private $crud;
    private $validation;

    public function __construct()
    {
        $this->crud = new Crud();
        $this->validation = new Validation();
    }

    // MÉTODO ADD-times
    public function addTime()
    {
        if (isset($_POST['Submit'])) {
            $nome_time = $this->crud->escape_string($_POST['nome_time']);
            $alcunha_time = $this->crud->escape_string($_POST['alcunha_time']);
            $estadio_time = $this->crud->escape_string($_POST['estadio_time']);
            $mascote_time = $this->crud->escape_string($_POST['mascote_time']);
            $id_campeonato = $this->crud->escape_string($_POST['id_campeonato']);

            $msg = $this->validation->check_empty($_POST, array('nome_time', 'alcunha_time', 'estadio_time', 'mascote_time'));

            if ($msg == null) {
                $result = $this->crud->execute("INSERT INTO times (nome_time, alcunha_time, estadio_time, mascote_time, id_campeonato) VALUES ('$nome_time', '$alcunha_time', '$estadio_time', '$mascote_time', '$id_campeonato')");

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
                            // window.location.href = '../View/view-times.php'; 
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
                            // window.location.href = '../View/add-times.php'; 
                        }, 3000); 
                    </script>";
            }
        }
    }

    // MÉTODO VIEW-TIME
    public function viewTimes()
    {
        $query = "SELECT times.*, campeonatos.nome_campeonato FROM times JOIN campeonatos ON times.id_campeonato = campeonatos.id_campeonato ORDER BY times.id_time";
        $result = $this->crud->getData($query);
        return $result;
    }

    // MÉTODO PEGAR-CAMPEONATOS

    public function getCampeonatos()
    {
        $query = "SELECT * FROM campeonatos";
        $result = $this->crud->getData($query);
        return $result;
    }

    // MÉTODO DELETE-TIME
    public function deleteTime($id)
    {
        $table = 'times';
        $query = "DELETE FROM $table WHERE id_time = $id";
        $result = $this->crud->delete($query);
        if ($result) {
            header("location:../View/view-times.php");
        }
    }

    // MÉTODO UPDATE-TIME
public function updateTime($id, $nome_time, $alcunha_time, $estadio_time, $mascote_time, $id_campeonato)
{
    $nome_time = $this->crud->escape_string($nome_time);
    $alcunha_time = $this->crud->escape_string($alcunha_time);
    $estadio_time = $this->crud->escape_string($estadio_time);
    $mascote_time = $this->crud->escape_string($mascote_time);
    $id_campeonato = $this->crud->escape_string($id_campeonato);
    $msg = $this->validation->check_empty($_POST, array('nome_time', 'alcunha_time', 'estadio_time', 'mascote_time', 'id_campeonato'));
    if ($msg == null) {
        $query = "UPDATE times SET nome_time='$nome_time', alcunha_time='$alcunha_time', estadio_time='$estadio_time', mascote_time='$mascote_time', id_campeonato='$id_campeonato' WHERE id_time=$id";
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
                        // window.location.href = '../View/view-times.php'; 
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
                        // window.location.href = '../View/view-times.php'; 
                    }, 3000); 
                </script>";
        }
    }
}


    // MÉTODO GETTIMEBYID
    public function getTimeById($id)
    {
        $id = $this->crud->escape_string($id);

        $query = "SELECT times.*, campeonatos.nome_campeonato FROM times JOIN campeonatos ON times.id_campeonato = campeonatos.id_campeonato WHERE times.id_time=$id";
        $result = $this->crud->getData($query);

        if (!empty($result)) {
            return $result[0];
        } else {
            return null;
        }
    }
}
?>
