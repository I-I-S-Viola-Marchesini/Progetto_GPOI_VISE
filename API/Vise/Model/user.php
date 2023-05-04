<?php
class User
{
    protected $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function login($username, $password){

        $query = "";
        $mode = "";

        if(filter_var($username, FILTER_VALIDATE_EMAIL)){
            $mode = "email";
        }else{
            $mode = "user_name";
        }

        $query = "SELECT user.account_id FROM `user` WHERE user.$mode = '$username' AND user.password = '$password'";
        
        $result = $this->conn->query($query);

        return $result;
    }
}
?>