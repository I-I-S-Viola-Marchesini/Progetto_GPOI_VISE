<?php

// La classe PaymentGateway è stata creata per gestire le operazioni sui circiuti di pagamento.
class PaymentGateway
{
    protected $conn;
    protected $table_name = "payment_gateway";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // La funzione getArchivePaymentGateway() restituisce tutti i circuiti di pagamento presenti nel database.
    public function getArchivePaymentGateway()
    {
        $query = "SELECT id, card_token, credit_circuit
        FROM $this->table_name";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    // La funzione getPaymentGatewayOnID() restituisce un circuito di pagamento in base al suo id.
    public function getPaymentGatewayOnID($id)
    {
        $query = "SELECT id, card_token, credit_circuit
        FROM $this->table_name 
        WHERE id = '$id'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    // La funzione getPaymentGatewayOnCreditCircuit() restituisce un circuito di pagamento in base al suo circuito di credito.
    public function getPaymentGatewayOnCreditCircuit($credit_circuit)
    {
        $query = "SELECT id, card_token, credit_circuit
        FROM $this->table_name 
        WHERE credit_circuit = '$credit_circuit'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    // La funzione getPaymentGatewayOnCardToken() restituisce un circuito di pagamento in base al suo token.
    public function getPaymentGatewayOnCardToken($card_token)
    {
        $query = "SELECT id, card_token, credit_circuit
        FROM $this->table_name 
        WHERE card_token = '$card_token'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    // La funzione addPaymentGateway() aggiunge un nuovo circuito di pagamento al database.
    public function addPaymentGateway($credit_circuit, $card_token)
    {
        $query = "INSERT INTO $this->table_name (card_token, credit_circuit)
        VALUES('$credit_circuit', '$card_token'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }
}

?>