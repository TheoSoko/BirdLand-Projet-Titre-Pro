<?php  
include './models/Band.php';
if (!isset($_SESSION['id'])){
    session_start();
}

$band = new Band;

//Si l'utilisateur a choisi un ordre de disposition
if (isset($_GET['displayByFilter'])){
    if ($_GET['displayByFilter'] == 'Aléatoire'){
        $order = '`id` ASC';
        $bandList = $band->getAllForDisplay($order);
    }
    if ($_GET['displayByFilter'] == 'Les plus populaires'){
        $order = '`id` ASC';
        $bandList = $band->getAllForDisplay($order);    
    }
    if ($_GET['displayByFilter'] == 'De A à Z'){
        $order = '`name` ASC';
        $bandList = $band->getAllForDisplay($order);    
    }
    if ($_GET['displayByFilter'] == 'De Z à A'){
        $order = '`name` DESC';
        $bandList = $band->getAllForDisplay($order);
    }
} else {
    //Par défault
    $order = '`id` ASC';
    $bandList = $band->getAllForDisplay($order);
}

//Si l'image n'existe pas ou n'est pas définie
foreach ($bandList as $band){
    if (!file_exists($band->mainImage)){
        $band->mainImage = 'assets/img/bandMainImage/band-default-main.jpg';
    }
}