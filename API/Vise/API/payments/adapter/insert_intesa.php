<?php

include dirname(__FILE__) . '/../insert_payment.php';

class InsertIntesa extends InsertPayment //Estende la classe InsertPayment
{
    private $IntesaURL = "http://127.0.0.1:99/API/Intesa/API/insert_payment.php"; //URL Specifico per l'API di Intesa San Paolo

    public function InsertIntesa($datetime, $transaction_type, $amount, $reciver, $token) //Funzione specifica per Intesa San Paolo
    {
        //Chiamiamo la funzione InsertPayment della classe padre
        $result = InsertPayment::InsertPayment($datetime, $transaction_type, $amount, $reciver, $token, $this->IntesaURL);
        return $result;
    }
}

?>