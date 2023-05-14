<?php

class PaymentGateway
{
    protected $conn;
    protected $table_name = "payment_gateway";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getArchivePaymentGateway()
    {
        $query = "SELECT id, card_token, credit_circuit
        FROM $this->table_name";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function getPaymentGatewayOnID($id)
    {
        $query = "SELECT id, card_token, credit_circuit
        FROM $this->table_name 
        WHERE id = '$id'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function getPaymentGatewayOnCreditCircuit($credit_circuit)
    {
        $query = "SELECT id, card_token, credit_circuit
        FROM $this->table_name 
        WHERE credit_circuit = '$credit_circuit'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function getPaymentGatewayOnCardToken($card_token)
    {
        $query = "SELECT id, card_token, credit_circuit
        FROM $this->table_name 
        WHERE card_token = '$card_token'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function addPaymentGateway($credit_circuit, $card_token)
    {
        $query = "INSERT INTO $this->table_name (card_token, credit_circuit)
        VALUES('$credit_circuit', '$card_token'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }
}

?>