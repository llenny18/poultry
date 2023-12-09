
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (disainvestment.php)
Contents:
1. Disabling of Investments

-->
<?php
require("./controller/db.php");
$recordID  = $_GET['recordID'];
$record = new disableRecordClass();

$record->disa_record($recordID);


?>