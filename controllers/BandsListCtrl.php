<?php  
include './models/Band.php';

$band = new Band;
$bandList = $band->getAllForDisplay();