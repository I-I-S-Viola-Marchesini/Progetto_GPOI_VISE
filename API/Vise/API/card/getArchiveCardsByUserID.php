<?php
header("Access-Control-Allow-Origin: *");
require("../../Common/connect.php");
require("../../Model/card.php");
if(!isset($_GET["userid"])){
    http_response_code(400);
    echo json_encode(["message" => "Enter user id"]);
    die();
}

$userID = $_GET["userid"];


$db = new Database_Vise();
$conn = $db->connect();
$card = new Card($conn);
$result = $card->getArchiveCardsByUserID($userID);

if ($result->num_rows > 0)
{
    $card_arr = array();

    while($record = $result->fetch_assoc())
    {
       $card_arr[] = $record;
    }
    http_response_code(200);
    $json = json_encode($card_arr);
    echo($json);


    //return $json;
}
else {
    http_response_code(400);
    echo json_encode(["message" => "No record"]);
}
die();

?>