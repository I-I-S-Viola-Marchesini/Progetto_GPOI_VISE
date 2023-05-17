<?php

class UserAccount
{
    protected $conn;
    protected $table_name = 'user_account';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getArchiveUserAccount()
    {
        $query = "SELECT username, name, last_name, email, password, tax_code, mobile_number, birth_date 
        FROM $this->table_name";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function getUserAccountOnUsername($username)
    {
        $query = "SELECT username, name, last_name, email, password, tax_code, mobile_number, birth_date 
        FROM $this->table_name 
        WHERE username = '$username'";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function getUserAccountBalance($username)
    {
        $query = "SELECT balance 
        FROM $this->table_name 
        WHERE username = '$username'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function updateUserAccount($username, $name, $last_name, $email, $password, $tax_code, $mobile_number, $birth_date)
    {
        $query = "UPDATE $this->table_name 
        SET name='$name', last_name='$last_name', email='$email', password='$password', tax_code='$tax_code', mobile_number='$mobile_number', birth_date='$birth_date' 
        WHERE username=$username";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function addUserAccount($username, $name, $last_name, $email, $password, $tax_code, $mobile_number, $birth_date, $registration_date)
    {
        $status = 1;

        $query = "INSERT INTO $this->table_name (name, last_name, username, email, password, tax_code, mobile_number, birth_date, registration_date, status, balance) 
        VALUES ('$name', '$last_name', '$username', '$email', '$password', '$tax_code', '$mobile_number', '$birth_date', '$registration_date', '$status', 0)";

        $stmt = $this->conn->query($query);

        echo $query;

        return $stmt;
    }

    public function loginEmail($email, $password)
    {
        $query = "SELECT username
        FROM $this->table_name
        WHERE email = '$email' AND password = '$password' AND status = 1";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function loginUsername($username, $password)
    {
        $query = "SELECT username
        FROM $this->table_name
        WHERE username = '$username' AND password = '$password' AND status = 1";

        $stmt = $this->conn->query($query);

        return $stmt;
    }
}
?>