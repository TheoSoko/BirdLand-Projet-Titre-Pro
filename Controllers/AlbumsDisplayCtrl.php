<?php  
include './models/Album.php';


$album = new Album;
$albumList = $album->getAllForDisplay();