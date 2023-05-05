<?php

?>
<title>Paga Vise | Checkout</title>
<main class="d-flex align-items-center mt-5">
    <div class="container text-center shadow-lg bg-white rounded-3 py-5">
        <div class="row g-2">
            <h1 class="display-3">Semplice... è Vise!</h1>
            <small class="text-body-primary">Bentornato, inserisci le tue credenziali per accedere alla
                piattaforma</small>
        </div>

        <div class="row justify-content-center">
            <div class="col-10 col-md-6 col-lg-4 mt-4">

                <div class="mb-4" id="username-container">
                    <label for="username" class="form-label ms-1">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Inserisci il tuo username o email">
                </div>

                <div class="mb-4" id="username-container">
                    <label for="username" class="form-label ms-1">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Inserisci la password">
                </div>

                <small class="row mb-2"><a href="">Hai dimenticato la password?</a></small>
                <small class="row mb-4"><a href="">Non hai un account?</a></small>

                <button id="send-button" class="btn btn-primary col-6 mb-3">
                    Accedi
                </button>
            </div>
        </div>

        <script>

            document.addEventListener("DOMContentLoaded", () => {
                if (document.cookie.includes("username") && document.cookie.includes("account_id")) {
                    location.href = "?p=1";
                }
            });

            const sendButton = document.getElementById("send-button");
            const username = document.getElementById("username");
            const password = document.getElementById("password");

            sendButton.addEventListener("click", () => {
                if (username.value == "" || password.value == "") {
                    alert("Inserisci le credenziali");
                    return;
                }

                const data = {
                    username: username.value,
                    password: password.value
                }

                let loginRequest = new XMLHttpRequest();
                loginRequest.open("POST", 'API/Vise/API/user/login.php', true);
                loginRequest.setRequestHeader('Content-type', 'application/json');
                loginRequest.onreadystatechange = function() {
                    if (loginRequest.readyState == 4 && loginRequest.status == 200) {
                        document.cookie = "username=" + username.value + "; path=/";
                        document.cookie = "account_id=" + JSON.parse(loginRequest.responseText).username + "; path=/";
                        location.href = "?p=1";
                    } else if (loginRequest.readyState == 4) {
                        alert("Login non riuscito, controlla il nome utente o la password.");
                    }
                };
                loginRequest.send(JSON.stringify(data));

            });
        </script>
    </div>
</main>