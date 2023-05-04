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
            <form class="needs-validation" novalidate>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Nome Intestatario</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Mario" value="" required>
                        <div class="invalid-feedback">
                            Inserisci un nome.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Cognome Intestatario</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Rossi" value="" required>
                        <div class="invalid-feedback">
                            Inserisci un cognome.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="cardType" class="form-label">Tipo di Carta</label>
                        <select class="form-select" id="cardType" required>
                            <option value="">Scegli...</option>
                            <option>Visa</option>
                            <option>Mastercard</option>
                            <option>American Express</option>
                            <option>JCB</option>
                            <option>China Union Pay</option>
                        </select>
                        <div class="invalid-feedback">
                            Seleziona un circuito bancario.
                        </div>
                    </div>

                    
                    <div class="col-sm-6">
                        <label for="fiscal-code" class="form-label">Numero della carta</label>
                        <div class="input-group has-validation">
                            <input type="number" class="form-control" id="fiscal-code" placeholder="XXXX-XXXX-XXXX-XXXX" maxlength="16" required>
                            <div class="invalid-feedback">
                                Inserisci il numero della carta.
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="expireDate" class="form-label">Data di Scadenza</label>
                        <input type="month" class="form-control" id="expireDate" placeholder="XX/XX" value="" required>
                        <div class="invalid-feedback">
                            Inserisci un cognome.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="fiscal-code" class="form-label">CVV</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="fiscal-code" placeholder="CVV" required>
                            <div class="invalid-feedback">
                                Inserisci il CVV della carta.
                            </div>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="col-sm-6">
                        <label for="fiscal-code" class="form-label">Indirizzo di Fatturazione</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="fiscal-code" placeholder="Via Roma" required>
                            <div class="invalid-feedback">
                                Inserisci una via.
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="fiscal-code" class="form-label">Inserisci un CAP</label>
                        <div class="input-group has-validation">
                            <input type="number" class="form-control" id="fiscal-code" placeholder="00100" required min="1">
                            <div class="invalid-feedback">
                                Inserisci un cap.
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="fiscal-code" class="form-label">Città</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="fiscal-code" placeholder="Roma" required>
                            <div class="invalid-feedback">
                                Inserisci una città.
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="fiscal-code" class="form-label">Stato</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="fiscal-code" placeholder="Italia" required>
                            <div class="invalid-feedback">
                                Inserisci uno stato.
                            </div>
                        </div>
                    </div>

                    <hr class="my-5">

                <div class="col-sm-6">
                    <button class="w-100 btn btn-danger btn-lg" type="submit">Annulla e Torna Indietro</button>  
                </div>
                <div class="col-sm-6">   
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Conferma e Torna al Pagamento</button>
                </div>
            </form>
        </div>
    </div>
</main>

<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>