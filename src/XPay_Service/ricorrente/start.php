<?php

include '../../API/API/Payment/paymentGateway.php';

$_apiURI = $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER["PHP_SELF"];
$_apiURI = explode("/", $_apiURI)[0];

use PaymentGateway\Gateway;

//RICEVO IN INPUT: SenderID, CardID, Receiver, Amount
// E PARAMETRI useVise (true/false), useNexi (true/false), useGPay (true/false)

if(empty($_GET['sender']) || empty($_GET['receiver']) || empty($_GET['amount']) || empty($_GET['card'])){
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$card = $_GET['card'];
$sender = $_GET['sender'];
$receiver = $_GET['receiver'];
$amount = $_GET['amount'];

$Gateway = new Gateway($amount, $sender, $receiver, $_apiURI);

$transactionCode = $Gateway->createTransactionCode();
$Gateway->useTransactionCode($transactionCode);

$requestParams = $Gateway->NexiPay($transactionCode, $amount, 'empty');

$requestUrl = $Gateway->NexiGetRequestUrl();

$startNexiPayment = true;

//http://127.0.0.1:82/src/XPay_Service/ricorrente/start.php?amount=29000&sender=alex&card=e&receiver=boldi
//http://127.0.0.1:82/src/XPay_Service/ricorrente/callback.php?xpay__lb__token=&mail=&data=20230518&messaggio=Message+OK&cognome=&nazionalita=ITA&regione=&mac=6c3ec0074de40f926bb8ac289e237e48a610a7cf&merchantnumber=00069162&codAut=5BJSKQ&tipoProdotto=VISA+CLASSIC+-+CREDIT+-+N&selectedcard=&alias=ALIAS_WEB_00069162&pan=453997******0006&brand=VISA&tipo_servizio=paga_oc3d&orario=211433&divisa=EUR&scadenza_pan=203012&importo=29000&codiceEsito=0&languageId=ENG&nome=&check=PGP&tipoTransazione=VBV_FULL&codiceConvenzione=00069162104&codTrans=VISE-20230518211418&tipo_richiesta=PR&esito=OK&aliasEffettivo=&TCONTAB=&OPTION_CF=&num_contratto=NC_TEST_20230513094208
?> 

<html>

<head></head>

<body style="opacity: 0.0;">
    <form method='POST' action='<?php echo $requestUrl ?>'>
        <?php foreach ($requestParams as $name => $value) { ?>
            <input type='hidden' name='<?php echo $name; ?>' value='<?php echo htmlentities($value); ?>' />
        <?php } ?>

        <input type='submit' value='VAI ALLA PAGINA DI CASSA' />
    </form>
    <?php if($startNexiPayment): ?>
        <script>
            document.forms[0].submit();
        </script>
    <?php endif; ?>
</body>

</html>