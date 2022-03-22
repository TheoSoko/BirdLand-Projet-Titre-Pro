<?php
require '/models/User.php';

if (isset($_POST['addFavoriteAlbum'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoriteAlbumId($albumId);
    $user->addAlbum();
}
if (isset($_POST['addFavoriteBand'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoriteBandId($bandId);
    $user->addBand();
}
if (isset($_POST['addFavoritePlaylist'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoritePlaylistId($playListId);
    $user->addPlaylist();
}

if (isset($_POST['deleteFavoriteAlbum'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoriteAlbumId($albumId);
    $user->addAlbum();
}
if (isset($_POST['deleteFavoriteAlbum'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoriteBandId($bandId);
    $user->addBand();
}
if (isset($_POST['deleteFavoritePlaylist'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoritePlaylistId($playListId);
    $user->addPlaylist();
}




