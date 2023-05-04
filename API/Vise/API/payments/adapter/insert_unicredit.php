<?php

include dirname(__FILE__) . '/../insert_payment.php';

class InsertUnicredit extends InsertPayment
{
    private $UnicreditURL = "http://127.0.0.1:99/API/Unicredit/API/insert_payment.php";

    public function InsertUnicredit($datetime, $transaction_type, $amount, $reciver, $token)
    {
        $result = InsertPayment::InsertPayment($datetime, $transaction_type, $amount, $reciver, $token, $this->UnicreditURL);
        return $result;
    }
}

?>