<?php
require './models/User.php';
// Controlleur de suppression d'albums favoris de l'user

if (isset($_POST['deleteFavoriteAlbum']) && isset($_POST['albumId'])){
    $user = new User;
    if (!isset($_SESSION['id'])){
        echo 'noSession';
    } else {
        $user->setId($_SESSION['id']);
        $user->setfavoriteAlbumId(intval(htmlspecialchars($_POST['albumId'])));
        if ($user->checkIfFavoriteAlbumExists()){
            if ($user->deleteFavoriteAlbum()){
                echo 'ok';
            }
        }
    }
}


if (isset($_POST['deleteFavoriteBand'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoriteBandId($bandId);
    $user->deleteFavoriteBand();
}
if (isset($_POST['deleteFavoritePlaylist'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoritePlaylistId($playListId);
    $user->deleteFavoriteAlbum();
}