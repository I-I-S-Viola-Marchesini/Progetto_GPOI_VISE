<?php

?>

<main class="d-flex align-items-center">
    <div class="container shadow-lg rounded-3 p-3 mt-2">
        <div class="row bg-light py-2 px-1 align-items-center">
            <div class="col-4">
                <img src="img/propic-placeholder.jpg" class="rounded-5 thumbnail" style="width: 50px;" alt="" srcset="">
            </div>
            <div class="col-4 text-center">
                <img src="img/vise.svg" style="width: 50px;" alt="" srcset="">
            </div>
            <div class="col-4 text-end">
                <span class="badge rounded-pill text-bg-primary fs-6">69,420 EUR</span>

            </div>
        </div>

        <div class="row">
            <div class="col mt-3 mx-3">
                <strong>Paga con </strong>
                <form action="" class="my-3">
                    <div class="row">

                        <div id="cards">
                            <div id="example-card" class="form-check mb-3" style="display: none;">
                                <img src="img/credit-card-solid.svg" class="mx-2 " style="width:25px;" alt="" srcset="">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="name_label" id="label" class="form-check-label" for="flexRadioDefault1">
                                    Intesa San Paolo Debit
                                </label>
                            </div>
                        </div>

                        <button class="col-6 col-md-4 col-lg-3 col-xl-3 btn btn-outline-dark mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            Aggiungi carta
                        </button>
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

                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var id = getCookie("account_id");
            $.ajax({
                url: "http://localhost/Progetto_GPOI_VISE/API/Vise/API/card/getArchiveCardsByUserID.php",
                type: "GET",
                data: {
                    userid: id,
                },
                success: function (result) {
                    var json = JSON.parse(result);
                    json.forEach(element => {
                        showCard(element);
                    });
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert(errorThrown);
                },
            });
        });

        function showCard(element){
            var cards = $("#cards");
            var card = $("#example-card").clone();
            card.children('.name_label').html(element.card_name);
            card.val(element.id);
            card.show().appendTo(cards);
        }

    </script>
    <script>
        function getCookie(cookieName) {
            var name = cookieName + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i].trim();
                if ((c.indexOf(name)) == 0) {
                    return c.substr(name.length);
                }
            }
            alert("not found");
            return null;
        }
    </script>
</main>