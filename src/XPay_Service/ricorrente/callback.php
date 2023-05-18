<?php

include '../../API/API/Payment/paymentGateway.php';

$_apiURI = $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER["PHP_SELF"];
$_apiURI = explode("/", $_apiURI)[0];

use PaymentGateway\Gateway;

//callback.php?xpay__lb__token=&mail=&data=20230518&messaggio=Message+OK&cognome=&nazionalita=ITA&regione=&mac=6c3ec0074de40f926bb8ac289e237e48a610a7cf&merchantnumber=00069162&codAut=5BJSKQ&tipoProdotto=VISA+CLASSIC+-+CREDIT+-+N&selectedcard=&alias=ALIAS_WEB_00069162&pan=453997******0006&brand=VISA&tipo_servizio=paga_oc3d&orario=211433&divisa=EUR&scadenza_pan=203012&importo=29000&codiceEsito=0&languageId=ENG&nome=&check=PGP&tipoTransazione=VBV_FULL&codiceConvenzione=00069162104&codTrans=VISE-20230518211418&tipo_richiesta=PR&esito=OK&aliasEffettivo=&TCONTAB=&OPTION_CF=&num_contratto=NC_TEST_20230513094208

if(!isset($_GET['codTrans']) || !isset($_GET['esito']) || !isset($_GET['importo'])){
    header("Location: result.php?result=-1&transactionCode=" . $_GET['codTrans'] . "&from=nexi");
}

if($_GET['esito'] == "OK"){

    //scala soldi da account
    

    //redirect to result
    header("Location: result.php?result=0&transactionCode=" . $_GET['codTrans'] . "&from=nexi");
}



?>