<?php

include dirname(__FILE__) . '/../insert_payment.php';

class InsertIntesa extends InsertPayment
{
    private $IntesaURL = "http://127.0.0.1:99/API/Intesa/API/insert_payment.php";

    public function InsertIntesa($datetime, $transaction_type, $amount, $reciver, $token)
    {
        $result = InsertPayment::InsertPayment($datetime, $transaction_type, $amount, $reciver, $token, $this->IntesaURL);
        return $result;
    }
}

?>