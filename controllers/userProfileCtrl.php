<?php
include './models/Album.php';
include './models/Band.php';
include './models/User.php';

if (isset($_SESSION['id'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $userAlbums = $user->getAlbumsByUser();
}
