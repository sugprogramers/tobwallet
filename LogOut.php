<?php

require_once('./qcubed.inc.php');
require './general.php';

$User = @unserialize($_SESSION['TobUser']);
$Admin = @unserialize($_SESSION['TobAdmin']);

//if($User) saveLog($User->Email);
//if($Admin) saveLog ($Admin->Email);

$_SESSION = array();

@session_destroy();

QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
