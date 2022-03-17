<?php
include '../models/User.php';
include '../controllers/Security.php';

if (isset($_POST['emailRegistration']) && isset($_POST['usernameRegistration']) && isset($_POST['passwordRegistration'])){
    $email = htmlspecialchars(trim($_POST['emailRegistration']));
    $username = htmlspecialchars(trim($_POST['usernameRegistration']));
    $password = htmlspecialchars(trim($_POST['passwordRegistration']));

    $checkData = new Security;
    $checkData->setEmail($email);
    $checkData->setUsername($username);
    $checkData->setPassword($password);
    $checkData->checkAll();

    $data = $checkData->getCheckedData();

    if ($data === false){
        $errorList = $checkData->getErrorList();
        //Ajax response
        echo(json_encode($errorList));
    } else {
        var_dump($data);
        $user = new User;
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $user->setPassword($data['passwordHash']);

        if ($user->checkIfUserExists()){
            $errorList = ['existingUser'];
            //Ajax response
            echo(json_encode($errorList));
        } else {
            $user->registerNewUser();
            //Ajax response
            echo(1);
        }

    }

}