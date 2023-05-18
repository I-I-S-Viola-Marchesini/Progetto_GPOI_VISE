<?php
$url = $_apiURI . '\src\API\API\card\GetBasicCardInformation.php?username=' . $_SESSION['username'];
$request = sendHttpRequest($url, 'GET');
$response = $request['response'];
$cardArr = json_decode($response);
?>

<!-- <script src="https://int-ecommerce.nexi.it/ecomm/XPayBuild/js?alias=<?php echo $APIKEY; ?>"></script> -->

<title>
    Paga Vise | Checkout
</title>

<main class="d-flex align-items-end mt-5">
    <div class="container p-0 text-center shadow-lg rounded-3 bg-white">
        <div class="row" style="min-height: 80vh;">
            <div class="col-12 col-lg-6 d-none d-lg-flex justify-content-center align-items-center" style="border-top-left-radius: 0.5rem; border-bottom-left-radius: 0.5rem; background-color: #EEEEEE;">
                <div class="card shadow-lg" style="width: 25rem;">
                    <div class="card-body" style="padding-top: 70px;">
                        <div class="logo_container d-none d-lg-flex">
                            <span class="logo_img border rounded-1 p-5 bg-light shadow-sm"></span>
                        </div>
                        <h3 class="card-title">
                            Pear Store<br>
                            <span class="m-3 badge text-bg-primary">69,99€</span>
                        </h3>
                        <h5 class="card-text">
                            Riepilogo ordine:<br>
                        </h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
                        </p>
                        <small class="text-muted">
                            Fornito da "Pear Store S.p.a."
                            <br>
                            <b>Pagamento sicuro tramite Vise</b>
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-12 rounded-3 col-lg-6 bg-white p-4">
                <div class="row mb-3">
                    <h3 class="text-center">Pagamento tramite Vise</h3>
                    <nav class="d-flex justify-content-center" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><span class="fw-bold" step_id="1">
                                    Dati personali
                                </span></li>
                            <li class="breadcrumb-item active"><span step_id="2">
                                    Metodo di pagamento
                                </span></li>
                            <li class="breadcrumb-item active"><span step_id="3">
                                    Conferma
                                </span></li>
                        </ol>
                    </nav>
                </div>
                <span id="nexi_xpay">
                    <iframe id="xpay_iframe" class="m-0 p-0 rounded-3" style="width: 100%; height: 85%;"></iframe>
                </span> <!-- http://127.0.0.1:99/nexi_checkout/1click_primo_pagamento.php?importo=6999 -->
                <span id="google_pay_waiting">
                    <p>Completa il pagamento su Google Pay</p>
                    <p>Oppure <a href="#" id="google_pay_go_back">cambia metodo di pagamento</a></p>
                </span>
                <span id="verify_data">
                    <div class="row">
                        <h5 class="mb-3">Questo pagamento sarà effettuato a nome di:</h5>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center w-100 p-4 pb-0">
                        <img src="<?php echo $_SESSION['profilePicture'] ?>" class="rounded-circle" style="width: 120px;" alt="" srcset="">
                    </div>
                    <div class="row w-100 mt-0">
                        <h4 class="text-center">
                            <br>
                            <?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] ?>
                        </h4>
                    </div>
                    <div class="row w-100">
                        <p class="text-center">
                            <?php echo $_SESSION['email'] ?>
                            <br>
                            <?php echo $_SESSION['birthDate'] ?>
                        </p>
                    </div>
                    <div class="row mt-5">
                        <div class="text-center">
                            <button id="confirm_data_button" class="col-8 col-xl-6 btn btn-primary rounded-pill">
                                Conferma dati e prosegui
                            </button>
                        </div>
                    </div>
                    <div class="text-center mt-3 ">
                        Non vuoi pagare con questo account? <a class="text-decoration-none" href="#">Cambia account</a>
                    </div>
                </span>
                <span id="choose_method">
                    <div class="row">
                        <div class="col-1">
                            <form id="cards_radio_input" name="paymentMethodForm">
                                <?php
                                if (isset($cardArr)) {
                                    foreach ($cardArr as &$card) {
                                ?>
                                        <input class="form-check-input mb-2" style="height: 25px; width: 25px;" type="radio" name="paymentMethod" value="card" id="<?php echo $card->id ?>">
                                <?php
                                    }
                                }
                                ?>
                                <input class="form-check-input mb-2" style="height: 25px; width: 25px;" type="radio" name="paymentMethod" value="googlePay" id="googlePay">
                            </form>
                        </div>
                        <div class="col-11">
                            <?php
                            if (isset($cardArr)) {

                                foreach ($cardArr as &$card) {
                            ?>
                                    <span class="d-flex align-items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 mb-2" style="width: 25px; height: 25px;" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z" />
                                        </svg>
                                        <label class="name_label mb-2" id="label_<?php echo $card->id ?>" class="form-check-label">
                                            <?php echo $card->card_name . ' (**** **** **** ' . substr($card->pan, -4) . ')' ?>
                                            </small>
                                        </label>
                                    </span>
                            <?php
                                }
                            }
                            ?>

                            <span class="d-flex align-items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 mb-2" style="width: 25px; height: 25px;" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                </svg>
                                <label class="name_label mb-2" id="label" class="form-check-label" for="googlePay">
                                    Google Pay
                                </label>
                            </span>
                        </div>
                        <div class="row mt-5">
                            <div class="form-check d-flex justify-content-center mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="use_vise_credit" checked>
                                <span class="m-1"></span>
                                <label class="form-check-label" for="use_vise_credit">
                                    Usa <span class="fw-bold" id="vise_credit_value">25,40€</span> dal tuo conto Vise
                                </label>
                            </div>
                            <div class="text-center">
                                <button id="none_pay_button" class="col-8 col-xl-6 btn btn-secondary disabled rounded-pill">Seleziona per
                                    continuare</button>
                                <button id="card_pay_button" class="col-8 col-xl-6 btn btn-primary rounded-pill" style="width: 75%;"></button>
                                <span id="card_pay_button_spinner" style="display: none;">
                                    <div class="spinner-border text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </span>
                                <span id="card_pay_button_checkmark" style="display: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                    </svg>
                                </span>
                                <div id="google_pay_button"></div>
                            </div>
                        </div>
                        <div class="text-center mt-3 ">
                            <a class="text-decoration-none" href="http://pear.com">Annulla il pagamento e torna su
                                Pear.com</a>
                        </div>
                    </div>
                </span>
                <!-- <div class="w-50">
                    <div id="cards">
                        <div id="example_card" class="form-check mb-3">
                            <img src="img/credit-card-solid.svg" class="mx-2 " style="width:25px;" alt="" srcset="">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        </div>
                    </div>
                    <div id="permanent_methods">
                        <div id="method_gpay" class="form-check mb-3">
                            <img src="img/credit-card-solid.svg" class="mx-2 " style="width:25px;" alt="" srcset="">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="name_label" id="label" class="form-check-label" for="flexRadioDefault1">
                                Google Pay
                            </label>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</main>

