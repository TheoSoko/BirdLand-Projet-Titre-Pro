<?php  
include './models/Album.php';


$album = new Album;
$album->setId($_GET['id']);
$albumInfo = $album->getAlbum();
$releaseDateArray = explode('/', $albumInfo->releaseDate);
$yearOfRelease = $releaseDateArray[2];

//La chaine de charactère correspondant aux musiciens devient un tableau
$arrayArtists = explode(', ', $albumInfo->artist);
//Pour chaque entré du tableau, je rajoute la virgule que j'ai enlevée à l'étape précédente
//Les valeurs de chaque entrée deviendront de inputs
$arrayLenght = count($arrayArtists);
    foreach ($arrayArtists as $key => $artist){
        if ($key + 1 < $arrayLenght){
            $arrayArtists[$key] = $artist . ',';
        }
    }





$albumTracks = $album->getAlbumTracks();

$creditedMusicians = $album->getCreditedMusicians();
