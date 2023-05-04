<?php

class InsertPayment{

    //Firme metodi:

    //1. INTESA                          receiver??? Bruh...
    // datetime transaction_type amount reciver token

    //2. POSTE
    // datetime transaction_type amount reciver token
    
    //3. UNICREDIT
    // datetime transaction_type amount reciver token

    //Tutte uguali, cambia solo l'URL, NICEEEEEEEE :D


    //Funzione privata per effettuare la richiesta POST
    private static function POSTRequest($data, $url) {

        //Opzioni della richiesta
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json; charset=UTF-8\r\n",
                'method'  => 'POST',
                'content' => json_decode($data)
            )
        );
        //Creazione del contesto
        $context  = stream_context_create($options);
        //Esecuzione della richiesta
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {
            //Lasciamo che il chiamante gestisca l'errore, quindi passiamo false
            return false;
        }
        
        //Passiamo il risultato al chiamante
        return $result;
    }

    //Funzione template per la creazione degli oggetti di pagamento
    public function InsertPayment($datetime, $transaction_type, $amount, $reciver, $token, $connectionURL)
    {
        //Dati da inviare
        $data = json_encode(array(
            "datetime" => $datetime,
            "transaction_type" => $transaction_type,
            "amount" => $amount,
            "reciver" => $reciver,
            "token" => $token
        ));

        //Invio della richiesta
        $result = InsertPayment::POSTRequest($data, $connectionURL);

        //Passiamo il risultato al chiamante
        return $result;
    }

}

?>