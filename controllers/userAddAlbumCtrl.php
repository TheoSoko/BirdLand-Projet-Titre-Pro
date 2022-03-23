<?php
session_start();
require '../models/User.php';
//Controlleur de création d'albums favoris pour l'user


if (isset($_POST['addFavoriteAlbum']) && isset($_POST['albumId'])){
    $user = new User;
    if (!isset($_SESSION['id'])){
        echo 'noSession';
    } else {
        $user->setId($_SESSION['id']);
        $user->setfavoriteAlbumId(intval(htmlspecialchars($_POST['albumId'])));
        if (!$user->checkIfFavoriteAlbumExists()){
            if ($user->addFavoriteAlbum()){
                echo 'ok';
            }
        }
    }
}

if (isset($_POST['addFavoriteBand'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoriteBandId($bandId);
    $user->addFavoriteBand();
}
if (isset($_POST['addFavoritePlaylist'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoritePlaylistId($playListId);
    $user->addFavoritePlaylist();
}






