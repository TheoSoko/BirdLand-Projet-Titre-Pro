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
                header('Location: userProfile.php');
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
                header('Location: userProfile.php');
            }
        }
    } 

    if (isset($_POST['changeProfilePicSubmit'])){

        $mimeType = explode('/', mime_content_type($_FILES['newProfilePic']['tmp_name']));
        if ($mimeType[0] !== 'image'){
            echo 'NAAAAAA';
        } else if ($mimeType[1] != 'jpg' && $mimeType[1] != 'jpeg' && $mimeType[1] != 'png'){
            $fileError = 'Nous sommes désolés, vous devez choisir un fichier possédant une autre extension';
        } else if ($_FILES['newProfilePic']['size'] > 2000000){
            $fileError = 'Désolé, votre image est trop grosse, la limite est de 2Mo';
        } else {
            $directory = 'assets/img/userProfile';
            $target = $directory . basename($_FILES['newProfilePic']['name']);

            //echo is_writable($_FILES['newProfilePic']['tmp_name']);
            //echo is_readable($_FILES['newProfilePic']['tmp_name']);
            //echo is_executable($_FILES['newProfilePic']['tmp_name']);

            /*
            chmod($_FILES['newProfilePic']['tmp_name'], 777);
            
            echo is_writable($_FILES['newProfilePic']['tmp_name']);
            echo is_readable($_FILES['newProfilePic']['tmp_name']);
            echo is_executable($_FILES['newProfilePic']['tmp_name']);

            move_uploaded_file($_FILES['newProfilePic']['tmp_name'], $target);
            */
        }
        //header('Location: userProfile.php');
    }

}