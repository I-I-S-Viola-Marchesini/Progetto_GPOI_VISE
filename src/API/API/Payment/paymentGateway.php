<?php

namespace PaymentGateway;

use DateTime;

class ViseGateway{

    public $amount;
    public $transactionCode = null;
    public $sender;
    public $receiver;
    public $serverUrl;

    function sendHttpRequest($url, $method, $body = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        if ($body !== null) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_message = curl_error($curl);
        }
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return ["response" => $response, "code" => $httpcode];
    }

    
    public function __construct($amount, $sender, $receiver, $serverUrl){
        $this->amount = $amount;
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->serverUrl = $serverUrl;
    }


    public function useTransactionCode($transactionCode){
        $this->transactionCode = $transactionCode;
    }

    public function createTransactionCode(){
        return "VISE-" . date('YmdHis');
    }

    function getUserBalance(){
        $getUserBalanceUrl = $this->serverUrl . "/src/API/API/user_account/getBalance.php?username=" . $this->sender;
        $getUserBalanceResponse = $this->sendHttpRequest($getUserBalanceUrl, 'GET')['response'];
        $userBalanceJson = json_decode($getUserBalanceResponse);
        if (isset($userBalanceJson->balance)) {
            return $userBalanceJson->balance;
        } else {
            return false;
        }
    }

    public function updateBalance($amount)
    {
        $updateBalanceUrl = $this->serverUrl . "/src/API/API/Payment/removeBalance.php";
        $updateBalanceData = [
            "sender_user_id" => $this->sender,
            "amount" => $amount
        ];
        $updateBalanceResponse = $this->sendHttpRequest($updateBalanceUrl, 'POST', json_encode($updateBalanceData))['response'];
        $updateBalanceJson = json_decode($updateBalanceResponse);
        if (isset($updateBalanceJson->response) && $updateBalanceJson->response == "Balance updated") {
            return true;
        } else {
            return false;
        }
    }

    public function addTransaction(){

            if($this->transactionCode == null){ // if transaction code is not set
                return json_encode(["errorCode" => "0001"]);
            }

            if($this->amount <= 0 && $this->amount > 999999){ // if amount is not valid
                return json_encode(["errorCode" => "0002"]);
            }

            if($this->sender == $this->receiver){ // if sender and receiver are the same
                return json_encode(["errorCode" => "0003"]);
            }
            
            $data = [
                "sender_user_id" => $this->sender,
                "sender_card_id" => "1",
                "receiver_user_id" => $this->receiver,
                "payment_date" => date('Y-m-d H:i:s'),
                "amount" => $this->amount
            ];
    
            $raw_addPaymentResponse = sendHttpRequest($this->serverUrl . "API/API/Payment/addPayment.php", "POST", $data)['response'];
            $addPaymentResponse = json_decode($raw_addPaymentResponse);
    
            if (isset($addPaymentResponse->response) && $addPaymentResponse->response == "Payment added") {
                return true;
            } else {
                return false;
            }
    
    }

}



class NexiGateway{

    public $codTrans;
    public $importo; /* <-- 5000 = 50,00 EURO (prime due cifre a destra per i centesimi) */
    public $chiaveSegreta = "5EM2C9J6UBZP65YC4SGD3J10AOVT624N";
    public $divisa = "EUR"; /* <-- EUR oppure 978 */
    public $numContratto = "NC_TEST_20230513094208";
    public $mac;
    public $requestUrl = "https://int-ecommerce.nexi.it/ecomm/ecomm/DispatcherServlet";

    public $requestParams = array();


    public function __construct($codTrans, $importo, $numContratto){

        $merchantServerUrl = "http://" . $_SERVER['HTTP_HOST'] . "/nexi_checkout/ricorrente/";
        $mac = sha1('codTrans=' . $codTrans . 'divisa=' . 'EUR' . 'importo=' . $importo . $this->chiaveSegreta);

        $this->requestParams = array(
            'codTrans' => $codTrans,
            'importo' => $importo,
            'num_contratto' => "NC_TEST_20230513094208",
            'mac' => $mac,
            'url' => $merchantServerUrl . 'esito.php', //necessita HTTP:// oppure HTTPS://
            'url_back' => $merchantServerUrl . 'back.php', //necessita HTTP:// oppure HTTPS://
            'alias' => "ALIAS_WEB_00069162",
            'divisa' => 'EUR',
            'urlpost' => "<URL NOTIFICA POST ESITO TRANSAZIONE>", //necessita HTTP:// oppure HTTPS://
            'tipo_servizio' => 'paga_oc3d',
            'tipo_richiesta' => 'PR', /* <-- PR = Pagamento Ricorrente */
        );

    }

    public function GetParams(){
        return $this->requestParams;
    }

}

class GPayGateway{

}

class Gateway extends ViseGateway{

    public $NexiGateway;

    public function NexiPay($codTrans, $importo, $numContratto)
    {
        $this->NexiGateway = new NexiGateway($codTrans, $importo, $numContratto);
        return $this->NexiGateway->GetParams();
    }

    public function NexiGetRequestUrl(){
        return $this->NexiGateway->requestUrl;
    }
}

?>