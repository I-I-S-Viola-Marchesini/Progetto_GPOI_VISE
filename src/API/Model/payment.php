<?php

class Payment
{
    protected $conn;
    protected $table_name = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getArchivePayment()
    {
        $query = "SELECT * FROM $this->table_name";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function getPaymentOnID($id)
    {
        $query = "SELECT * FROM $this->table_name WHERE id=$id";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function getPaymentOnSenderUserID($sender_user_id)
    {
        $query = "SELECT * FROM $this->table_name WHERE sender_user_id= $sender_user_id";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function getPaymentOnSenderCardID($sender_card_id)
    {
        $query = "SELECT * FROM $this->table_name WHERE sender_card_id= $sender_card_id";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function addNewPayment($sender_user_id, $sender_card_id, $payment_date, $destination, $amount)
    {
        $query = "INSERT INTO $this->table_name VALUES ('$sender_user_id', '$sender_card_id', '$payment_date', '$destination', '$amount')";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    


}


?>