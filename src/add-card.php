<?php

?>


<main class="container shadow-lg rounded-3 p-3 mt-2">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="img/vise.svg" alt="" width="120" height="120">
        <h2>Aggiungi una carta di credito</h2>
        <p class="lead">Inserisci i dati della tua carta per includerla nel tuo account Vise.</p>
    </div>

    <div class="row g-5">

        <div class="col">
            <h4 class="mb-3">Dati personali</h4>
            <form class="needs-validation" novalidate>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Mario" value="" required>
                        <div class="invalid-feedback">
                            Inserisci un nome 
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Cognome</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Rossi" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="fiscal-code" class="form-label">Codice Fiscale</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="fiscal-code" placeholder="LVZNDR04S09H620S" required>
                            <div class="invalid-feedback">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="username" class="form-label">Nome utente</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="username" placeholder="mariorossi07" required>
                            <div class="invalid-feedback">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email <span class="text-body-secondary"></span></label>
                        <input type="email" class="form-control" id="email" placeholder="mariorossi@gmail.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    

                    <!-- <div class="col-12">
                        <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div> -->

                    <div class="col-md-5">
                        <label for="country" class="form-label">Stato</label>
                        <select class="form-select" id="country" required>
                            <option value="">Scegli...</option>
                            <option>Italia</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="state" class="form-label">Città</label>
                        <select class="form-select" id="state" required>
                            <option value="">Scegli...</option>
                            <option>Rovigo</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="zip" class="form-label">CAP</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Indirizzo</label>
                        <input type="text" class="form-control" id="address" placeholder="123 Via Roma" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Conferma e torna al pagamento</button>
            </form>
        </div>
    </div>
</main>