<?php 
include 'parts/header.php';
include 'Controllers/AlbumsDisplayCtrl.php';
?>



<div class="container-fluid">
    <div class="row">
        <div class="col d-flex justify-content-center mt-sm-1 mt-md-3 px-0">
            <H1 id="h1mainTitleCollection">COLLECTION</H1>
        </div>
    </div>

    <!-- Choix de Disposition des albums -->
    <div class="row text-center selectOrderDisplay">
        <div class="col-6 col-lg-3 text-end pe-3 text-lg-center pe-lg-0">
            <p>Aléatoire</p>
        </div>
        <div class="col-6 col-lg-3 text-start ps-3 text-lg-center ps-lg-0">
            <span class="me-3">A-Z</span>
            <span>Z-A</span>
        </div>

        <div class="col-6 col-lg-3 text-end text-lg-center">
            <p>Les plus populaires</p>
        </div>
        <div class="col-6 col-lg-3 text-start ps-4 text-lg-center ps-lg-0">
            <p>Les plus récents</p>
        </div>
    </div>
    <div class="row text-center pt-4">
        <div class="col">
            <p id="pageNumber" class="mb-0">Page 1 sur 7</p>
            <p id="numberOfItemsDisplayed" class="mt-0">1-55 de 250 albums</p>
        </div>
    </div>

    <!--Barre de recherche-->
    <div class="text-center mb-5 mt-3 py-3 me-4">
        <svg class="mb-1 ms-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
        <input type="search" name="searchArticle" id="searchArticle" class="py-1 ms-2"> 
    </div>

    <!-- Disposition et navigation-->
    <div class="row text-center mt-4 collectionChangePage">
        <div class="col-4">
            <img src="assets/img/left.svg" alt="Bouton page précédente" height="46px" width="46px" class="me-2" />
        </div>
        <div class="col-4">
            <img src="assets/img/oneElementDisplay.svg" alt="Bouton page précédente" height="46px" width="46px" class="me-1"/>
            <img src="assets/img/twoElementsDisplay.svg" alt="Bouton page précédente" height="46px" width="46px" class="ms-1"/>
        </div>
        <div class="col-4">
            <img src="assets/img/right.svg" alt="Bouton page suivante" height="46px" width="46px" class="ms-2" />
        </div>
    </div>



    <div class="row text-center mt-5 pt-3 mx-lg-1 albumsRow">
        <?php foreach ($albumList as $album){ ?>
            <div class="col albumCol">
                <a href="albumTemplate.html"><div class="album"><img src="<?= $album->cover ?>" height="355px" width="355px" alt="" class="albumCollectionImg"></div></a>
                <p class="albumOrMusicianInfos fw-bold pt-3 mb-0"><?= $album->title ?></p>
                <p class="albumOrMusicianInfos"><?= $album->bandName ?></p>
            </div>
        <?php } ?>
    </div>
    


    <!-- Albums 
    <div class="row text-center mt-5 pt-3 mx-lg-1 albumsRow">
        <div class="col albumCol">
            <a href="albumTemplate.php"><div class="album"><img src="assets/img/P.jpg" height="355px" width="355px" alt="" class="albumCollectionImg"></div></a>
                <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Machin truc of the things</p>
                <p class="albumOrMusicianInfos">Le baguette trio</p>
            </div>
            <div class="col albumCol">
                <a href="albumTemplate.html"><div class="album"></div></a>
                <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Nom de l'album</p>
                <p class="albumOrMusicianInfos">Noms des musiciens</p>
            </div>
            <div class="col albumCol">
                <a href="albumTemplate.html"><div class="album"></div></a>
                <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Nom de l'album</p>
                <p class="albumOrMusicianInfos">Noms des musiciens</p>
            </div>
            <div class="col albumCol">
                <a href="albumTemplate.html"><div class="album"></div></a>
                <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Nom de l'album</p>
                <p class="albumOrMusicianInfos">Noms des musiciens</p>
            </div>
            <div class="col albumCol">
                <a href="albumTemplate.html"><div class="album"></div></a>
            <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Nom de l'album</p>
            <p class="albumOrMusicianInfos">Noms des musiciens</p>
        </div>
        <div class="col albumCol">
            <a href="albumTemplate.html"><div class="album"></div></a>
            <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Nom de l'album</p>
            <p class="albumOrMusicianInfos">Noms des musiciens</p>
        </div>
        <div class="col albumCol">
            <a href="albumTemplate.html"><div class="album"></div></a>
            <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Nom de l'album</p>
            <p class="albumOrMusicianInfos">Noms des musiciens</p>
        </div>
        <div class="col col-lg-3 albumCol">
            <div class="album"></div>
            <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Nom de l'album</p>
            <p class="albumOrMusicianInfos">Noms des musiciens</p>
        </div>
        <div class="col col-lg-3 albumCol">
            <div class="album"></div>
            <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Nom de l'album</p>
            <p class="albumOrMusicianInfos">Noms des musiciens</p>
        </div>
        <div class="col col-lg-3 albumCol">
            <div class="album"></div>
            <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Nom de l'album</p>
            <p class="albumOrMusicianInfos">Noms des musiciens</p>
        </div>
        <div class="col col-lg-3 albumCol">
            <div class="album"></div>
            <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Nom de l'album</p>
            <p class="albumOrMusicianInfos">Noms des musiciens</p>
        </div>
        <div class="col col-lg-3 albumCol">
            <div class="album"></div>
            <p class="albumOrMusicianInfos fw-bold pt-3 mb-0">Nom de l'album</p>
            <p class="albumOrMusicianInfos">Noms des musiciens</p>
        </div>
    </div>

     Pré-Footer -->
    <div class="row text-center mt-5 pb-3">
        <div class="col-4">
            <img src="assets/img/left.svg" alt="Bouton page précédente" height="46px" width="46px" class="me-2 mt-2" />
        </div>
        <div class="col-4">
            <p id="numberOfItemsDisplayed" class="mt-0">1-55 <br> de 250 albums</p>
        </div>
        <div class="col-4">
            <img src="assets/img/right.svg" alt="Bouton page suivante" height="46px" width="46px" class="ms-2 mt-2" />
        </div>
    </div>

</div>


<script src="assets/bootstrap/bootstrap.bundle.js"></script>
</body>
</html>