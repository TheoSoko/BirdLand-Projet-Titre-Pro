<?php
include '../models/User.php';
include '../controllers/Security.php';
session_start();

if (isset($_POST['emailRegistration']) && isset($_POST['usernameRegistration']) && isset($_POST['passwordRegistration'])){
    $email = htmlspecialchars(trim($_POST['emailRegistration']));
    $username = htmlspecialchars(trim($_POST['usernameRegistration']));
    $password = (trim($_POST['passwordRegistration']));

    $checkData = new Security;
    $checkData->setEmail($email);
    $checkData->setUsername($username);
    $checkData->setPassword($password);
    //Les champs doivent être en Pascal case (PascalCase)
    $checkData->setFieldsToCheck(["Email", "Username", "Password"]);
    //On vérifie tous les champs qu'on a indiqué
    $checkData->checkAll();
    $errorList = $checkData->getErrorList();

    //Si des attributs "checked" sont false, ou si la liste d'erreurs n'est pas vide, on met la liste d'erreurs en réponse
    if (!$checkData->getCheckedData() || !empty($errorList)){
        //Ajax response
        echo(json_encode($errorList));
    } else {
        $user = new User;
        $user->setUsername($_POST['usernameRegistration']);
        $user->setEmail($_POST['emailRegistration']);
        $user->setPassword(password_hash($_POST['passwordRegistration'], PASSWORD_DEFAULT));
        $user->setCreationDate(date('Y-m-d'));

        if ($user->checkIfUserExists()){
            $errorList = [];
            $errorList['existingUser'] = 'Cet utilisateur existe deja';
            //Ajax response
            echo(json_encode($errorList));
        } else {
            if ($user->registerNewUser()){
                //CA MARCHE!
                //Ajax response
                echo(1);
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['id'] = $user->lastInsertId();
            }
        }
    }
}