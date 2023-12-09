
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (report.php)
Contents:
1. Disabling of Pigs Records

-->
<?php
require("./controller/db.php");

$pid  = $_GET['pid'];
$ptype  = $_GET['processType'];

if($ptype=="piglist"){
    $disalist = new disablePLClass();
    $disalist->disa_Piglist($pid);
}
else if ($ptype=="pigsold"){
    $disasold= new disablePSClass();
    $disasold->disa_Pigsold($pid);
}
else if ($ptype=="pigprice"){
    $disaprice = new disablePPClass();
    $disaprice->disa_Pigprice($pid);
}



?>