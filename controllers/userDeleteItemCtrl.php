<?php
require './models/User.php';
if (!isset($_SESSION['id'])){
    session_start();
}
// Controlleur de suppression d'items favoris de l'user


if (isset($_POST['deleteFavoriteAlbum']) && isset($_POST['albumId'])){
    $user = new User;
    if (!isset($_SESSION['id'])){
        echo 'noSession';
    } else {
        $user->setId($_SESSION['id']);
        $user->setfavoriteAlbumId(intval(htmlspecialchars($_POST['albumId'])));
        if ($user->checkIfFavoriteAlbumExists()){
            if ($user->deleteFavoriteAlbum()){
                header("Refresh:0");
            }
        }
    }
}


if (isset($_POST['deleteFavoriteBand']) && isset($_POST['bandId'])){
    $user = new User;
    if (!isset($_SESSION['id'])){
        echo 'noSession';
    } else {
        $user->setId($_SESSION['id']);
        $user->setfavoriteBandId(intval(htmlspecialchars($_POST['bandId'])));
        if ($user->checkIfFavoriteBandExists()){
            if ($user->deleteFavoriteBand()){
                header("Refresh:0");
            }
        }
    }
}

/*
if (isset($_POST['deleteFavoritePlaylist'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoritePlaylistId($playListId);
    $user->deleteFavoriteAlbum();
}
*/