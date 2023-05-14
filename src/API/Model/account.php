<?php

class Account
{
    protected $conn;
    protected $table_account = 'account';
    protected $table_user = 'user';

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getBalance($user_id)
    {
        $query = "SELECT balance 
        FROM $this->table_account 
        WHERE user_id = '$user_id'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function createAccount($name, $last_name, $username, $email, $password, $tax_code, $mobile_number, $birth_date, $registration_date)
    {
        $status = 1;

        $query = "INSERT INTO $this->table_user (name, last_name, username, email, password, tax_code, mobile_number, birth_date, registration_date, status) 
        VALUES ('$name', '$last_name', '$username', '$email', '$password', '$tax_code', '$mobile_number', '$birth_date', '$registration_date', '$status')";

        $stmt = $this->conn->query($query);

        $user_id = mysqli_insert_id($this->conn);

        $query = "INSERT INTO $this->table_account (user_id, balance)
        VALUES ('$user_id', '0')";

        $stmt = $this->conn->query($query);       

        return $stmt;
    }

    public function loginEmail($email, $password)
    {
        $query = "SELECT id
        FROM $this->table_user
        WHERE email = '$email' AND password = '$password' AND status = 1";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function loginUsername($username, $password)
    {
        $query = "SELECT id
        FROM $this->table_user
        WHERE username = '$username' AND password = '$password' AND status = 1";

        $stmt = $this->conn->query($query);

        return $stmt;
    }
}
?>