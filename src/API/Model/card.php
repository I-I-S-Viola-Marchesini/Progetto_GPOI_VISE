<?php

class Card
{
    protected $conn;
    protected $table_card = 'card';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insertCard($user_id, $expiration_date, $billing_address, $id_payment_gateway)
    {
        $query = "INSERT INTO $this->table_card (user_id, expiration_date, billing_address, id_payment_gateway) 
        VALUES ('$user_id', '$expiration_date', '$billing_address', '$id_payment_gateway')";

        $stmt = $this->conn->query($query);

        return $stmt;
    }
}

?>