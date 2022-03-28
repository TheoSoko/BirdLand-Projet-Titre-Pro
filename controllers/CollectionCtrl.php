<?php 
if (!isset($_SESSION)){
    session_start();
}
if (!isset($_GET['artistNameSubmit'])){
    include 'models/Album.php';
    include 'models/Band.php';
} else {
    include '../models/Album.php';
    include '../models/Band.php';
}

$album = new Album;

//Disposition
//Si l'utilisateur a choisi un ordre de disposition
if (isset($_GET['displayByFilter'])){
    if ($_GET['displayByFilter'] == 'Ajoutés recemment'){
        $order = '`id` DESC';
        $albumList = $album->getAlbumsForDisplay($order);
    }
    if ($_GET['displayByFilter'] == 'Sorties récentes'){
        $order = '`releaseDate` DESC';
        $albumList = $album->getAlbumsForDisplay($order);    
    }
    if ($_GET['displayByFilter'] == 'De A à Z'){
        $order = '`title` ASC';
        $albumList = $album->getAlbumsForDisplay($order);    
    }
    if ($_GET['displayByFilter'] == 'De Z à A'){
        $order = '`title` DESC';
        $albumList = $album->getAlbumsForDisplay($order);
    }
} else {
    //Par défault
    $order = '`id` ASC';
    $albumList = $album->getAlbumsForDisplay($order);
}




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
