<?php

// La classe Database è stata creata per gestire la connessione al database.
class Database
{
    public $conn;
    public $ConnectionData;

    // La funzione connect() si connette al database, utlizzando i dati presenti in connectionData.json.
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