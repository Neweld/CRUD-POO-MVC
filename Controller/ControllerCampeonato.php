<?php
include_once '../Models/Crud.php';
include_once '../Models/Validation.php';

class ControllerCampeonato
{
    private $crud;
    private $validation;

    public function __construct()
    {
        $this->crud = new Crud();
        $this->validation = new Validation();
    }

    // MÉTODO ADD-campeonatos
    public function addCampeonato()
    {
        if (isset($_POST['Submit'])) {
            $nome_campeonato = $this->crud->escape_string($_POST['nome_campeonato']);
            $pais_campeonato = $this->crud->escape_string($_POST['pais_campeonato']);

            $msg = $this->validation->check_empty($_POST, array('nome_campeonato', 'pais_campeonato'));

            if ($msg == null) {
                $result = $this->crud->execute("INSERT INTO campeonatos (nome_campeonato, pais_campeonato) VALUES ('$nome_campeonato', '$pais_campeonato')");

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
                            // window.location.href = '../View/view-campeonatos.php'; 
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
                        divAlerta.style.textAlign = 'center'; 
                        divAlerta.textContent = 'Preencha os dados nos campos!'; 
                        document.body.appendChild(divAlerta);

                        setTimeout(function() {
                            document.body.removeChild(divAlerta); 
                            // window.location.href = '../View/add-campeonato.php'; 
                        }, 3000); 
                    </script>";
            }
        }
    }

    // MÉTODO VIEW-campeonatos
    public function viewCampeonatos()
    {
        $query = "SELECT * FROM campeonatos ORDER BY id_campeonato";
        $result = $this->crud->getData($query);
        return $result;
    }

    // MÉTODO DELETE-campeonato
    public function deleteCampeonato($id)
    {
        $table = 'campeonatos';
        $query = "DELETE FROM $table WHERE id_campeonato = $id";
        $result = $this->crud->delete($query);
        if ($result) {
            header("location:../View/view-campeonatos.php");
        }
    }

    // MÉTODO UPDATE-campeonato
    public function updateCampeonato($id, $nome_campeonato, $pais_campeonato)
    {
        $nome_campeonato = $this->crud->escape_string($nome_campeonato);
        $pais_campeonato = $this->crud->escape_string($pais_campeonato);

        $msg = $this->validation->check_empty($_POST, array('nome_campeonato', 'pais_campeonato'));
        if ($msg == null) {
            $query = "UPDATE campeonatos SET nome_campeonato='$nome_campeonato', pais_campeonato='$pais_campeonato' WHERE id_campeonato=$id";
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
                        divAlerta.style.textAlign = 'center'; 
                        divAlerta.textContent = 'Dados atualizados com sucesso!'; 
                        document.body.appendChild(divAlerta);

                        setTimeout(function() {
                            document.body.removeChild(divAlerta); 
                            // window.location.href = '../View/view-campeonatos.php'; 
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
                            // window.location.href = '../View/view-campeonatos.php'; 
                        }, 3000); 
                    </script>";
            }
        }
    }

    // MÉTODO GETcampeonatoBYID
    public function getCampeonatoById($id)
    {
        $id = $this->crud->escape_string($id);

        $query = "SELECT * FROM campeonatos WHERE id_campeonato=$id";
        $result = $this->crud->getData($query);

        if (!empty($result)) {
            return $result[0];
        } else {
            return null;
        }
    }
}
?>
