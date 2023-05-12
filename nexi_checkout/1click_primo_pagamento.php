<?php

// Pagamento OneClik - Primo pagamento - Avvio pagamento

// Alias e chiave segreta 
$ALIAS = 'ALIAS_WEB_00069162'; // Sostituire con il valore fornito da Nexi
$CHIAVESEGRETA = '5EM2C9J6UBZP65YC4SGD3J10AOVT624N'; // Sostituire con il valore fornito da Nexi

$requestUrl = "https://int-ecommerce.nexi.it/ecomm/ecomm/DispatcherServlet";
$merchantServerUrl = "http://" . $_SERVER['HTTP_HOST'] . "/xpay/php/pagamento_semplice/one_click/";

$codTrans = "VISE-" . date('YmdHis');
$divisa = "EUR";
$importo = $_GET['importo'];

// Calcolo MAC
$mac = sha1('codTrans=' . $codTrans . 'divisa=' . $divisa . 'importo=' . $importo . $CHIAVESEGRETA);

$numContratto = "NC_TEST_" . date('YmdHis');
$tipoRichiesta = 'PP';

// Parametri obbligatori
$obbligatori = array(
    'alias' => $ALIAS,
    'importo' => $importo,
    'divisa' => $divisa,
    'codTrans' => $codTrans,
    'url' => $merchantServerUrl . "esito.php",
    'url_back' => $merchantServerUrl . "annullo.php",
    'mac' => $mac,
    'num_contratto' => $numContratto,
    'tipo_servizio' => 'paga_oc3d',
    'tipo_richiesta' => $tipoRichiesta,
    );

// Parametri facoltativi
$facoltativi = array(
);

$requestParams = array_merge($obbligatori, $facoltativi);

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
        <script>
            document.forms[0].submit();
        </script>
    </body>
</html>