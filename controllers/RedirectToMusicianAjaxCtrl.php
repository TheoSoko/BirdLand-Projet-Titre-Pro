<?php  
include '../models/Band.php';

if (isset($_POST['artistName'])){
    $band = new Band;
    $bandName = str_replace(',', '', $_POST['artistName']);
    $band->setName($bandName);
    $bandId = $band->getIdFromName();
    if (!empty($bandId)){
        echo $bandId;
    } else{
        echo false;
    }
}
