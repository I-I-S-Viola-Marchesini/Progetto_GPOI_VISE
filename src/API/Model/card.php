<?php

class Card
{
    protected $conn;
    protected $table_card = 'card';
    protected $table_payment = 'payment';
    protected $table_user = 'user';


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

    public function getTransaction($user_id)
    {
        $query = "SELECT $this->table_user.username ,$this->table_payment.payment_date, $this->table_payment.destination, $this->table_payment.amount
        FROM $this->table_payment
        INNER JOIN $this->table_user ON $this->table_payment.sender_user_id = $this->table_user.id
        WHERE $this->table_payment.sender_user_id = '$user_id'
        LIMIT 15";


        $stmt = $this->conn->query($query);

        return $stmt;
    }
}

?>