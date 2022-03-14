<?php 
require 'models/Album.php';
require 'models/Tracks.php';


if (isset($_GET['albumSearchSubmit'])){
    $albumObj = new Album;
    $albumObj->setsearch($_GET['albumSearch']);
    $albums = $albumObj->getSearchedAlbums();
}

if (isset($_GET['selectedAlbum'])){
    $albumObj = new Album;
    $albumObj->setId($_GET['albumSelect']);
    $album = $albumObj->getAlbum();
}

if (isset($_POST['addTracksSubmit'])){
    $numberOfTracks = intval(htmlspecialChars($_POST['countEntries']));
    $tracksArray = [];
    for ($i = 1; $i <= $numberOfTracks; $i++){
        $tracksArray[] = [ $_POST['trackTitle'. $i], $_POST['trackDuration'. $i], $_POST['trackOrder'. $i] ];
    }

    $tracksObj = new Tracks;
    foreach($tracksArray as $track){
        $tracksObj->setIdAlbum($_GET['albumSelect']);
        $tracksObj->setTitle($track[0]);
        $tracksObj->setDuration($track[1]);
        $tracksObj->setTrackOrder($track[2]);
        $result = $tracksObj->addTracks();
    }
}
