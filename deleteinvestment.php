
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (report.php)
Contents:
1. Deleting of Investments

-->



<?php
require("./controller/db.php");
$record = $_GET['recordID'];
$deleteRecordClass = new deleteRecordClass();

$deleteRecordClass->deletebyID($record);


?>