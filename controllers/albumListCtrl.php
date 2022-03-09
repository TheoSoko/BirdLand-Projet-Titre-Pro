<?php  
include './models/Album.php';


$album = new Album;
$albumList = $album->getAlbumsForDisplay();
//$bandNameList = $album->getBandNames();
