
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (disapaper.php)
Contents:
1. Disabling of Papers

-->
<?php
require("./controller/db.php");
$pid  = $_GET['pid'];
$disapaper = new disablePaperClass();

$disapaper->disa_paper($pid);


?>