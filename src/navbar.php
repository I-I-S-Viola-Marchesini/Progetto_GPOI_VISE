<?php
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
}
?>

<!-- <div class="vise-navbar-background">
    <span class="vise-navbar-decoration">

    </span>
</div> -->

<div class="vise-navbar-stuck w-100 bg-white shadow-lg rounded-bottom-5">

</div>

<div class="vise-navbar d-flex justify-content-around align-items-center">
    <div class="w-100 p-4">
        <div class="bg-white shadow-sm rounded-5 d-flex justify-content-center align-items-center">
            <button class="btn btn-link text-dark d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvas_navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
        </div>
        <div class="bg-white shadow-sm rounded-5 container-nav-1">
            <div class="d-none d-lg-block">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=chisiamo">Chi siamo</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Servizi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="?page=contatti">Contatti</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Assistenza</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <!-- <img src="img/VISE.svg" class="img-fluid" style="height: 65px;" alt="Logo per vise"> -->
    <canvas class="logo-vise"></canvas>
    <div class="w-100 p-4 d-flex">
        <div class="bg-white shadow-sm rounded-5 w-100 d-none d-lg-inline container-nav-2" style="margin-right: 1rem;">

        </div>
        <div
            class="w-100 bg-white shadow-sm rounded-5 d-flex justify-content-center align-items-center d-inline d-lg-none">
            <button class="btn btn-link text-dark" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvas_account_mng">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </button>
        </div>
        <div class="bg-white shadow-sm rounded-5 d-none d-lg-flex container-nav-3">
            <?php
            if (isset($user)) {
                echo '<button class="btn btn-link text-dark tooltip-trg tooltip-show-start" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_notifications" data-bs-placement="bottom" data-bs-title="5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                    </svg>
                </button>';
            }
            ?>
            <button class="btn btn-link text-dark" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvas_account_mng">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </button>
        </div>
    </div>
</div>

<style>
    /* .vise-navbar-background {
        position: fixed;
        top: 25px;
        width: 100vw;
        min-height: 46px;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    .vise-navbar-decoration {
        width: 100%;
        height: 5px;
        background-color: #FFF;
    } */

    .logo-vise {
        height: 65px;
        background-image: url('img/VISE.svg');
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
        cursor: pointer;
    }

    .vise-navbar {
        position: sticky;
        top: 25px;
        max-height: 46px;
        z-index: 55;
    }

    .vise-navbar-stuck {
        position: fixed;
        top: 0;
        height: 90px;
        opacity: 0;
        z-index: 50;
        transition: 250ms;
    }

    .vise-navbar-stuck.pinned {
        opacity: 1 !important;
    }
</style>

