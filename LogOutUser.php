<?php

require_once('./qcubed.inc.php');
require './general.php';

$User = @unserialize($_SESSION['TobUser']);
$Admin = @unserialize($_SESSION['TobAdmin']);

//if($Admin && $User) saveLog ($Admin->Email." [".$User->Email."]");

unset($_SESSION['TobUser']);

@session_destroy();
QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/profileadmin');
?>
