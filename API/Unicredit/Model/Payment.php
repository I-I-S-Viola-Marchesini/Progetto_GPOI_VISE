<?php
class Payment
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

    function control_disponibility($amount, $token)
    {
        $query = "SELECT current_balance 
        FROM $this->table_card
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.pan
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_number
        WHERE $this->table_card_institute.communication_token = '$token'";

        $stmt = $this->conn->query($query);

        if($stmt >= $amount)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function Withdrawal_amount($amount, $token)
    {
        $query_balance = "SELECT current_balance 
        FROM $this->table_card
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.pan
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_number
        WHERE $this->table_card_institute.communication_token = '$token'";
        $balance = $this->conn->query($query_balance);

        if($balance >= $amount)
        {
            return true;
        }
        else
        {
            return false;
        }

        $new_amount = $balance - $amount;

        $query_credit_claims = "UPDATE $this->table_card
        SET $this->table_account.current_balance = $new_amount
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.pan
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_number
        WHERE $this->table_card_institute.communication_token = '$token'";
        $result = $this->conn->query($query_credit_claims);
        if($result == true)
        {
            return true;
        }
        else
        {
            return false;
        }       
    }

    function get_name_surname($token)
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

    function register_transactions($datetime, $transaction_type, $amount, $sender, $reciver, $account_number)
    {
        $query_registration_transaction = "Insert into $this->table_transaction (datetime, transaction_type, amount, sender, reciver)
        values ('$datetime', '$transaction_type', '$amount', '$sender', '$reciver')";
        $stmt = $this->conn->query($query_registration_transaction);

        /*$query_id_transazione = "Select id from $this->table_transaction 
        where datetime = '$datetime' and transaction_type = '$tipo_transazione' and amount = '$importo' and sender = '$mittente' and reciver = '$destinatario'";
        $id_transazione = $this->conn->query($query_id_transazione);*/

        $id_transaction = $stmt->insert_id;

        $query_account_transaction = "Insert into $this->table_account_transaction (account_id, transaction_id)
        values ('$account_number', '$id_transaction')";
        $result = $this->conn->query($query_account_transaction);
        if($result == true)
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