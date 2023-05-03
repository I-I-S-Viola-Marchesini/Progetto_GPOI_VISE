<?php
class Database_Unicredit
{
    public $conn;
    public $ConnectionData;

    public function connect()
    {
        try {
            $connectionData = json_decode(file_get_contents("connectionData.json", true), true);
            $this->conn = new mysqli($connectionData['Unicredit.server'], $connectionData['Unicredit.user'], $connectionData['Unicredit.password'], $connectionData['Unicredit.database'], $connectionData['Unicredit.port']);
        } catch (Exception $ex) {
            die("Error connecting to database $ex\n\n");
        }
        return $this->conn;
    }
}

class Database_Intesa_Sanpaolo
{
    public $conn;
    public $ConnectionData;

    public function connect()
    {
        try {
            $connectionData = json_decode(file_get_contents("connectionData.json", true), true);
            $this->conn = new mysqli($connectionData['Intesa.server'], $connectionData['Intesa.user'], $connectionData['Intesa.password'], $connectionData['Intesa.database'], $connectionData['Intesa.port']);
        } catch (Exception $ex) {
            die("Error connecting to database $ex\n\n");
        }
        return $this->conn;
    }
}

class Database_Poste_Italiane
{
    public $conn;
    public $ConnectionData;

    public function connect()
    {
        try {
            $connectionData = json_decode(file_get_contents("connectionData.json", true), true);
            $this->conn = new mysqli($connectionData['Poste.server'], $connectionData['Poste.user'], $connectionData['Poste.password'], $connectionData['Poste.database'], $connectionData['Poste.port']);
        } catch (Exception $ex) {
            die("Error connecting to database $ex\n\n");
        }
        return $this->conn;
    }
}
/*
class Database_Intesa_Sanpaolo
{
    private $server_local = "localhost";
    private $user_local = "root";
    private $passwd_local = "admin";
    private $db_local = "Intesa_Sanpaolo";
    private $port = "3306";
    public $conn;

    public function connect()
    {
        try {
            $this->conn = new mysqli($this->server_local, $this->user_local, $this->passwd_local, $this->db_local, $this->port);
        } catch (Exception $ex) {
            die("Error connecting to database $ex\n\n");
        }
        return $this->conn;
    }
}

class Database_Unicredit
{
    private $server_local = "localhost";
    private $user_local = "root";
    private $passwd_local = "admin";
    private $db_local = "Unicredit";
    private $port = "3306";
    public $conn;

    public function connect()
    {
        try {
            $this->conn = new mysqli($this->server_local, $this->user_local, $this->passwd_local, $this->db_local, $this->port);
        } catch (Exception $ex) {
            die("Error connecting to database $ex\n\n");
        }
        return $this->conn;
    }
}

class Database_Poste_Italiane
{
    private $server_local = "localhost";
    private $user_local = "root";
    private $passwd_local = "admin";
    private $db_local = "Poste_Italiane";
    private $port = "3306";
    public $conn;

    public function connect()
    {
        try {
            $this->conn = new mysqli($this->server_local, $this->user_local, $this->passwd_local, $this->db_local, $this->port);
        } catch (Exception $ex) {
            die("Error connecting to database $ex\n\n");
        }
        return $this->conn;
    }
}
*/
?>