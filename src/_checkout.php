<?php
?>

<title>
    Paga Vise | Checkout
</title>

<main class="d-flex align-items-end mt-5">
    <div class="container text-center shadow-lg bg-transparent">
        <div class="row" style="min-height: 80vh;">
            <div class="col-12 col-lg-6 bg-secondary-subtle d-flex justify-content-center align-items-center" style="border-top-left-radious: ">
                <div class="card" style="width: 25rem; margin-top: 100px;">
                    <div class="card-body" style="padding-top: 70px;">
                        <div class="logo_container">
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
            <div class="col-12 col-lg-6 p-4">
                <div class="row mb-3">
                    <h2 class="text-center">Scegli il metodo di pagamento</h2>
                </div>
                <div class="row h-50">
                    <div class="col-1">
                        <span id="cards_radio_input">
                            <input class="form-check-input mb-2" style="height: 25px; width: 25px;" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <input class="form-check-input mb-2" style="height: 25px; width: 25px;" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        </span>
                    </div>
                    <div class="col-11">
                        <span class="d-flex align-items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 mb-2" style="width: 25px; height: 25px;" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z" />
                            </svg>
                            <label class="name_label mb-2" id="label" class="form-check-label" for="flexRadioDefault1">
                                Postepay Evolution Connect (**** **** **** 1234)
                            </label>
                        </span>
                        <span class="d-flex align-items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 mb-2" style="width: 25px; height: 25px;" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                            </svg>
                            <label class="name_label mb-2" id="label" class="form-check-label" for="flexRadioDefault1">
                                Google Pay
                            </label>
                        </span>
                    </div>
                    <div class="row mt-5">
                        <div class="text-center">
                            <button class="col-8 col-xl-6 btn btn-primary rounded-pill" type="submit">Conferma
                                acquisto</button>
                        </div>
                        <div class="text-center mt-3 ">
                            <a class="text-decoration-none" href="http://amazon.com">Annulla il pagamento e torna su
                                Amazon.com</a>
                        </div>
                    </div>
                </div>
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