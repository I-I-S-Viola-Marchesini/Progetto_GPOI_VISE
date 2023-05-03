<?php
class User
{
    protected $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function login($email, $password){
        $query = "SELECT user.account_id FROM `user` WHERE user.email = '$email' AND user.password = '$password'";
        
        $result = $this->conn->query($query);

        return $result;
    }
}
?>