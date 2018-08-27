<?php

require('qcubed.inc.php');
require('general.php');
//session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
//http://localhost/kcoin/webservice.php?func=validateMac&mac=1
//http://localhost/kcoin/webservice.php?func=setMac&mac=fsafsa&token=51bfcb9a9daa6cbf5cbc81aade5f8ab8

$func = null;
if (isset($_GET["func"]))
    $func = $_GET["func"];

$mac = null;
if (isset($_GET["mac"]))
    $mac = $_GET["mac"];

$token = null;
if (isset($_GET["token"]))
    $token = $_GET["token"];

$conec = unserialize(DB_CONNECTION_1);
$dbserver = $conec['server'];
$dbuser = $conec['username'];
$dbpass = $conec['password'];
$db = $conec['database'];

//$validate = generalValidate();
//if ($validate == false) {
    $conexion = @mysql_connect($dbserver, $dbuser, $dbpass);
    $database = @mysql_select_db($db, $conexion);

    if (!$conexion || !$database) {
        $json = array("status" => "0", "msg" => "Database connection error", "data" => array());
    } else {

        try {
            $json = array("status" => "0", "msg" => "Function does not exist or invalid parameters", "data" => array());

            if ($func == 'validateMac' && $mac != null) {
                $json = validateMac($conexion, $mac);
            }
            if ($func == 'setMac' && $mac != null && $token != null) {
                $json = setMac($conexion, $mac, $token);
            }
        } catch (Exception $e) {
            $json = array("status" => "0", "msg" => "Error exception, " . $e->getMessage(), "data" => array());
        }
    }
//} else {   $json = $validate; }



header("Content-Type: application/json; charset=UTF-8");
echo json_encode($json, JSON_PRETTY_PRINT);
@mysql_close($conexion);

function generalValidate() {
    date_default_timezone_set('America/Lima');
    if (isset($_SESSION['failed_login']) && $_SESSION['failed_login'] >= 3) {

        if (isset($_SESSION['locking_time'])) {
            if (strtotime('now') < $_SESSION['locking_time']) {
                return array("status" => "0", "msg" => "Usted ha intentado 3 veces seguidas ,esperar 5 minutos. ", "data" => array());
            } else {
                unset($_SESSION['failed_login']);
                unset($_SESSION['locking_time']);
            }
        } else {
            unset($_SESSION['failed_login']);
            unset($_SESSION['locking_time']);
        }
    }

    if (empty($_SESSION['failed_login'])) {
        $_SESSION['failed_login'] = 1;
        $_SESSION['locking_time'] = strtotime('now +5 minutes');
    } else {
        $_SESSION['failed_login'] ++;
        $_SESSION['locking_time'] = strtotime('now +5 minutes');
    }


    return false;
}

function validateMac($conexion, $mac) {

    $rows = mysql_query("select IdUser , Email from user where Mac = '$mac';", $conexion);
    if (mysql_num_rows($rows) > 0) {
        $result = array();
        while (($objrow = mysql_fetch_assoc($rows))) {
            extract($objrow);
            $result[] = array("IdUser" => $IdUser, "Email" => $Email);
        }

        $json = array("status" => "1", "msg" => "The Mac already exists", "data" => $result);
    } else {

        $json = array("status" => "2", "msg" => "The Mac does not exist", "data" => array());
    }

    return $json;
}

function setMac($conexion, $mac, $token) {

    mysql_query("update user set Mac = '$mac' , StatusTokenMac = 2 where TokenMac = '$token' and StatusTokenMac = 1;", $conexion);

    if (mysql_error()) {
        $json = array("status" => "2", "msg" => "Error MYsql , Could not update", "data" => array());
    } else {
        if (mysql_affected_rows() == 0) {
            $json = array("status" => "2", "msg" => "Could not update or is already updated", "data" => array());
        } else {
            $json = array("status" => "1", "msg" => "Updated successfully", "data" => array());
        }
    }

    return $json;
}

?>
