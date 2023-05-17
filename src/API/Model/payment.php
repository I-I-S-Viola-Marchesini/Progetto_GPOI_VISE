<?php

class Payment
{
    protected $conn;
    protected $table_name = "payment";
    protected $table_user = 'user_account';

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
        $query = "SELECT $this->table_name.(sender_user_id, receiver_user_id, payment_date_time, amount)
        FROM payment;
        WHERE sender_card_id = $sender_card_id";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function addNewPayment($sender_user_id, $sender_card_id, $payment_date, $destination, $amount)
    {
        $query = "INSERT INTO $this->table_name VALUES ('$sender_user_id', '$sender_card_id', '$payment_date', '$destination', '$amount')";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function addNewTransaction($sender_user_id, $sender_card_id, $receiver_user_id, $payment_date, $destination, $amount)
    {
        $query = "SELECT balance 
        FROM $this->table_user 
        WHERE username = '$sender_user_id'";

        $result_balance = $this->conn->query($query);
        $row = mysqli_fetch_assoc($result_balance);

        $current_balance = $row['balance'];

        $stmt = $this->conn->query($query);

        if ($current_balance >= $amount) {

            $new_balance = $current_balance - $amount;

            $query = "UPDATE $this->table_user SET balance = '$new_balance' 
            WHERE username = '$sender_user_id'";

            $stmt = $this->conn->query($query);

            if ($stmt == false) {
                echo "error 1";
                return $stmt;
            }

            $query = "INSERT INTO $this->table_name (sender_user_id, receiver_user_id, payment_date_time, amount, account_payment, card_payment, sender_card_id)
            VALUES ('$sender_user_id', '$receiver_user_id', '$payment_date', '$amount', 1, 0, '$sender_card_id')";

            $stmt = $this->conn->query($query);

            if ($stmt == false) {
                echo "error 2";
                return $stmt;
            }
            return $stmt;
        } else if ($current_balance > 0 && $current_balance < $amount) {
            $query = "UPDATE $this->table_user SET balance = 0 
            WHERE username = '$sender_user_id'";

            $stmt = $this->conn->query($query);

            if ($stmt == false) {
                echo "error 3";
                return $stmt;
            }

            $query = "INSERT INTO $this->table_name (sender_user_id, receiver_user_id, payment_date_time, amount, account_payment, card_payment, sender_card_id)
            VALUES ('$sender_user_id', '$receiver_user_id', '$payment_date', '$amount', 1, 1, '$sender_card_id')";

            $stmt = $this->conn->query($query);

            if ($stmt == false) {
                echo "error 4";
                return $stmt;
            }

            return $stmt;
        } else {
            $query = "INSERT INTO $this->table_name (sender_user_id, receiver_user_id, payment_date_time, amount, account_payment, card_payment, sender_card_id)
            VALUES ('$sender_user_id', '$receiver_user_id', '$payment_date', '$amount', 0, 1, '$sender_card_id')";

            $stmt = $this->conn->query($query);

            if ($stmt == false) {
                echo "error 5";
                return $stmt;
            }
            return $stmt;
        }
    }

    public function getArchivePaymentByUsername($username){
        $query = "SELECT `sender_user_id`, `receiver_user_id`, `payment_date_time`, `amount`
            FROM $this->table_name
            WHERE `sender_user_id` LIKE '$username' 
            OR `receiver_user_id` LIKE '$username' ORDER BY `payment_date_time` DESC";

        $stmt = $this->conn->query($query);

        return $stmt;
    }
}
