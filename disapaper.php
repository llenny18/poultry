<?php
require("./controller/db.php");
$pid  = $_GET['pid'];
$disapaper = new disablePaperClass();

$disapaper->disa_paper($pid);


?>