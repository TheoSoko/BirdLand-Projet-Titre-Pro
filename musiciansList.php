<?php 
include 'parts/header.php';
include 'controllers/BandsListCtrl.php';
?>


    <div class="text-center mt-5 pt-5 pb-4">
        <H1 class="pt-3 px-5 text-myColor musiciansPageTitle">MUSICIENS</H1>
    </div>


    <!-- Choix de Disposition des Musiciens -->
    <div class="row d-flex justify-content-around me-2 selectOrderDisplay">
        <div class="col-6 col-lg-3 text-center mb-2">
            <p>Aléatoire</p>
        </div>
        <div class="col-6 col-lg-3 text-center mb-2">
            <p>Les plus populaires</p>
        </div>
        <div class="col-6 col-lg-3 text-center">
            <p>De A à Z</p>
        </div>
        <div class="col-6 col-lg-3 text-center">
            <p>De Z à A</p>
        </div>
    </div>
    
    <div class="row text-center pt-4">
        <div class="col">
            <p id="pageNumber" class="mb-0">Page 1 sur 12</p>
        </div>
    </div>

    <!--Barre de recherche-->
    <div class="text-center mb-5 mt-4 py-3 me-4">
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

        <!-- Musiciens -->
        <div class="row text-center mt-5 pt-3 mx-lg-1 albumsRow">

                <?php foreach ($bandList as $band){ ?>
                    <div class="col albumCol mb-3">
                        <a href="musicianTemplate.php?id=<?=$band->id?>" class="text-decoration-none"><div class="album rounded"><img src="<?= $band->mainImage ?>" height="355px" width="355px" alt="" class="musiciansDisplayImg albumCollectionImg"></div>
                            <p class="albumMusicianInfos fw-bold pt-3 mb-0"><?=strlen($band->name) >= 30 ? substr_replace($band->name, '...', 30) : $band->name ?></p>
                        </a>
                    </div>
                <?php } ?>



    
        <!-- Pré-Footer -->
        <div class="row text-center mt-5 pb-3">
            <div class="col-4">
                <img src="assets/img/left.svg" alt="Bouton page précédente" height="46px" width="46px" class="me-2 mt-2" />
            </div>
            <div class="col-4">
                <p id="numberOfItemsDisplayed" class="mt-0">1-55 <br> de 86 musiciens</p>
            </div>
            <div class="col-4">
                <img src="assets/img/right.svg" alt="Bouton page suivante" height="46px" width="46px" class="ms-2 mt-2" />
            </div>
        </div>



</body>
</html>


