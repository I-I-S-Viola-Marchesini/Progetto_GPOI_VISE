<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

include_once __DIR__ . "../../Model/payment.php";
include_once __DIR__ . "../../Common/connect.php";

$database=new Database();



?>