<?php  
include './models/Band.php';

$band = new Band;
$bandList = $band->getAllForDisplay();
foreach ($bandList as $band){
    if (!file_exists($band->mainImage)){
        $band->mainImage = 'assets/img/bandMainImage/band-default-main.jpg';
    }
}