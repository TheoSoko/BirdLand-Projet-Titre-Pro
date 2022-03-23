<?php
session_start();
require '../models/User.php';
//Controlleur de création d'items favoris pour l'utilisateur


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
                exit();
            }
        }
    }
}

if (isset($_POST['addFavoriteBand']) && isset($_POST['bandId'])){
    $user = new User;
    if (!isset($_SESSION['id'])){
        echo 'noSession';
    } else {
        $user->setId($_SESSION['id']);
        $user->setfavoriteBandId(intval(htmlspecialchars($_POST['bandId'])));
        if (!$user->checkIfFavoriteBandExists()){
            if ($user->addFavoriteBand()){
                echo 'ok';
                exit();
            }
        }
    }
}

/*
if (isset($_POST['addFavoritePlaylist'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $user->setfavoritePlaylistId($playListId);
    $user->addFavoritePlaylist();
}
*/






