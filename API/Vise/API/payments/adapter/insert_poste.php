<?php

include dirname(__FILE__) . '/../insert_payment.php';

class InsertPoste extends InsertPayment //Estende la classe InsertPayment
{
    private $PosteURL = "http://127.0.0.1:99/API/Poste/API/insert_payment.php"; //URL Specifico per l'API di Poste

    public function InsertPoste($datetime, $transaction_type, $amount, $reciver, $token) //Funzione specifica per Poste
    {
        //Chiamiamo la funzione InsertPayment della classe padre
        $result = InsertPayment::InsertPayment($datetime, $transaction_type, $amount, $reciver, $token, $this->PosteURL);
        return $result;
    }
}

?>