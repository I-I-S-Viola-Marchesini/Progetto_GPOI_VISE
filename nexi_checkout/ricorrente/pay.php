                                            
<?php

// Pagamento OneClik - Pagamenti successivi - Tramite redirezione - Avvio pagamento

$requestUrl = "https://int-ecommerce.nexi.it/ecomm/ecomm/DispatcherServlet";
$merchantServerUrl = "http://" . $_SERVER['HTTP_HOST'] . "/nexi_checkout/ricorrente/";

//PARAMETRI PER CALCOLO MAC
$codTrans = "TESTPS_" . date('YmdHis');
$importo = $_GET['importo']; /* <-- 5000 = 50,00 EURO (prime due cifre a destra per i centesimi) */
$chiaveSegreta = "5EM2C9J6UBZP65YC4SGD3J10AOVT624N";
$divisa = "EUR"; /* <-- EUR oppure 978 */
$numContratto = "NC_TEST_20230513094208";

//CALCOLO MAC
$mac = sha1('codTrans=' . $codTrans . 'divisa=' . $divisa . 'importo=' . $importo . $chiaveSegreta);

//Param Obbligatori
$requestParams = array(
    'importo' => $importo,
    'alias' => "ALIAS_WEB_00069162",
    'divisa' => $divisa,
    'codTrans' => $codTrans,
    'mac' => $mac,
    'url' => $merchantServerUrl . 'esito.php', //necessita HTTP:// oppure HTTPS://
    'url_back' => $merchantServerUrl . 'back.php', //necessita HTTP:// oppure HTTPS://
    'urlpost' => "<URL NOTIFICA POST ESITO TRANSAZIONE>", //necessita HTTP:// oppure HTTPS://
    'num_contratto' => $numContratto,
    'tipo_servizio' => 'paga_oc3d',
    'tipo_richiesta' => 'PR', /* <-- PR = Pagamento Ricorrente */
);

?>

<html>
    <head></head>
    <body>
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
                    
                