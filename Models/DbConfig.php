<?php
class DbConfig
{
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'oop';
    protected $connection;

    public function __construct()
    {
        if (!isset($this->connection)) 
        {

            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            if ($this->connection->connect_errno) 
            {
                echo 'Não é possível conectar ao servidor de banco de dados: ' . $this->connection->connect_error;
                exit;
            }
        }
    }
}
?>
