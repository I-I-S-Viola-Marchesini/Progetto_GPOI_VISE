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
        $query_balance = "SELECT $this->table_account.current_balance
        FROM $this->table_card
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.pan
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_id
        WHERE $this->table_card_institute.communication_token = '$token'";
        $balance = $this->conn->query($query_balance);

        $balance_value = $balance->fetch_assoc()["current_balance"];

        if($balance_value >= $amount)
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
        $query_balance = "SELECT $this->table_account.current_balance
        FROM $this->table_card
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.pan
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_id
        WHERE $this->table_card_institute.communication_token = '$token'";
        $balance = $this->conn->query($query_balance);

        $balance_value = $balance->fetch_assoc()["current_balance"];

        if($balance_value < $amount)
        {
            return false;
        }

        $new_amount = $balance_value - $amount;

        $query_balance = "SELECT $this->table_account.account_number
        FROM $this->table_card
        LEFT JOIN $this->table_card_institute  ON $this->table_card_institute.card_id = $this->table_card.pan
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_id
        WHERE $this->table_card_institute.communication_token = '$token'";
        $account_number = $this->conn->query($query_balance);

        $account_number_value = $account_number->fetch_assoc()["account_number"];

        

        $query_credit_claims = "UPDATE $this->table_account
        SET current_balance = $new_amount
        WHERE account_number = '$account_number_value'";
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
        LEFT JOIN $this->table_account ON $this->table_account.account_number = $this->table_card.account_id
        WHERE $this->table_card_institute.communication_token = '$token'";

        $stmt = $this->conn->query($query);
        
        $val = $stmt->fetch_assoc()["account_number"];
        return $val;

    }

    function register_transactions($datetime, $transaction_type, $amount, $sender, $reciver, $account_number)
    {

        $query_registration_transaction = "Insert into $this->table_transaction (date_time, transaction_type, amount, sender, receiver)
        values ('$datetime', '$transaction_type', '$amount', '$sender', '$reciver')";
        $stmt = $this->conn->query($query_registration_transaction);

        if($stmt == true)
        {
            return true;
        }
        else
        {
            return false;
        }

        $id_transaction = mysqli_insert_id($this->conn);

        $query_account_transaction = "Insert into $this->table_account_transaction (account_id, transaction_id)
        values ('$account_number', '$id_transaction')";
        $result = $this->conn->query($query_account_transaction);
        
    }
}
?>