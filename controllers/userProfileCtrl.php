<?php
include './models/Album.php';
include './models/Band.php';
include './models/User.php';

if (isset($_SESSION['id'])){

    $album = new Album;
    $album->setUserId($_SESSION['id']);
    $userAlbums = $album->getAlbumsByUser();
    
    $band = new band;
    $band->setUserId($_SESSION['id']);
    $userBands = $band->getBandsByUser();
}
