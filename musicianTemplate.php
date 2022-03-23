<?php 
include 'parts/header.php';
include 'controllers/musicianInfoCtrl.php';
?>

<div class="row bandHeader">
    <div class="col-lg-4 text-center">
        <div class=""><img class="headerMainImage" src="<?= $bandInfo->mainImage ?>" alt=""></div>
    </div>
    <div class="col-lg-8 headerText mt-3">
        <div class="text-center"><h1 class="text-light mt-4 pt-lg-5"><?= $bandInfo->bandName ?></h1></div>
        <div class="w-75 mx-auto"><p class="fs-5 text-myColor mt-5 mt-sm-2 mt-lg-5 pb-sm-5 pb-lg-0 pt-sm-5 pt-lg-0"><?=$bandInfo->presentation?></p></div>
    </div>
</div>

<div class="row mt-5 pt-4 text-center bandDiscographyTitle">
    <h2 class="text-myColor h1">Discographie</h2>
</div>

<div class="justify-content-around d-flex mt-3 mx-5 pt-3 row albumSectionItem">
    <?php foreach ($bandAlbums as $album){ ?>
        <div class="col-3 mt-5 imageColSize albumSectionItem">
            <a href="albumTemplate.php?id=<?= $album->albumId ?>"><img src="<?= $album->albumCover ?>" alt="Image de la pochette d'album" width="100%" height="auto" class="albumSectionItem"></a>
            <div class="d-block text-center mt-2"><p class="text-myColor fs-4 albumSectionItem"><?= $album->albumTitle ?></p></div>
        </div>
    <?php } ?>
</div>















</body>
</html>