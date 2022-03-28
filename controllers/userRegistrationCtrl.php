<?php
include 'models/User.php';
include 'controllers/Security.php';
if (!isset($_SESSION)){
    session_start();
}

if (isset($_POST['registrationSubmit'])){
    $email = htmlspecialchars($_POST['emailRegistration']);
    $username = htmlspecialchars($_POST['usernameRegistration']);
    $password = ($_POST['passwordRegistration']);

    $checkData = new Security;
    $checkData->setEmail($email);
    $checkData->setUsername($username);
    $checkData->setPassword($password);
    //Les champs doivent être en Pascal case (PascalCase)
    $checkData->setFieldsToCheck(["Email", "Username", "Password"]);
    //On vérifie tous les champs qu'on a indiqué
    $checkData->checkAll();
    $errorList = $checkData->getErrorList();

    //Si les champs sont valides et que la liste d'erreur est vide : 
    if ($checkData->getCheckedData() && empty($errorList)){
        $user = new User;
        $user->setUsername($_POST['usernameRegistration']);
        $user->setEmail($_POST['emailRegistration']);
        $user->setPassword(password_hash($_POST['passwordRegistration'], PASSWORD_DEFAULT));
        $user->setCreationDate(date('Y-m-d'));

        if ($user->checkIfUserExists()){
            $errorExistingUser = 'Cet utilisateur existe deja';
            exit();
        }
        if ($user->registerNewUser()){
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['id'] = $user->lastInsertId();
            $_SESSION['profilePic'] = 'assets/img/userProfile/default-profile.jpg';
            header("Location: userProfile.php");
            exit();
        }
    }
}