<?php

class InsertPayment{

    //Firme metodi:

    //1. INTESA                          receiver??? Bruh...
    // datetime transaction_type amount reciver token

    //2. POSTE
    // datetime transaction_type amount reciver token
    
    //3. UNICREDIT
    // datetime transaction_type amount reciver token

    private static function POSTRequest($data, $url) {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json; charset=UTF-8\r\n",
                'method'  => 'POST',
                'content' => json_decode($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */ }
        
        return $result;
    }

    public function InsertPayment($datetime, $transaction_type, $amount, $reciver, $token, $connectionURL)
    {
        //json encoded data
        $data = json_encode(array(
            "datetime" => $datetime,
            "transaction_type" => $transaction_type,
            "amount" => $amount,
            "reciver" => $reciver,
            "token" => $token
        ));

        $result = InsertPayment::POSTRequest($data, $connectionURL);

        return $result;
    }

}

?>