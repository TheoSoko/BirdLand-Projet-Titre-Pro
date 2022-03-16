<?php
include 'models/User.php';
include 'Security.php';

if (isset($_POST['registrationSubmit'])){
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $checkData = new Security;
    $checkData->setEmail($email);
    $checkData->setUsername($username);
    $checkData->setPassword($password);
    $checkData->checkEmail();
    $checkData->checkUsername();
    $checkData->checkPassword();

    $data = $checkData->getCheckedData();

    if (!empty($data)){
        var_dump($data);
    } else {
        echo 'ça marche pô';
    }

    $errorList = $checkData->getErrorList();
    if (!empty($errorList)){
        var_dump($errorList);
    }

}