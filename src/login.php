<?php

?>
    <main class="d-flex align-items-center min-vh-100">
    <div class="container text-center shadow-lg rounded-3 py-5">
        <div class="row g-2">

            <div class="col-12 "><img src="img/VISE.svg" class="img-fluid" width="150" height="150" alt="" srcset="">
            </div>
            <h1 class="display-3">Semplice... è Vise!</h1>
            <small class="text-body-primary">Bentornato, inserisci le tue credenziali per accedere alla piattaforma</small>
        </div>

        <div class="row justify-content-center">
            <form class="col-10 col-md-6 col-lg-4 mt-4" action="">

                <div class="mb-4" id="username-container">
                    <label for="username" class="form-label ms-1">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Inserisci il tuo username o email">
                </div>

                <div class="mb-4" id="username-container">
                    <label for="username" class="form-label ms-1">Password</label>
                    <input type="password" class="form-control" id="username" placeholder="Inserisci la password">
                </div>

                <small class="row mb-2"><a href="">Hai dimenticato la password?</a></small>
                <small class="row mb-4"><a href="">Non hai un account?</a></small>

                <a href="?p=1" type="submit" id="send-button" class="btn btn-primary col-6 mb-3">
                    Accedi
                </a>
            </form>
        </div>
    </div>
</main>