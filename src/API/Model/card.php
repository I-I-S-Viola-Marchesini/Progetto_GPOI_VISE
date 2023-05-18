<?php

class Card
{
    protected $conn;
    protected $table_card = 'card';
    protected $table_payment = 'payment';
    protected $table_payment_gateway = 'payment_gateway';
    protected $table_user = 'user_account';


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insertCard($user_id, $pan, $expiration_date, $billing_address, $card_token, $credit_circuit)
    {
        $query = "INSERT INTO $this->table_payment_gateway (card_token, credit_circuit)
        VALUES ('$card_token', '$credit_circuit')";

        $stmt = $this->conn->query($query);

        $id_payment_gateway = mysqli_insert_id($this->conn);

        $query = "INSERT INTO $this->table_card (user_id, pan, expiration_date, billing_address, payment_gateway_id) 
        VALUES ('$user_id', '$pan', '$expiration_date', '$billing_address', '$id_payment_gateway')";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function addNickname($id, $card_name)
    {
        $query = "UPDATE $this->table_card
        SET card_name = '$card_name'
        WHERE id = '$id'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function getCardByUserID($user_id)
    {
        $query = "SELECT id, pan, card_name
        FROM $this->table_card 
        WHERE user_id = '$user_id'";

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