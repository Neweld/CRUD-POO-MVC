<?php
include_once '../Models/Crud.php';
include_once '../Models/Validation.php';

class ControllerTecnico
{
    private $crud;
    private $validation;

    public function __construct()
    {
        $this->crud = new Crud();
        $this->validation = new Validation();
    }

    // METODO ADD-TECNICOS
    public function addTecnico()
    {
        if (isset($_POST['Submit'])) {
            $nome_tecnico = $this->crud->escape_string($_POST['nome_tecnico']);
            $idade_tecnico = $this->crud->escape_string($_POST['idade_tecnico']);
            $id_time = $this->crud->escape_string($_POST['id_time']);

            $msg = $this->validation->check_empty($_POST, array('nome_tecnico', 'idade_tecnico'));
            if ($msg == null) {
                $result = $this->crud->execute("INSERT INTO tecnicos (nome_tecnico, idade_tecnico, id_time) VALUES ('$nome_tecnico', '$idade_tecnico', '$id_time')");

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
                        divAlerta.textContent = 'Dados cadastrados com sucesso!'; 
                        document.body.appendChild(divAlerta);

                        setTimeout(function() {
                            document.body.removeChild(divAlerta); 
                            // window.location.href = '../View/view-tecnicos.php'; 
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
                            // window.location.href = '../View/add-tecnico.php'; 
                        }, 3000); 
                    </script>";
            }
        }
    }

    // MÉTODO VIEW-tecnicos
    public function viewTecnicos()
    {
        $query = "SELECT tecnicos.*, times.nome_time FROM tecnicos JOIN times ON tecnicos.id_time = times.id_time ORDER BY tecnicos.id_tecnico";
        $result = $this->crud->getData($query);
        return $result;
    }

    // MÉTODO PEGAR-tecnicos

    public function getTimes()
    {
        $query = "SELECT * FROM times";
        $result = $this->crud->getData($query);
        return $result;
    }

    // MÉTODO DELETE-tecnicos
    public function deleteTecnico($id)
    {
        $table = 'tecnicos';
        $query = "DELETE FROM $table WHERE id_tecnico = $id";
        $result = $this->crud->delete($query);
        if ($result) {
            header("location:../View/view-tecnicos.php");
        }
    }

    // MÉTODO UPDATE recnicos
    public function updateTecnico($id, $nome_tecnico, $idade_tecnico, $id_time)
    {
        $nome_tecnico = $this->crud->escape_string($nome_tecnico);
        $idade_tecnico = $this->crud->escape_string($idade_tecnico);
        $id_time = $this->crud->escape_string($id_time);

        $msg = $this->validation->check_empty($_POST, array('nome_tecnico', 'idade_tecnico', 'id_time'));
        if ($msg == null) {
            $query = "UPDATE tecnicos SET nome_tecnico='$nome_tecnico', idade_tecnico='$idade_tecnico', id_time='$id_time' WHERE id_tecnico=$id";
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
                            // window.location.href = '../View/view-tecnicos.php'; 
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
                            // window.location.href = '../View/view-tecnicos.php'; 
                        }, 3000); 
                    </script>";
            }
        }
    }

    // MÉTODO GETtecnicosBYID
    public function getTecnicoById($id)
    {
        $id = $this->crud->escape_string($id);
        $query = "SELECT tecnicos.*, times.nome_time FROM tecnicos JOIN times ON tecnicos.id_time = times.id_time WHERE tecnicos.id_tecnico=$id";
        $result = $this->crud->getData($query);

        if (!empty($result)) {
            return $result[0];
        } else {
            return null;
        }
    }
}
?>
