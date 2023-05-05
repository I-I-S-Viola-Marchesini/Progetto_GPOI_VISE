<?php

class User_Card
{
    protected $conn;
    public function __construct($db){
        $this->conn = $db;
    }

    public function createUserCard($user, $card){
        $query = "INSERT INTO vise_db.user_card (user_id, card_id) VALUES (?, ?)";
        $result = $this->conn->prepare($query);
        $result->bind_param('si', $user, $card);
        $result->execute();
        return $result;
    }
}

?>