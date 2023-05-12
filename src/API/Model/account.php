<?php

class Account
{
    protected $conn;
    protected $table_account = 'account';

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function get_balance($user_id)
    {
        $query = "SELECT balance 
        FROM $this->table_account 
        WHERE user_id = '$user_id'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }
}
?>