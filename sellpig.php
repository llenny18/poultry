
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (sellpig.php)
Contents:
1. Transaction of Selling Pigs

-->
<?php
require("./controller/db.php");
$pid  = $_GET['pid'];
$disapaper = new sellPigsClass();

$disapaper->sellbyID($pid);


?>