<?php
include '../models/User.php';
include '../controllers/Security.php';

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
    $data = $checkData->getVerifiedData();
    //

    if ($data === false){
        //Ajax response
        echo('identifiant ou mot de passe invalide');
    } else {
        $user = new User;
        $loginType == 'email' ? $user->setEmail($data['email']) : $user->setUsername($data['username']);
        $passwordObj = $user->getPasswordHash($loginType);
        if (empty($passwordObj->password)){
            //Ajax response
            echo('identifiant ou mot de passe invalide');
        } else {
            if (!password_verify($data['password'], $passwordObj->password)){
                //Ajax response
                echo('identifiant ou mot de passe invalide');
            } else {
                //Ajax response
                echo ('OK');
                // CA MARCHE !!!!!!!!!!!!!!!!
            }
        }
    }



}