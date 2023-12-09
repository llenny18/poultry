<?php
require("./controller/db.php");
$record = $_GET['recordID'];
$deleteRecordClass = new deleteRecordClass();

$deleteRecordClass->deletebyID($record);


?>