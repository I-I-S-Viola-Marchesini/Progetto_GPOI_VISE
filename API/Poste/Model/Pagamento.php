<?php
class Pagamento
{
    protected $conn;
    protected $table_card = "card";
    protected $table_account = "account";
    protected $table_customer_card = "customer_card";
    protected $table_customer = "customer";
    protected $table_customer_account = "customer_account";
    protected $table_account_transaction = "account_transaction";
    protected $table_transaction = "transaction";
    protected $table_card_institute = "card_institute";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function Controllo_disponibilita($importo, $token)
    {
        $query = "SELECT current_balance 
        FROM $this->table_card
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.pan
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_number
        WHERE $this->table_card_institute.communication_token = '$token'";

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

    function Preleva_importo($importo, $token)
    {
        $query_saldo = "SELECT current_balance 
        FROM $this->table_card
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.pan
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_number
        WHERE $this->table_card_institute.communication_token = '$token'";
        $saldo = $this->conn->query($query_saldo);

        if($saldo >= $importo)
        {
            return true;
        }
        else
        {
            return false;
        }

        $nuovo_importo = $saldo - $importo;

        $query_modifica_credito = "UPDATE $this->table_card
        SET $this->table_account.current_balance = $nuovo_importo
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.pan
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_number
        WHERE $this->table_card_institute.communication_token = '$token'";
        $risultato = $this->conn->query($query_modifica_credito);
        if($risultato == true)
        {
            return true;
        }
        else
        {
            return false;
        }       
    }

    function get_nome_cognome($token)
    {
        $query = "SELECT $this->table_account.name, $this->table_account.surname
        FROM $this->table_card
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.pan
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_number
        WHERE $this->table_card_institute.communication_token = '$token'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    function get_account_number($token)
    {
        $query = "SELECT $this->table_account.account_number
        FROM $this->table_card
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.pan
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_number
        WHERE $this->table_card_institute.communication_token = '$token'";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function registra_transazione($datetime, $tipo_transazione, $importo, $mittente, $destinatario, $account_number)
    {
        $query_registra_trasazione = "Insert into $this->table_transaction (datetime, transaction_type, amount, sender, reciver)
        values ('$datetime', '$tipo_transazione', '$importo', '$mittente', '$destinatario')";
        $stmt = $this->conn->query($query_registra_trasazione);

        /*$query_id_transazione = "Select id from $this->table_transaction 
        where datetime = '$datetime' and transaction_type = '$tipo_transazione' and amount = '$importo' and sender = '$mittente' and reciver = '$destinatario'";
        $id_transazione = $this->conn->query($query_id_transazione);*/

        $id_transazione = $stmt->insert_id;

        $query_associa_account_transaction = "Insert into $this->table_account_transaction (account_id, transaction_id)
        values ('$account_number', '$id_transazione')";
        $risultato = $this->conn->query($query_associa_account_transaction);
        if($risultato == true)
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