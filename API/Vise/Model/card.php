<?php

class Card
{

    protected $conn;

    public function __construct($db){
        $this->conn = $db;
    }

}

?>