<?php
namespace Database;

class Connection
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = 'native-new';
    
    public function Connect()
    {
        $database = mysqli_connect($this->servername, $this->username, $this->password, $this->db);

        if (!$database) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        return $database;
    }
}