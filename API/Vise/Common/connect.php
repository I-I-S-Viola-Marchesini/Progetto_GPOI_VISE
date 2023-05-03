<?php
class Database_Vise
{
    public $conn;
    public $ConnectionData;

    public function connect()
    {
        try {
            $connectionData = json_decode(file_get_contents("connectionData.json", true), true);
            $this->conn = new mysqli($connectionData['server'], $connectionData['user'], $connectionData['password'], $connectionData['database'], $connectionData['port']);
        } catch (Exception $ex) {
            die("Error connecting to database $ex\n\n");
        }
        return $this->conn;
    }
}
?>