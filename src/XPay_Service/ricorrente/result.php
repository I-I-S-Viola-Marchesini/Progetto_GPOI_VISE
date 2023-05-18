<?php

if(!isset($_GET['from']) || !isset($_GET['result']) || !isset($_GET['transactionCode'])){
    die();
}

if($_GET['from'] == "nexi"){
    if($_GET['result'] == 0){
        //success
        echo "success";
    }else{
        //error
        echo "error";
    }
}else if($_GET['from'] == "vise"){
    if($_GET['result'] == 0){
        //success
        echo "success";
    }else{
        //error
        echo "error";
    }
}else if($_GET['from'] == "googlepay"){
    if($_GET['result'] == 0){
        //success
        echo "success";
    }else{
        //error
        echo "error";
    }
}else{
    die();
}

?>