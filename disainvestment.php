<?php
require("./controller/db.php");
$recordID  = $_GET['recordID'];
$record = new disableRecordClass();

$record->disa_record($recordID);


?>