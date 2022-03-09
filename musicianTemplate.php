<?php 
include 'parts/header.php';
include 'controllers/musicianInfoCtrl.php';
?>

<div class="row bandHeader">
    <div class="col-4 ">
        <div class=""><img class="headerMainImage" src="<?= $bandInfo->mainImage ?>" alt=""></div>
    </div>
    <div class="col-8 headerText">
        <div class="truc text-center"><h1 class="text-light mt-5 pt-5 mb-5"><?= $bandInfo->bandName ?></h1></div>
        <div class="w-75 mx-auto"><p class="fs-5 text-myColor"><?=$bandInfo->presentation?></p>
        </div>
    </div>
</div>

















<script src="assets/bootstrap/bootstrap.bundle.js"></script>
</body>
</html>