<?php

include dirname(__FILE__) . '/../insert_payment.php';

class InsertPoste extends InsertPayment
{
    private $PosteURL = "http://127.0.0.1:99/API/Poste/API/insert_payment.php";

    public function InsertPoste($datetime, $transaction_type, $amount, $reciver, $token)
    {
        $result = InsertPayment::InsertPayment($datetime, $transaction_type, $amount, $reciver, $token, $this->PosteURL);
        return $result;
    }
}

?>