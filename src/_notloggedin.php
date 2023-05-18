<?php
?>

<title>
    Paga Vise | Riservato
</title>

<main class="d-flex align-items-end mt-5">
    <div class="container text-center shadow-lg rounded-3 py-5 bg-white" style="min-height: 80vh;">
        <div class="row g-2">

            <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
            </svg>

            <h1 class="display-3">Benvenuto!</h1>
            <small class="text-body-primary">Per vedere questo contenuto devi effettuare l'accesso.</small>
            <p class="text-center mt-3">
                <a href="?page=login&returnTo=<?php echo $_GET['page'] ?>" class="btn btn-primary">Accedi</a>
                <a href="?page=signup" class="btn btn-primary">Registrati</a>
            </p>
        </div>
    </div>
</main>