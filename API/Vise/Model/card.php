<?php

class Card
{

    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createCard($cardName, $instituteCommunicationToken, $expirationDate, $billingAddressID)
    {
        $query = "INSERT INTO vise_db.card (card_name, institute_communication_token, expiration_date, billing_address_id) VALUES (?, ?, ?, ?);";
        $result = $this->conn->prepare($query);
        $result->bind_param('sssi', $cardName, $instituteCommunicationToken, $expirationDate, $billingAddressID);
        $result->execute();
        return $result;
    }

}

?>