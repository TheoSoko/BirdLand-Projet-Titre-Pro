<?php  
include './models/Album.php';

$album = new Album;
$album->setId($_GET['id']);
$albumInfo = $album->getAlbum();
$yearOfRelease = explode('/', $albumInfo->releaseDate);

$albumTracks = $album->getAlbumTracks();

$creditedMusicians = $album->getCreditedMusicians();

