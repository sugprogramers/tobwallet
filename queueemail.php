<?php
require('qcubed.inc.php');
require('general.php');
//error_reporting(E_ERROR | E_PARSE);
$conexion = unserialize(DB_CONNECTION_1);
$dbserver = $conexion['server'];
$dbuser = $conexion['username'];
$dbpass = $conexion['password'];
$db = $conexion['database'];

while (true) {

    saveLog("logqueue.txt", "Iteration ");
    $conexion = @mysql_connect($dbserver, $dbuser, $dbpass);
    $database = @mysql_select_db($db, $conexion);
    if (!$conexion || !$database) {
        saveLog("logqueue.txt", "Error conexion  DB");
        exit(0);
    } else {
        try {
            $rows = mysql_query("SELECT   `IdQueueEmail`, `To`, `Subject`, `Body` FROM  queueemail WHERE Status = 1  ;", $conexion);
            if (mysql_num_rows($rows) > 0) {
                while (($objrow = mysql_fetch_assoc($rows))) {

                    $idQueueEmail = $objrow['IdQueueEmail'];
                    $to = $objrow['To'];
                    $subject = $objrow['Subject'];
                    $body = $objrow['Body'];
                    echo $idQueueEmail . "<br>";
                    saveLog("logqueue.txt", "Sending $idQueueEmail");
                    $response = sendEmail($body, $to, $subject);
                    if ($response == false) {
                        mysql_query("update queueemail set Status = 3 ,Log = 'Error Sent' where IdQueueEmail = $idQueueEmail;", $conexion);
                        echo "send error \n";
                        saveLog("logqueue.txt", "Send Error");
                    } else {
                        mysql_query("update queueemail set Status = 2 ,Log = 'Success Sent' where IdQueueEmail = $idQueueEmail;", $conexion);
                        echo "send correct \n";
                        saveLog("logqueue.txt", "Send Correct");
                    }
                }
            }
        } catch (Exception $e) {
            
        }
        mysql_close($conexion);
    }

    sleep(30);
}


?>
