<?php 
include 'controllers/userDeleteItemCtrl.php';
include 'parts/header.php';
include 'controllers/musicianTemplateCtrl.php';
?>

<div class="row bandHeader">
    <div class="col-lg-4 text-center">
        <div class=""><img class="headerMainImage" src="<?= $bandInfo->mainImage ?>" alt=""></div>
        <?php if (empty($userHasBand)) {?>
        <!-- Ajout aux favoris pour grands écrans-->
            <p class="d-none d-lg-block mt-4 pt-2 pb-0 fs-4 ms-4 text-myColor text-center fw-bold" id="addAlbumP">
                <span class="changeFavorite ms-5 ps-5" id="<?=$bandInfo->id?>" name="addFavoriteBand">
                    <span class="me-2 pe-1">Ajouter</span> <i class="fa-solid fa-heart-circle-plus" id="favoriteIcon"> </i>
                </span>
            </p>
        <!-- -->
        <?php } else {?>
        <!-- Suppression des favoris pour grands écrans-->
            <form action="" method="POST">
                <p class="d-none d-lg-block mt-4 pt-2 pb-0 fs-5 ms-4 text-myColor text-center fw-bold" id="addAlbumP">
                    <span class="ms-5 ps-5" id="<?=$bandInfo->id?>">
                        <input type="submit" name="deleteFavoriteBand" class="inputRemoveStyle changeFavorite me-2 pe-1 fw-bold" value="Retirer des favoris"></span> 
                        <input type="hidden" name="bandId" value="<?= $bandInfo->id ?>">
                        <i class="fa-solid fa-compact-disc changeFavorite"> </i>
                    </span>
                </p>
            </form>
        <!-- -->
        <?php } ?>
    </div>
    <div class="col-lg-8 headerText mt-3">
        <div class="text-center"><h1 class="text-light mt-4 pt-lg-5"><?= $bandInfo->bandName ?></h1></div>
        <?php if (empty($userHasBand)) {?>
        <!-- Ajout aux favoris pour petits écrans-->
            <p class="d-lg-none mt-5 pb-0 fs-3 text-myColor text-start ms-4 ms-sm-5 ps-4 ps-sm-5 fw-bold" id="addAlbumP">
                <span class="changeFavorite" name="addFavoriteBand" id="<?=$bandInfo->id?>">
                    <span class="me-3">Ajouter</span><i class="fa-solid fa-heart-circle-plus"> </i>
                </span>
            </p>
        <!-- -->
        <?php } else {?>
        <!-- Suppression des favoris pour petits écrans-->
            <p class="d-lg-none mt-5 pb-0 fs-5 text-myColor text-start ms-4 ms-sm-5 ps-4 ps-sm-5 fw-bold" id="addAlbumP">
                <span class="changeFavorite" id="<?=$bandInfo->id?>">
                    <span class="me-3">Retirer des favoris</span><i class="fa-solid fa-compact-disc"> </i>
                </span>
            </p>
        <!-- -->
        <?php } ?>
        <div class="w-75 mx-auto"><p class="fs-5 text-myColor mt-4 pt-2 mt-sm-3 mt-lg-5 pb-sm-5 pb-lg-0 pt-sm-4 pt-lg-0"><?=$bandInfo->presentation?></p></div>
    </div>
</div>

<div class="row mt-5 pt-4 text-center bandDiscographyTitle">
    <h2 class="text-myColor h1">Discographie</h2>
</div>

<div class="justify-content-around d-flex mt-3 mx-5 pt-3 row albumSectionItem">
    <?php foreach ($bandAlbums as $album){ ?>
        <div class="col-3 mt-5 imageColSize albumSectionItem">
            <a href="albumTemplate.php?id=<?= $album->albumId ?>"><img src="<?= empty($album->albumCover) ? 'assets/img/albumCovers/album-default.jpg' : $album->albumCover ?>" alt="Image de la pochette d'album" width="100%" height="auto" class="albumSectionItem"></a>
            <div class="d-block text-center mt-2"><p class="text-myColor fs-4 albumSectionItem"><?= $album->albumTitle ?></p></div>
        </div>
    <?php } ?>
</div>







<script src="assets/js/addFavoriteItem.js"></script>
</body>
</html>