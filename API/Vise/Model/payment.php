<?php
class Payment
{
    protected $conn;
    protected $table_account_transaction = "account_transaction";
    protected $table_transaction = "transaction";
    protected $table_user = "user";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function get_name_surname($account_id)
    {
        $query = "SELECT $this->table_user.name, $this->table_user.surname
        FROM $this->table_user
        WHERE $this->table_user.account_id = '$account_id'";

        $stmt = $this->conn->query($query);
        $name = $stmt->fetch_assoc()["name"];

        $query = "SELECT $this->table_user.name, $this->table_user.surname
        FROM $this->table_user
        WHERE $this->table_user.account_id = '$account_id'";

        $stmt = $this->conn->query($query);

        $surname = $stmt->fetch_assoc()["surname"];

        $concatenata = $name . " " . $surname;
        echo $concatenata;
        return $concatenata;
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