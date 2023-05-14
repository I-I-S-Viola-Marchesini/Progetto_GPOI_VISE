<?php

class User
{
    protected $conn;
    protected $table_name = "user";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getArchiveUser()
    {
        $query = "SELECT username, name, last_name, email, password, tax_code, mobile_number, birth_date FROM $this->table_name";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function getUserOnID($id)
    {
        $query = "SELECT username, name, last_name, email, password, tax_code, mobile_number, birth_date FROM $this->table_name WHERE id=$id";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function updateUser($username, $name, $last_name, $email, $password, $tax_code, $mobile_number, $birth_date)
    {
        $query = "UPDATE $this->table_name WHERE username=$username SET name='$name', last_name='$last_name', email='$email', password='$password', tax_code='$tax_code', mobile_number='$mobile_number', birth_date='$birth_date' ";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

}

?>