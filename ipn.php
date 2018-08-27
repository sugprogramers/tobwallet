<?php

require('includes/configuration/prepend.inc.php');
require('PaypalIPN.php');

use PaypalIPN;

if (isset($_GET["iduser"])) {
    $iduser = $_GET["iduser"];
} else {
    $iduser = '';
}
if (isset($_GET["plan"])) {
    $plan = $_GET["plan"];
} else {
    $plan = 0;
}

$ipn = new PaypalIPN();
//$ipn->useSandbox();
$verified = $ipn->verifyIPN();
if ($verified) {
    
    try {
        file_put_contents(__DOCROOT__ . __SUBDIRECTORY__ . "/logs/paypal.log", date("d/M/Y:h:m:s", strtotime("now")) . " -> Verificado ($iduser , $plan) : " . $ipn->data_post . PHP_EOL, FILE_APPEND);
    } catch (Exception $e) {}
    

    if ($iduser != '' && $plan != 0) {
        $user = User::LoadByEmail($iduser);
        if ($user) {
            try {
            $user->MiningOption = $plan;
            $user->StatusUser = 4;
            $user->Save();           
            file_put_contents(__DOCROOT__ . __SUBDIRECTORY__ . "/logs/paypal.log", date("d/M/Y:h:m:s", strtotime("now")) . " -> Update Database ($iduser , $plan) : IDUSER = " . $user->IdUser . PHP_EOL, FILE_APPEND);
            } catch (Exception $e) {
                
            }
        }
    }
    
   
    
} else {


    try {
        file_put_contents(__DOCROOT__ . __SUBDIRECTORY__ . "/logs/paypal.log", date("d/M/Y:h:m:s", strtotime("now")) . " -> No Verificado ($iduser , $plan) : " . $ipn->data_post . PHP_EOL, FILE_APPEND);
    } catch (Exception $e) {
        
    }
}


header("HTTP/1.1 200 OK");
return;
?>