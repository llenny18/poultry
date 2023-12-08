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