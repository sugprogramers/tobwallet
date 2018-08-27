<?php

require_once('./qcubed.inc.php');
require './general.php';

$User = @unserialize($_SESSION['DatosUsuario']);
$Admin = @unserialize($_SESSION['DatosAdministrador']);

//if($Admin && $User) saveLog ($Admin->Email." [".$User->Email."]");

unset($_SESSION['DatosUsuario']);


QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/profileadmin');
?>
