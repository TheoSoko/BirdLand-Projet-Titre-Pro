<?php 

Class Security{

private string $email;
private string $username;
private string $password;
private string $passwordHash;
private array $errorList;

private bool $checkedEmail;
private bool $checkedUsername;
private bool $checkedPassword;

private string $regexUserName = '/^[\wÀ-ÖØ-öø-ÿ\-]{1,50}$/';
private string $regexPassword = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&µ£\/\\~|\-])[\wÀ-ÖØ-öø-ÿ@$!%*#?&µ£\/\\~|\-]{8,70}$/';




//Retourne les données si tous les attributs checked sont true
public function getCheckedData():array{
    if ($this->checkedEmail = true && $this->checkedUsername = true && $this->checkedPassword = true){
        $checkedData = [];
        array_push($checkedData, $this->email, $this->username, $this->password);
        return $checkedData;
    }
}
//Retourne le tableau d'erreurs
public function getErrorList():array{
    return $this->errorList;
}



public function checkAll():void{
    $this->checkEmail();
    $this->checkUsername();
    $this->checkPassword();
}

//Vérification de l'adresse mail
public function checkEmail():void{
    if (empty($this->email)){
        $this->errorList['emptyEmail'] = 'Vous devez renseigner une adresse mail';
        $this->checkedEmail = false;
    } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $this->errorList['invalidEmail'] = 'Votre adresse mail n\'est pas valide';
        $this->checkedEmail = false;
    } else {
        $this->checkedEmail = true;
        $this->errorList = [];
    }
}

//Vérification du nom d'utilisateur
public function checkUsername():void{
    if (empty($this->username)){
        $this->errorList['emptyUsername'] = 'Vous devez renseigner un nom d\'utilisateur';
        $this->checkedUsername = false;
    } else if (!preg_match($this->regexUserName, $this->username)) {
        $this->errorList['invalidUsername'] = 'Le nom d\'utilisateur ne peut contenir que des lettres, chiffres, et tirets';
        $this->checkedUsername = false;
    } else {
        $this->checkedUsername = true;
        $this->errorList = [];
    }
}

//Vérification du mot de passe
public function checkPassword():void{
    if (empty($this->password)){
        $this->checkedPassword = false;
        $this->errorList['emptyPassword'] = 'Vous devez renseigner un mot de passe';
    } else if (strlen($this->password) > 70){
        $this->checkedPassword = false;
        $this->errorList['invalidPassword'] = 'Le mot de passe ne peut pas contenir plus de 70 caractères';
    } else if (!preg_match($this->regexPassword, $this->password)) {
        $this->checkedPassword = false;
        $this->errorList['invalidPassword'] = 'Le mot de passe doit contenir au moins une lettre, un chiffre, et un caractère spécial';
    } else {
        $this->checkedPassword = true;
        $this->errorList = [];
    }
}


//Setters
public function setEmail(string $email){
    $this->email = $email;
}
public function setUsername(string $username){
    $this->username = $username;
}
public function setPassword(string $password){
    $this->password = $password;
}












}
