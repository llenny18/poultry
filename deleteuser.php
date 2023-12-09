
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (deleteuser.php)
Contents:
1. Deleting ofUser Accounts

-->
<?php
require("./controller/db.php");
$uid  = $_GET['uid'];
$deleteUserClass = new deleteuserClass();

$deleteUserClass->deletebyID($uid);


?>