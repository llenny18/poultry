
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (disauser.php)
Contents:
1. Disabling of User Accounts

-->
<?php
require("./controller/db.php");
$uid  = $_GET['uid'];
$disableUserClass = new disableUserClass();

$disableUserClass->disableUser($uid);


?>