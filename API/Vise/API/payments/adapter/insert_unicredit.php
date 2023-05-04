<?php

include dirname(__FILE__) . '/../insert_payment.php';

class InsertUnicredit extends InsertPayment //Estende la classe InsertPayment
{
    private $UnicreditURL = "http://127.0.0.1/Progetto_GPOI_VISE/API/Unicredit/API/insert_payment.php"; //URL Specifico per l'API di Unicredit

    public function InsertUnicredit($datetime, $transaction_type, $amount, $reciver, $token) //Funzione specifica per Unicredit
    {
        //Chiamiamo la funzione InsertPayment della classe padre
        $result = InsertPayment::InsertPayment($datetime, $transaction_type, $amount, $reciver, $token, $this->UnicreditURL);
        return $result;
    }
}

?>