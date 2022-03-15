<?php 
include 'parts/header.php';
include 'controllers/musicianInfoCtrl.php';
?>

<div class="row bandHeader">
    <div class="col-lg-4 text-center">
        <div class=""><img class="headerMainImage" src="<?= $bandInfo->mainImage ?>" alt=""></div>
    </div>
    <div class="col-lg-8 headerText mt-3">
        <div class="truc text-center"><h1 class="text-light mt-4 pt-lg-5"><?= $bandInfo->bandName ?></h1></div>
        <div class="w-75 mx-auto"><p class="fs-5 text-myColor mt-5 pt-sm-5 pt-lg-0"><?=$bandInfo->presentation?></p></div>
    </div>
</div>

















<script src="assets/bootstrap/bootstrap.bundle.js"></script>
</body>
</html>