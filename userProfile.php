<?php 
include 'parts/header.php';
include 'controllers/userProfileCtrl.php'
?>

<?php if (isset($_SESSION['id'])) {?>

    <div class="row profileHeader pt-5">
        <div class="col"></div>
        <div class="col text-center">
            <?php if (!empty($_SESSION['profilePic'])){ ?>
                <div class="mx-auto px-lg-5 mt-4"> <img src="<?= $_SESSION['profilePic'] ?>" alt="Image de profil de l'utilisateur" width="210px"></div>
            <?php } else { ?>
                <div class="profilePic mx-auto px-lg-5"></div>
            <?php } ?>
            <p class="text-myColor fs-4 fw-bold mt-3"><?= $_SESSION['username'] ?></p>
        </div>
        <div class="col"><div class="settingsIconDiv text-end"><i class="fa-solid fa-gear fa-xl userSettingsIcon"></i><i class="fa-solid fa-gear fa-2xl userSettingsIcon"></i></div></div>
    </div>


    <div class="selectUserCategory mt-5 pt-2 ms-5 ps-3">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item btn btn-dark userView px-4 mx-1 fs-5" id="userAlbumButton">Albums</li>
            <li class="list-group-item btn btn-dark userView px-4 mx-1 fs-5" id="userBandButton">Artistes</li>
            <li class="list-group-item btn btn-dark userView px-4 mx-1 fs-5" id="userPlaylistButton">Playlists</li>
            <li class="list-group-item btn btn-dark userView px-4 mx-1 fs-5" id="userAlertsButton">Alertes</li>
        </ul>
    </div>

<div class="mb-5">
    <!-- Albums-->
    <div class="justify-content-around d-flex mt-5 mx-5 pt-3 row albumSectionItem">
        <?php foreach ($userAlbums as $album){ ?>
            <div class="col-3 mt-5 mx-2 imageColSize albumSectionItem">
                <a href="albumTemplate.php?id=<?= $album->alId ?>"><img src="<?= $album->alcover ?>" alt="Image de la pochette d'album" width="100%" height="auto" class="albumSectionItem"></a>
                <div class="d-block text-center mt-2"><p class="text-myColor fs-4 albumSectionItem"><?= $album->alTitle ?></p></div>
            </div>
        <?php } ?>
    </div>

    <!-- Musiciens-->
    <div class="justify-content-around d-flex mt-5 mx-5 pt-3 row bandSectionItem" name="bandSection">
        <?php foreach ($userBands as $band){ ?>
            <div class="col-3 mt-5 mx-2 imageColSize bandSectionItem">
                <a href="musicianTemplate.php?id=<?=$band->bandId?>"><img src="<?= $band->bandImg ?>" alt="Image de la pochette d'album" width="100%" height="auto" class="bandSectionItem"></a>
                <div class="d-block text-center mt-2"><p class="text-myColor fs-4 bandSectionItem"><?= $band->bandName ?></p></div>
            </div>
        <?php } ?>
    </div>

    <!-- Playlists-->
    <div class="justify-content-around d-flex mt-5 mx-5 pt-3 row playlistSectionItem" name="playlistSection">
        <?php  ?>
            <div class="col-3 mt-5 mx-2 imageColSize playlistSectionItem">
                <img src="<?php ?>" alt="Image de la pochette d'album" width="100%" height="auto" class="playlistSectionItem">
                <div class="d-block text-center mt-2"><p class="text-myColor fs-4 playlistSectionItem"><?php ?></p></div>
            </div>
        <?php  ?>
    </div>


</div>



<?php } ?>

<script src="assets/js/userProfile.js"></script>
</body>
</html>