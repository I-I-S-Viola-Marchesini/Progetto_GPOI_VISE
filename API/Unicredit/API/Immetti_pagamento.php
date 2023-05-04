<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include dirname(__FILE__) . '/../Common/connect.php';
include dirname(__FILE__) . '/../Model/pagamento.php';

$database = new Database();
$db = $database->connect();

$data = json_decode(file_get_contents("php://input"));

if (empty($data->datetime) || empty($data->tipo_transazione) || empty($data->importo) || empty($data->destinatario) || empty($data->token)) {
    http_response_code(400);
    echo json_encode(array("message" => "Impossibile effettuare il pagamento. Dati incompleti."));
    die();
}

$pagamento = new Pagamento($db);

$datetime = $data->datetime;
$tipo_transazione = $data->tipo_transazione;
$destinatario = $data->destinatario;
$importo = $data->importo;
$token = $data->token;

$mittente -> get_nome_cognome($token);
$account_number -> get_account_number($token);
if($pagamento->Preleva_importo($importo, $token))

if ($pagamento->Preleva_importo($importo, $token)) {
    http_response_code(200);
    echo json_encode(array("message" => "Effettuato pagamento."));
    if ($trasazione->registra_transazione($datetime, $tipo_transazione, $importo, $mittente, $destinatario, $account_number)) {
        http_response_code(200);
        echo json_encode(array("message" => "Trasazione registrata."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Errore durante il pagamento."));
        die();
    }
} else {
    http_response_code(503);
    echo json_encode(array("message" => "Errore durante il pagamento."));
    die();
}
?>