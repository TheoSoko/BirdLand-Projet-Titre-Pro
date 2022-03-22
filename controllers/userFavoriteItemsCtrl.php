<?php
session_start();
require '../models/User.php';
//Controlleur de création et de suppression d'items favoris pour l'user


if (isset($_POST['addFavoriteAlbum']) && isset($_POST['albumId'])){
    $user = new User;
    if (!isset($_SESSION['id'])){
        echo 'noSession';
    } else {
        $user->setId($_SESSION['id']);
        $user->setfavoriteAlbumId(intval(htmlspecialchars($_POST['albumId'])));
        if ($user->addAlbum()){
            echo 'ok';
        } 
    }
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




