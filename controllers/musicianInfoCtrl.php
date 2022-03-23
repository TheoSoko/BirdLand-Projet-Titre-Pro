<?php  
include './models/Band.php';

$band = new Band;
$band->setId($_GET['id']);
$bandInfo = $band->getBand();

$bandAlbums = $band->getBandAlbums();

