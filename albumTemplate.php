<?php 
include 'parts/header.php';
include 'controllers/albumInfoCtrl.php'
?>



    <div class="container mt-md-4">
        <div class="row">
            <div class="col">
                <div class="albumLone"><img src="<?= $albumInfo->cover ?>" height="355px" width="355px" alt=""></div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <p class="mt-4 mb-0 fs-1 fw-bold text-myColor"><?= $albumInfo->title ?></p>
                <p class="mt-0 fs-2 text-myColor"></p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-start ms-2">
                <p class="mt-4 mb-0 fs-3 text-myColor"><span class="fw-bold">Année de sortie :</span> <?= $yearOfRelease[2]?></p>
                <p class="mt-0 fs-3 text-myColor"><span class="fw-bold">Genre : </span> Jazz moderne</p>
            </div>
        </div>

        <div class="row mt-5 pt-lg-3">
            <div class="col mx-4">
                <p class="fs-3 text-myColor"><?= $albumInfo->desc ?></p>
            </div>
        </div>

        <div class="row mt-5 pt-lg-5">
            <div class="col">
                <table class="table w-100 fs-4 text-myColor">
                    <?php foreach ($albumTracks as $AlbumTrack) { ?>
                    <tr>
                        <td><?= $AlbumTrack->trackOrder ?></td>
                        <td><?= $AlbumTrack->trackTitle ?></td>
                        <td class="text-center text-md-end"><?= $AlbumTrack->duration ?></td>
                    </tr>
                    <?php } ?>
                </table>
                <p class="fs-4 text-myColor mx-4 mt-4 pt-2">Durée totale : 49:37</p>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col">
                <p class="fs-3 text-myColor fw-bold mx-4">crédits :</p>
                <ul class="fs-4 text-myColor credit-List">
                    <?php foreach($creditedMusicians as $creditedMusician){ ?>
                        <li> <span class=""><?=$creditedMusician->musicianName ?></span> : <span class=" fw-bold"><?= $creditedMusician->instrument ?></span> </li>
                    <?php } ?>
                    <li> Sortie : <span> <?= $albumInfo->releaseDate ?> </span></li>
                    <li> Label : <span> <?= $albumInfo->label ?> </span></li>
                    <!-- 
                    <li> Contributeur : <span> Contribution (Pistes 1 à 3)</span></li>
                    <li> Enregistré au Studio Machin à Paris</li>
                    -->
                </ul>
            </div>
        </div>
    </div>

    

    <script src="assets/bootstrap/bootstrap.bundle.js"></script>
</body>
</html>