<style>
    #card_pay_button,
    #google_pay_button,
    #nexi_xpay,
    #choose_method,
    #google_pay_waiting {
        display: none;
    }

    .logo_container {
        width: 100%;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;

        position: absolute;
        top: -40px;
        left: 0;
    }

    .logo_img {
        background-image: url('img/icons8-logo-80.png');
        background-size: 80px;
        background-repeat: no-repeat;
        background-position: center;
        width: 80px;
        height: 80px;
    }
</style>


<script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>
<script>
    //Uncheck all radio inputs
    $('input[type="radio"]').prop('checked', false);

    document.querySelector('#cards_radio_input').addEventListener('change', (event) => {
        $('#none_pay_button').hide();
        if (event.target.value === 'card') {
            let cardLabel = document.getElementById('label_' + event.target.id).innerHTML.split('<small class="text-muted">')[0];
            //let cardLabel = $('#label_' + event.originalTarget.id + '"]').html().split('<small class="text-muted">')[0];
            $('#card_pay_button').html('Paga con ' + cardLabel);
            $('#card_pay_button').show();
            $('#google_pay_button').hide();
        } else if (event.target.value === 'googlePay') {
            $('#card_pay_button').hide();
            $('#google_pay_button').show();
        }
    });


    // window.addEventListener('load', function() {
    //     // Inizializzazione SDK
    //     XPay.init();

    //     // Oggetto contenente la configurazione del pagamento
    //     var config = {
    //         baseConfig: {
    //             apiKey: '<?php //echo $APIKEY; 
                            ?>',
    //             enviroment: XPay.Environments.INTEG
    //         },
    //         paymentParams: {
    //             amount: '<?php //echo $importo; 
                            ?>',
    //             transactionId: '<?php //echo $codiceTransazione; 
                                    ?>',
    //             currency: '<?php //echo $divisa; 
                                ?>',
    //             timeStamp: '<?php //echo $timestamp; 
                                ?>',
    //             mac: '<?php //echo $mac; 
                            ?>'
    //         },
    //         customParams: {
    // num_contratto: '<?php //echo $numeroContratto; 
                        ?>'
    //         },
    //         language: XPay.LANGUAGE.ITA
    //     };

    //     // Configurazione lightbox
    //     XPay.initLightbox(config);
    // });

    $('#google_pay_go_back').click(function() {
        $('#google_pay_waiting').hide();
        $('#choose_method').show();
    });

    $('#confirm_data_button').click(function() {
        $('#confirm_data_button').html($('#card_pay_button_spinner').html());
        $('#confirm_data_button').attr('disabled', true);
        setTimeout(function() {
            $('#confirm_data_button').html($('#card_pay_button_checkmark').html());
            $('span[step_id="1"]').removeClass('fw-bold');
            $('span[step_id="2"]').addClass('fw-bold');
            $('#verify_data').hide();
            $('#choose_method').show();
        }, 200);
    });

    document.getElementById('card_pay_button').addEventListener('click', function(e) {
        // Avvio del pagamento
        $('#card_pay_button').html($('#card_pay_button_spinner').html());
        $('#card_pay_button').attr('disabled', true);
        $('#xpay_iframe').attr('src', '<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/src/XPay_Service/ricorrente/start.php?amount=6999&sender=" . $_SESSION['username'] . "&receiver=boldi&card=e"; ?>');
        let loaded = 0;
        $('#xpay_iframe').on('load', function() {
            let iframe_href = undefined;
            try {
                iframe_href = document.getElementById("xpay_iframe").contentWindow.location.href;
                //alert(document.getElementById("xpay_iframe").contentWindow.type);
            } catch (e) {
                iframe_href = undefined
            }

            if (iframe_href == undefined || iframe_href == null) {
                // nothing
            } else if (iframe_href.includes('esito=ANNULLO')) {
                $('span[step_id="3"]').removeClass('fw-bold');
                $('span[step_id="2"]').addClass('fw-bold');
                $('#choose_method').show();
                $('#nexi_xpay').hide();
                loaded = 0;

                $('#card_pay_button').html('Paga con Postepay Evolution Connect');
                $('#card_pay_button').attr('disabled', false);
                return;
            }

            loaded++;
            if (loaded >= -90) {
                $('span[step_id="2"]').removeClass('fw-bold');
                $('span[step_id="3"]').addClass('fw-bold');
                $('#choose_method').hide();
                $('#nexi_xpay').show();
            }
        });
        // XPay.openLightbox();

    });

    window.addEventListener("XPay_Payment_Result", function(event) {
        alert(event.detail.messaggio);
        $('#card_pay_button').html($('#card_pay_button_checkmark').html());
    });

    /**
     * Define the version of the Google Pay API referenced when creating your
     * configuration
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#PaymentDataRequest|apiVersion in PaymentDataRequest}
     */
    const baseRequest = {
        apiVersion: 2,
        apiVersionMinor: 0
    };

    /**
     * Card networks supported by your site and your gateway
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
     * @todo confirm card networks supported by your site and gateway
     */
    const allowedCardNetworks = ["AMEX", "DISCOVER", "INTERAC", "JCB", "MASTERCARD", "VISA"];

    /**
     * Card authentication methods supported by your site and your gateway
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
     * @todo confirm your processor supports Android device tokens for your
     * supported card networks
     */
    const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];

    /**
     * Identify your gateway and your site's gateway merchant identifier
     *
     * The Google Pay API response will return an encrypted payment method capable
     * of being charged by a supported gateway after payer authorization
     *
     * @todo check with your gateway on the parameters to pass
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#gateway|PaymentMethodTokenizationSpecification}
     */
    const tokenizationSpecification = {
        type: 'PAYMENT_GATEWAY',
        parameters: {
            'gateway': 'example',
            'gatewayMerchantId': 'exampleGatewayMerchantId'
        }
    };

    /**
     * Describe your site's support for the CARD payment method and its required
     * fields
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
     */
    const baseCardPaymentMethod = {
        type: 'CARD',
        parameters: {
            allowedAuthMethods: allowedCardAuthMethods,
            allowedCardNetworks: allowedCardNetworks
        }
    };

    /**
     * Describe your site's support for the CARD payment method including optional
     * fields
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
     */
    const cardPaymentMethod = Object.assign({},
        baseCardPaymentMethod, {
            tokenizationSpecification: tokenizationSpecification
        }
    );

    /**
     * An initialized google.payments.api.PaymentsClient object or null if not yet set
     *
     * @see {@link getGooglePaymentsClient}
     */
    let paymentsClient = null;

    /**
     * Configure your site's support for payment methods supported by the Google Pay
     * API.
     *
     * Each member of allowedPaymentMethods should contain only the required fields,
     * allowing reuse of this base request when determining a viewer's ability
     * to pay and later requesting a supported payment method
     *
     * @returns {object} Google Pay API version, payment methods supported by the site
     */
    function getGoogleIsReadyToPayRequest() {
        return Object.assign({},
            baseRequest, {
                allowedPaymentMethods: [baseCardPaymentMethod]
            }
        );
    }

    /**
     * Configure support for the Google Pay API
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#PaymentDataRequest|PaymentDataRequest}
     * @returns {object} PaymentDataRequest fields
     */
    function getGooglePaymentDataRequest() {
        const paymentDataRequest = Object.assign({}, baseRequest);
        paymentDataRequest.allowedPaymentMethods = [cardPaymentMethod];
        paymentDataRequest.transactionInfo = getGoogleTransactionInfo();
        paymentDataRequest.merchantInfo = {
            // @todo a merchant ID is available for a production environment after approval by Google
            // See {@link https://developers.google.com/pay/api/web/guides/test-and-deploy/integration-checklist|Integration checklist}
            // merchantId: '01234567890123456789',
            merchantName: 'Vise Payments S.r.l.'
        };
        return paymentDataRequest;
    }

    /**
     * Return an active PaymentsClient or initialize
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/client#PaymentsClient|PaymentsClient constructor}
     * @returns {google.payments.api.PaymentsClient} Google Pay API client
     */
    function getGooglePaymentsClient() {
        if (paymentsClient === null) {
            paymentsClient = new google.payments.api.PaymentsClient({
                environment: 'TEST'
            });
        }
        return paymentsClient;
    }

    /**
     * Initialize Google PaymentsClient after Google-hosted JavaScript has loaded
     *
     * Display a Google Pay payment button after confirmation of the viewer's
     * ability to pay.
     */
    function onGooglePayLoaded() {
        const paymentsClient = getGooglePaymentsClient();
        paymentsClient.isReadyToPay(getGoogleIsReadyToPayRequest())
            .then(function(response) {
                if (response.result) {
                    addGooglePayButton();
                    // @todo prefetch payment data to improve performance after confirming site functionality
                    // prefetchGooglePaymentData();
                }
            })
            .catch(function(err) {
                // show error in developer console for debugging
                console.error(err);
            });
    }

    /**
     * Add a Google Pay purchase button alongside an existing checkout button
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#ButtonOptions|Button options}
     * @see {@link https://developers.google.com/pay/api/web/guides/brand-guidelines|Google Pay brand guidelines}
     */
    function addGooglePayButton() {
        const paymentsClient = getGooglePaymentsClient();
        const button =
            paymentsClient.createButton({
                buttonColor: 'black',
                buttonType: 'pay',
                buttonLocale: 'it',
                onClick: onGooglePaymentButtonClicked
            });
        document.getElementById('google_pay_button').appendChild(button);
    }

    /**
     * Provide Google Pay API with a payment amount, currency, and amount status
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#TransactionInfo|TransactionInfo}
     * @returns {object} transaction info, suitable for use as transactionInfo property of PaymentDataRequest
     */
    function getGoogleTransactionInfo() {
        return {
            countryCode: 'IT',
            currencyCode: 'EUR',
            totalPriceStatus: 'FINAL',
            // set to cart total
            totalPrice: '69.99'
        };
    }

    /**
     * Prefetch payment data to improve performance
     *
     * @see {@link https://developers.google.com/pay/api/web/reference/client#prefetchPaymentData|prefetchPaymentData()}
     */
    function prefetchGooglePaymentData() {
        const paymentDataRequest = getGooglePaymentDataRequest();
        // transactionInfo must be set but does not affect cache
        paymentDataRequest.transactionInfo = {
            totalPriceStatus: 'NOT_CURRENTLY_KNOWN',
            currencyCode: 'EUR'
        };
        const paymentsClient = getGooglePaymentsClient();
        paymentsClient.prefetchPaymentData(paymentDataRequest);
    }

    /**
     * Show Google Pay payment sheet when Google Pay payment button is clicked
     */
    function onGooglePaymentButtonClicked() {

        $('span[step_id="2"]').removeClass('fw-bold');
        $('span[step_id="3"]').addClass('fw-bold');
        $('#choose_method').hide();
        $('#google_pay_waiting').show();

        const paymentDataRequest = getGooglePaymentDataRequest();
        paymentDataRequest.transactionInfo = getGoogleTransactionInfo();

        const paymentsClient = getGooglePaymentsClient();
        paymentsClient.loadPaymentData(paymentDataRequest)
            .then(function(paymentData) {
                // handle the response
                processPayment(paymentData);
            })
            .catch(function(err) {
                // show error in developer console for debugging
                console.error(err);
            });
    }

    /**
     * Process payment data returned by the Google Pay API
     *
     * @param {object} paymentData response from Google Pay API after user approves payment
     * @see {@link https://developers.google.com/pay/api/web/reference/response-objects#PaymentData|PaymentData object reference}
     */
    function processPayment(paymentData) {
        // show returned data in developer console for debugging
        console.log(paymentData);
        // @todo pass payment token to your gateway to process payment
        paymentToken = paymentData.paymentMethodData.tokenizationData.token;
    }
</script>