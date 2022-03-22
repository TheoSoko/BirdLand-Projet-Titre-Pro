<?php
require './models/User.php';
require 'Security.php';

if(!isset($_SESSION)){
    session_start();
}

if (isset($_SESSION['id'])){
    $user = new User;
    $user->setId($_SESSION['id']);
    $profileCreationDate = $user->getCreationDate();

    if (isset($_POST['changeUsernameSubmit'])){
        $checkData = new Security;
        $checkData->setUsername($_POST['newUsername']);
        //Les champs doivent être en Pascal case (PascalCase)
        $checkData->setFieldsToCheck(["Username"]);
        $checkData->checkAll();
        //Si des attributs "checked" sont false, ou si la liste d'erreurs n'est pas vide
        if (!$checkData->getCheckedData() || !empty($checkData->getErrorList())){
            $usernameErrorList = $checkData->getErrorList();
        } else {
            $user->setUsername($_POST['newUsername']);
            //Si la requête a fonctionné
            if ($user->updateUsername()){
                $_SESSION['username'] = $_POST['newUsername'];
                $successUsername = 'Votre nom d\'utilisateur a bien été modifiée';
            }
        }
    } 

    if (isset($_POST['changeEmailSubmit'])){
        $checkData = new Security;
        $checkData->setEmail($_POST['newEmail']);
        //Les champs doivent être en Pascal case (PascalCase)
        $checkData->setFieldsToCheck(["Email"]);
        $checkData->checkAll();
        //Si des attributs "checked" sont false, ou si la liste d'erreurs n'est pas vide
        if (!$checkData->getCheckedData() || !empty($checkData->getErrorList())){
            $emailErrorList = $checkData->getErrorList();
        } else {
            $user->setEmail($_POST['newEmail']);
            //Si la requête a fonctionné
            if ($user->updateEmail()){
                $_SESSION['email'] = $_POST['newEmail'];
                $successEmail = 'Votre addresse email a bien été modifiée';
            }
        }
    }

    if (isset($_POST['changeProfilePicSubmit'])){
        //J'utilise la superGlobale $_FILES pour récupérer les informations du fichier envoyé par le formulaire
        //Je récupère le type mime du fichier (image/jpg par exemple), et je sépare les deux informations
        $mimeType = explode('/', mime_content_type($_FILES['newProfilePic']['tmp_name']));
        //Je vérifie qu'il s'agit bien d'une image
        if ($mimeType[0] !== 'image'){
            $fileError = 'Désolé, nous n\'acceptons que les images.';
        //Je vérifie l'extension
        } else if ($mimeType[1] != 'jpg' && $mimeType[1] != 'jpeg' && $mimeType[1] != 'png'){
            $fileError = 'Nous sommes désolés, vous devez choisir un fichier possédant une autre extension';
        //Je vérifie la taille du fichier
        } else if ($_FILES['newProfilePic']['size'] > 2000000){
            $fileError = 'Désolé, votre image est trop grosse, la limite est de 2Mo';
        //Si tout va bien:
        } else {
            //Je récupère le nom courant du fichier et j'indique le dossier dans lequel je souhaite le déplacer pour construire la destination
            $fileName = $_FILES['newProfilePic']['name'];
            $directory = 'assets/img/userProfile';
            $target = $directory . '/' . $fileName;
            //Je déplace le fichier vers la destination
            move_uploaded_file($_FILES['newProfilePic']['tmp_name'], $target);
            //Je renomme le fichier une fois déplacé
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            rename($target, $directory . '/' . $_SESSION['username'] . '-profile.' . $extension);
            
            //J'envoie le lien de l'image à la base de données
            $user->setProfilePicLink('assets/img/userProfile/' . $_SESSION['username'] . '-profile.' . $extension);
            $user->updateProfilePic();

            //Je mets à jour la session
            $_SESSION['profilePic'] = 'assets/img/userProfile/' . $_SESSION['username'] . '-profile.' . $extension;
            $successProfilePic = 'Votre image de profil a bien été changée';
            //header('Location: userProfile.php');
        }
    }

    if (isset($_POST['accountDeletion'])){
        $user = new User;
        $user->setId($_SESSION['id']);
        $userInfo = $user->getUserById();

        if (password_verify($_POST['userPassword'], $userInfo->password)){
            $user->setUsername($_SESSION['username']);
            $user->setEmail($_SESSION['email']);
            if ($user->deleteUser()){
                $deleteUserSuccess = "Votre compte a bien été supprimé";
                session_destroy();
            } else {
                $deleteUserErrorList[] = 'Une erreur est survenue, veuillez réessayer ultérieurement';
            }
        } else {
            $deleteUserErrorList[] = 'Le mot de passe que vous avez fourni n\'est pas correct';
        }
    }

}