<?php
require("./controller/db.php");
$uid  = $_GET['uid'];
$deleteUserClass = new deleteuserClass();

$deleteUserClass->deletebyID($uid);


?>