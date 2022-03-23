<?php  
include './models/Band.php';

$band = new Band;
$band->setId($_GET['id']);
$bandInfo = $band->getBand();

$bandAlbums = $band->getBandAlbums();

//Vérifie si l'utilisateur a le groupe dans ses favoris
if (isset($_SESSION['id'])){
    $band->setUserId($_SESSION['id']);
    $userBand = $band->getBandsByUser();
    $bandIds = [];
    foreach ($userBand as $band){
        $bandIds[] = $band->bandId;
    }
    if (in_array($_GET['id'], $bandIds)){
        $userHasBand = true;
    } else {
        $userHasBand = false;
    }
}