<?php
function getAlertTypes(){
    return array(
        "success" => "alert-success",
        "info" => "alert-info",
        "warning" => "alert-warning",
        "danger" => "alert-danger"
        );
}

function getUserTypes(){
    return array(
        "C" => "Customer",
        "O" => "Owner"
        );
}

function getStatusUsers(){
    return array(
        1 => "Register",
        2 => "Approved",
        3 => "Rejected",
        4 => "Mining"
        );
}

function getStatusRestaurants(){
    return array(
        1 => "Register",
        2 => "Approved",
        3 => "Rejected",
        4 => "Mining"
        );
}

function getOfferStatus(){
    return array(
        1 => "Register",
        2 => "Available",
        3 => "Finalized",
        4 => "Suspended"
    );
}

?>


