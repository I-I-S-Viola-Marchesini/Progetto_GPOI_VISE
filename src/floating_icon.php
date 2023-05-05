<?php
?>

<div></div>

<div class="vise-icon-container bg-white rounded-5 p-1">
    <button class="btn btn-link text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_account_mng">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg>
    </button>
    <button class="btn btn-link text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_notifications">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
        </svg>
    </button>
</div>

<style>
    .vise-icon-container {
        position: fixed;
        top: 15px;
        right: 15px;
    }
</style>

<div class="offcanvas rounded-3 m-3 offcanvas-end bg-transparent border-0" style="max-width: 75vw;" tabindex="-1" id="offcanvas_account_mng">
    <div class="offcanvas-header bg-white rounded-5">
        <h5 class="offcanvas-title">Gestione account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <span style="height: 20px;"></span>
    <div class="offcanvas-body bg-white rounded-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <img src="img/propic-placeholder.jpg" class="rounded-circle" style="width: 120px;" alt="" srcset="">
            </div>
        </div><br>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h2>Mario Rossi</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action rounded-3 d-flex align-items-center">
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
                    <a href="#" class="list-group-item list-group-item-action rounded-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        <span class="ms-2">
                            Esci
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas rounded-3 m-3 offcanvas-end bg-transparent border-0" style="max-width: 75vw;" tabindex="-1" id="offcanvas_notifications">
    <div class="offcanvas-header bg-white rounded-5">
        <h5 class="offcanvas-title">Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <span style="height: 20px;"></span>
    <div class="offcanvas-body bg-white rounded-5">
        <div class="row">
            <div class="col-12">
                <ul class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action rounded-3 d-flex align-items-center">
                        HEY
                        <span class="ms-2">
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>