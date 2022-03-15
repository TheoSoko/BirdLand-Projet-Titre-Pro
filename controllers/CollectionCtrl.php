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
//Pour chaque album, la chaine de charactère correspondant aux musiciens devient un tableau
//J'utilise des variables dynamiques afin d'avoir des noms de variable uniques pour chaque album
foreach ($albumList as $album){
    $arrayArtists = 'arrayArtists' . $album->id;
    $$arrayArtists = explode(', ', $album->artist);

    //Pour chaque entré du tableau, je rajoute la virgule que j'ai enlevée à l'étape précédente
    //Les valeurs de chaque entrée deviendront de inputs
    $arrayLenght = count($$arrayArtists);
    foreach ($$arrayArtists as $key => $artist){
        if ($key + 1 < $arrayLenght){
            $$arrayArtists[$key] = $artist . ',';
        }
    }
}


/*
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
*/

//$bandNameList = $album->getBandNames();
