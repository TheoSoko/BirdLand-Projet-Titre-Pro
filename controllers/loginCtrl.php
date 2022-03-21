<?php
include '../models/User.php';
include '../controllers/Security.php';
session_start();

if (isset($_POST['emailOrUsernameLogin']) && isset($_POST['passwordLogin'])){
    $emailOrUsername = htmlspecialchars(trim($_POST['emailOrUsernameLogin']));
    $password = (trim($_POST['passwordLogin']));

    //Vérifications de sécurité
    $checkData = new Security;
    $checkData->setPassword($password);
    //On vérifie si l'identifiant est l'email ou le nom d'utilisateur
    if (filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL)){
        $fieldsToCheck = ["Email", "Password"];
        $loginType = 'email';
        $checkData->setEmail($emailOrUsername);
    } else {
        $fieldsToCheck = ["Username", "Password"];
        $loginType = 'username';
        $checkData->setUsername($emailOrUsername);
    }
    $checkData->setFieldsToCheck($fieldsToCheck);
    //On vérifie tous les champs qu'on a indiqué
    $checkData->checkAll();
    //On récupère les données, ou un faux
    //

    if (!$checkData->getCheckedData() || !empty($checkData->getErrorList())){
        //Ajax response
        echo('Identifiant ou mot de passe invalide');
    } else {
        $user = new User;
        $loginType == 'email' ? $user->setEmail($emailOrUsername) : $user->setUsername($emailOrUsername);
        $userInfo = $user->getUserByLogin($loginType);
        if (empty($userInfo->password)){
            //Ajax response
            echo('Identifiant ou mot de passe invalide');
        } else {
            if (!password_verify($password, $userInfo->password)){
                //Ajax response
                echo('Identifiant ou mot de passe invalide');
            } else {
                //Ajax response
                echo ('OK');
                // CA MARCHE !
                $_SESSION['username'] = $userInfo->username;
                $_SESSION['email'] = $userInfo->email;
                $_SESSION['id'] = $userInfo->id;
                if (isset($userInfo->role)){
                    $_SESSION['role'] = $userInfo->role;
                } else {
                    $_SESSION['role'] = 'peasant';
                }
                if (isset($userInfo->profilePic)){
                    $_SESSION['profilePic'] = $userInfo->profilePic;
                } else {
                    $_SESSION['profilePic'] = 'assets/img/userProfile/default-profile.jpg';
                }
            }
        }
    }



}