<div class="offcanvas rounded-3 m-3 offcanvas-end bg-transparent border-0" style="max-width: 75vw;" tabindex="-1"
    id="offcanvas_account_mng">
    <div class="offcanvas-header bg-white rounded-5">
        <?php
        if (isset($user)) {
            echo '<h5 class="offcanvas-title">Gestione account</h5>';
        } else {
            echo '<h5 class="offcanvas-title">Accedi a Vise</h5>';
        }
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <span style="height: 20px;"></span>
    <div class="offcanvas-body bg-white rounded-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <?php
                if (isset($user)) {
                    echo '<img src="img/propic-placeholder.jpg" class="rounded-circle" style="width: 120px;" alt="" srcset="">';
                } else {
                    echo '<canvas class="logo-vise"></canvas>';
                }
                ?>

            </div>
        </div><br>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <?php
                if (isset($user)) {
                    echo '<h2>Mario Rossi</h2>';
                } else {
                    echo '<h3>Non hai effettuato l\'accesso</h3>';
                }
                ?>

            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="list-group list-group-flush">
                    <?php
                    if (isset($user)) {
                        echo '<a href="#" class="list-group-item list-group-item-action rounded-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                        </svg>
                        <span class="ms-2">
                            Anagrafica
                    </a>
                    <a href="#" class="list-group-item list-group-item-action rounded-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                        </svg>
                        <span class="ms-2">
                            Password e Sicurezza
                    </a>
                    <a href="?page=logout" class="list-group-item list-group-item-action rounded-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        <span class="ms-2">
                            Esci
                    </a>';
                    } else {
                        echo '<a href="?page=login"
                        class="list-group-item list-group-item-action rounded-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                            <path fill-rule="evenodd"
                                d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                        <span class="ms-2">
                            Accedi
                    </a>
                    <a href="?page=signup"
                        class="list-group-item list-group-item-action rounded-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path
                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                        <span class="ms-2">
                            Registrati
                    </a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas rounded-3 m-3 offcanvas-end bg-transparent border-0" style="max-width: 90vw;" tabindex="-1"
    id="offcanvas_notifications">
    <div class="offcanvas-header bg-white rounded-5">
        <h5 class="offcanvas-title">Notifiche</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <span style="height: 20px;"></span>
    <div class="offcanvas-body bg-white rounded-5">
        <div class="row">
            <div class="col-12">
                <p class="text-center">
                    Da leggere:
                </p>
                <div class="list-group list-group-flush">

                    <a href="#" class="list-group-item list-group-item-action rounded-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Pagamento richiesto</h5>
                            <small>4 ore fa</small>
                        </div>
                        <p class="mb-1 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                            <span class="ms-2"></span>
                            Massimo Gallo
                        </p>
                        <div class="p-1 d-flex justify-content-between align-items-center">
                            <div>
                                <button type="button" class="btn btn-dark btn-sm">Rifiuta</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">Accetta</button>
                            </div>
                            <span class="badge text-bg-warning">-29,99€</span>
                        </div>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action rounded-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Pagamento effettuato</h5>
                            <small>1 giorno fa</small>
                        </div>
                        <p class="mb-1 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-shop-window" viewBox="0 0 16 16">
                                <path
                                    d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                            <span class="ms-2"></span>
                            Pizzeria da Nino S.n.c.
                        </p>
                        <p class="mb-1 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-basket-fill" viewBox="0 0 16 16">
                                <path
                                    d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z" />
                            </svg>
                            <span class="ms-2"></span>
                            Pagato con "Postepay Evolution Connect"
                        </p>
                        <div class="p-1 d-flex justify-content-end align-items-center">
                            <span class="badge text-bg-danger">-47,29€</span>
                        </div>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action rounded-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Richiesta accettata</h5>
                            <small>1 giorno fa</small>
                        </div>
                        <p class="mb-1 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                            <span class="ms-2"></span>
                            Giacomo Silvestri
                        </p>
                        <p class="mb-1 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wallet-fill" viewBox="0 0 16 16">
                                <path
                                    d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path
                                    d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z" />
                            </svg>
                            <span class="ms-2"></span>
                            Pagato con "Mastercard Debit"
                        </p>
                        <div class="p-1 d-flex justify-content-end align-items-center">
                            <span class="badge text-bg-danger">-13,50€</span>
                        </div>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action rounded-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Richieta rifiutata</h5>
                            <small>1 giorno fa</small>
                        </div>
                        <p class="mb-1 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                            <span class="ms-2"></span>
                            Franca Bianchi
                        </p>
                        <p class="mb-1 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wallet-fill" viewBox="0 0 16 16">
                                <path
                                    d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path
                                    d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z" />
                            </svg>
                            <span class="ms-2"></span>
                            Hai rifiutato questo pagamento
                        </p>
                        <div class="p-1 d-flex justify-content-end align-items-center">
                            <span class="badge text-bg-secondary">-13,50€</span>
                        </div>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action rounded-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Pagamento ricevuto</h5>
                            <small>3 giorni fa</small>
                        </div>
                        <p class="mb-1 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                            <span class="ms-2"></span>
                            Antonio Verdi
                        </p>
                        <p class="mb-1 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wallet-fill" viewBox="0 0 16 16">
                                <path
                                    d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path
                                    d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z" />
                            </svg>
                            <span class="ms-2"></span>
                            I fondi sono stati aggiunti al tuo conto vise
                        </p>
                        <div class="p-1 d-flex justify-content-end align-items-center">
                            <span class="badge text-bg-success">+13,50€</span>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas rounded-3 m-3 offcanvas-top bg-transparent border-0" style="min-height: 400px;" tabindex="-1"
    id="offcanvas_navigation">
    <div class="offcanvas-header bg-white rounded-5 justify-content-start">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <h5 class="offcanvas-title text-start" style="margin-left: 1rem;">Vise</h5>
    </div>
    <span style="height: 20px;"></span>
    <div class="offcanvas-body bg-white rounded-5">
        <div class="row">
            <div class="col-12">
                <div class="list-group list-group-flush">
                    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_notifications"
                        class="list-group-item list-group-item-action rounded-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                        </svg>
                        <span class="ms-2">
                            Notifiche
                    </a>
                    <a href="#" class="list-group-item list-group-item-action rounded-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-dot" viewBox="0 0 16 16">
                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                        </svg>
                        <span class="ms-2">
                            Link 1
                    </a>
                    <a href="#" class="list-group-item list-group-item-action rounded-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-dot" viewBox="0 0 16 16">
                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                        </svg>
                        <span class="ms-2">
                            Link 2
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('scroll', function () {
        if (window.scrollY > 25) {
            document.querySelector('.vise-navbar-stuck').classList.add('pinned');
            document.querySelector('.container-nav-1').classList.remove('shadow-sm');
            document.querySelector('.container-nav-2').classList.remove('shadow-sm');
            document.querySelector('.container-nav-3').classList.remove('shadow-sm');
        } else {
            document.querySelector('.vise-navbar-stuck').classList.remove('pinned');
            document.querySelector('.container-nav-1').classList.add('shadow-sm');
            document.querySelector('.container-nav-2').classList.add('shadow-sm');
            document.querySelector('.container-nav-3').classList.add('shadow-sm');
        }
    });

    document.querySelector('.logo-vise').addEventListener('click', function () {
        window.location.href = '?page=landing';
    });
</script>