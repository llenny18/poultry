
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (logout.php)
Contents:
1. Logout Page to destroy Sessions

-->
<?php
require("./controller/db.php");
session_destroy();
redirect("login.php")

?>