<?php
include '../models/User.php';
include '../controllers/Security.php';

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
    //On récupère les données, ou un faux
    $data = $checkData->getVerifiedData();





    if ($data == false){
        $errorList = $checkData->getErrorList();
        //Ajax response
        echo(json_encode($errorList));
    } else {
        $user = new User;
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $user->setPassword(password_hash($data['password'], PASSWORD_DEFAULT));

        if ($user->checkIfUserExists()){
            $errorList = [];
            $errorList['existingUser'] = 'Cet utilisateur existe deja';
            //Ajax response
            echo(json_encode($errorList));
        } else {
            $user->registerNewUser();
            //Ajax response
            echo(1);
        }
    }
}