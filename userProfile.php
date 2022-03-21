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
        <div class="col"><div class="text-end"><i class="fa-solid fa-gear fa-xl"></i><i class="fa-solid fa-gear fa-2xl"></i></div></div>

    </div>


    <div class="selectUserCategory mt-5">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item btn btn-dark userView">Albums</li>
            <li class="list-group-item btn btn-dark userView">Artistes</li>
            <li class="list-group-item btn btn-dark userView">Playlists</li>
            <li class="list-group-item btn btn-dark userView">Alertes</li>
        </ul>
    </div>
    <!-- Albums-->
    <div class="justify-content-around d-flex mt-5 mx-5 pt-3 row" id="AlbumSection">
        <?php foreach ($userAlbums as $album){ ?>
            <div class="col-3 mt-5 mx-2 imageColSize"><img src="<?= $album->alcover ?>" alt="Image de la pochette d'album" width="100%" height="auto">
                <div class="d-block text-center mt-2"><p class="text-myColor fs-4"><?= $album->alTitle ?></p></div>
            </div>
        <?php } ?>
    </div>





<?php } ?>

</body>
</html>