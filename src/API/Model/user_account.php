<?php

// La classe UserAccount è stata creata per gestire le operazioni sugli account utente.
class UserAccount
{
    protected $conn;
    protected $table_name = 'user_account';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // La funzione getArchiveUserAccount() restituisce (username, name, last_name, email, password, tax_code, mobile_number, birth_date) 
    //tutti gli account utente presenti nel database.
    public function getArchiveUserAccount()
    {
        $query = "SELECT username, name, last_name, email, password, tax_code, mobile_number, birth_date 
        FROM $this->table_name";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    // La funzione getUserAccountOnUsername() restituisce un account utente(username, name, last_name, email, password, tax_code, mobile_number, birth_date) 
    //in base ad un username.
    public function getUserAccountOnUsername($username)
    {
        $query = "SELECT username, name, last_name, email, password, tax_code, mobile_number, birth_date 
        FROM $this->table_name 
        WHERE username = '$username'";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    // La funzione getUserAccountBalance() restituisce il saldo di un account utente in base ad un username.
    public function getUserAccountBalance($username)
    {
        $query = "SELECT balance 
        FROM $this->table_name 
        WHERE username = '$username'";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    // La funzione updateUserAccount() aggiorna i dati di un account utente(username, name, last_name, email, tax_code, mobile_number, birth_date)
    public function updateUserAccount($username, $name, $last_name, $email, $tax_code, $mobile_number, $birth_date)
    {
        $query = "UPDATE $this->table_name 
        SET name='$name', last_name='$last_name', email='$email', tax_code='$tax_code', mobile_number='$mobile_number', birth_date='$birth_date'
        WHERE username='$username'";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    // La funzione updatePassword() aggiorna la password di un account utente in base ad un username.
    public function updatePassword($username, $password_new, $password_old)
    {
        $query = "UPDATE $this->table_name 
        SET password='$password_new'
        WHERE username='$username' AND password='$password_old'";
        $stmt = $this->conn->query($query);
        return $this->conn->affected_rows;
    }

    // La funzione addUserAccount() aggiunge un nuovo account utente(username, name, last_name, email, password, tax_code, mobile_number, birth_date, registration_date)
    public function addUserAccount($username, $name, $last_name, $email, $password, $tax_code, $mobile_number, $birth_date, $registration_date)
    {
        $status = 1;

        $query = "INSERT INTO $this->table_name (name, last_name, username, email, password, tax_code, mobile_number, birth_date, registration_date, status, balance) 
        VALUES ('$name', '$last_name', '$username', '$email', '$password', '$tax_code', '$mobile_number', '$birth_date', '$registration_date', '$status', 0)";

        $stmt = $this->conn->query($query);

        echo $query;

        return $stmt;
    }

    // La funzione loginEmail() restituisce l'username di un account utente in base ad una email e una password e lo status deve essere pari ad 1.
    public function loginEmail($email, $password)
    {
        $query = "SELECT username
        FROM $this->table_name
        WHERE email = '$email' AND password = '$password' AND status = 1";

        $stmt = $this->conn->query($query);

        return $stmt;
    }

    // La funzione loginUsername() restituisce l'username di un account utente in base ad un username e una password e lo status deve essere pari ad 1.
    public function loginUsername($username, $password)
    {
        $query = "SELECT username
        FROM $this->table_name
        WHERE username = '$username' AND password = '$password' AND status = 1";

        $stmt = $this->conn->query($query);

        return $stmt;
    }
}
