<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

echo "hola";
//$connector = new FilePrintConnector("php://stdout");
//$connector = new NetworkPrintConnector("10.x.x.x", 9100);
$nombre_impresora = "EPSON-TM-T20II";  
$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);



$printer -> initialize();

$printer -> text("Hello world\n");
/*$printer -> cut();
*/
$printer -> close();

?>

