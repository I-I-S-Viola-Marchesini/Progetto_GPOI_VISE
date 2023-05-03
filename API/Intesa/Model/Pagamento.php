<?php
class Pagamenti
{
    protected $conn;
    protected $table_card = "card";
    protected $table_account = "account";
    protected $table_card_institute = "card_institute";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function Controllo_disponibilita($importo, $token)
    {
        $query = "SELECT current_balance 
        FROM $this->table_card
        LEFT JOIN $this->table_account ON $this->table_card.account_id = $this->table_account.id
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.id
        WHERE $this->table_card_institute.token = '$token'";

        $stmt = $this->conn->query($query);

        if($stmt >= $importo)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>