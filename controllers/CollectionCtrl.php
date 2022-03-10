<?php 
if (!isset($_GET['artistNameSubmit'])){
    include 'models/Album.php';
    include 'models/Band.php';
} else {
    include '../models/Album.php';
    include '../models/Band.php';
}



$album = new Album;
$albumList = $album->getAlbumsForDisplay();
 foreach ($albumList as $album){
    $arrayArtists = 'arrayArtists' . $album->id;
    $$arrayArtists = explode(', ', $album->artist);

    $arrayLenght = count($$arrayArtists);
    foreach ($$arrayArtists as $key => $artist){
        if ($key + 1 < $arrayLenght){
            $$arrayArtists[$key] = $artist . ',';
        }
    }
}



if (isset($_GET['artistNameSubmit'])){
    $band = new Band;
    $bandName = str_replace(',', '', $_GET['artistNameSubmit']);

    $band->setName($bandName);
    $bandId = $band->getIdFromName();
    if (!empty($bandId)){
        header('Location: ../musicianTemplate.php?id=' . $bandId);
        exit;
    } else{
        header('Location: ../collection.php');
        exit;
    }
}


//$bandNameList = $album->getBandNames();
