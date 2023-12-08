<?php
require("./controller/db.php");
$uid  = $_GET['uid'];
$disableUserClass = new disableUserClass();

$disableUserClass->disableUser($uid);


?>