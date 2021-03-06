<?php 
include 'parts/header.php'
?>

    <div class="container-fluid">
        <div class="row d-flex justify-content-center" >
            <div class="col col-lg-4 px-0 text-center mt-5">
                <H1 class="articlesCategoryTitle pt-3">Articles Blog</H1>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 mx-4 text-myColor">
        <h2 class="mb-3 ">Lorem ipsum dolor sit amet</h2>
        <p class="fs-5">Curabitur quis ultrices ex. Donec posuere nibh odio, ac tempor metus placerat id. Praesent volutpat. Maecenas quis mi vel maximus tristique.</p>
        <p class="fs-5"> Quisque ac sagittis mi. Nam vitae turpis cursus, tincidunt dolor ac, blog nibh.</p>
    </div>

    <div class="text-center mb-3 mt-5 py-3 me-4">
        <svg class="mb-1 ms-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
        <input type="search" name="searchArticle" id="searchArticle" class="py-1 ms-2"> 
    </div>  

        <!-- Choix de Disposition des articles -->
        <div class="row text-center" id="selectOrderCollection">
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

    
        <div class="row text-center mt-4 collectionChangePage">
            <div class="col-4">
                <img src="assets/img/left.svg" alt="Bouton page précédente" height="46px" width="46px" class="me-2" />
            </div>
            <div class="col">
                <p id="pageNumber" class="mb-0 mt-1">Page 1 sur 7</p>
            </div>
            <div class="col-4">
                <img src="assets/img/right.svg" alt="Bouton page suivante" height="46px" width="46px" class="ms-2" />
            </div>
        </div>

        <!-- Display des Articles, trois sur la même page -->
        <div class="row mt-5 pt-4 mx-1 d-flex justify-content-around">
            <div class="col-12 col-lg-4 col-xl-3 mb-5 mx-2 articleItem">
                <div class="row">
                    <div class="col bg-info"></div>
                    <div class="col bg-secondary"><h2 class="h4 fw-bold text-dark py-5 ps-3"><u> <a href="articleTemplate.html" class="text-dark" class="text-dark"> Titre de l'article </a></u></h2></div>
                </div>
                <div class="row">
                    <div class="col-12 bg-secondary"><p class="text-dark fs-5 px-4 py-3">Morbi vitae quam scelerisque, pulvinar lacus 
                        ac, pretium purus. Duis tristique risus tortor, 
                        sed pretium nisi lacinia quis. 
                        Nulla facilisi.</p></div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xl-3 mb-5 mx-2 articleItem">
                <div class="row">
                    <div class="col bg-info"></div>
                    <div class="col bg-secondary"><h2 class="h4 fw-bold text-dark py-5 ps-3"><u><a href="articleTemplate.html" class="text-dark"> Titre de l'article </a></h2></u></div>
                </div>
                <div class="row">
                    <div class="col-12 bg-secondary"><p class="text-dark fs-5 px-4 py-3">Morbi vitae quam scelerisque, pulvinar lacus 
                        ac, pretium purus. Duis tristique risus tortor, 
                        sed pretium nisi lacinia quis. 
                        Nulla facilisi.</p></div>
                </div>
            </div>            
            <div class="col-12 col-lg-4 col-xl-3 mb-5 mx-2 articleItem">
                <div class="row">
                    <div class="col bg-info"></div>
                    <div class="col bg-secondary"><h2 class="h4 fw-bold text-dark py-5 ps-3"><u><a href="articleTemplate.html" class="text-dark"> Titre de l'article </a></h2></u></div>
                </div>
                <div class="row">
                    <div class="col-12 bg-secondary"><p class="text-dark fs-5 px-4 py-3">Morbi vitae quam scelerisque, pulvinar lacus 
                        ac, pretium purus. Duis tristique risus tortor, 
                        sed pretium nisi lacinia quis. 
                        Nulla facilisi.</p></div>
                </div>
            </div>            
        <!-- TROIS DEUX LIGNES POUR L'EXEMPLE-->
            <div class="col-12 col-lg-4 col-xl-3 mb-5 mx-2 articleItem">
                <div class="row">
                    <div class="col bg-info"></div>
                    <div class="col bg-secondary"><h2 class="h4 fw-bold text-dark py-5 ps-3"><u><a href="articleTemplate.html" class="text-dark"> Titre de l'article </a></h2></u></div>
                </div>
                <div class="row">
                    <div class="col-12 bg-secondary"><p class="text-dark fs-5 px-4 py-3">Morbi vitae quam scelerisque, pulvinar lacus 
                        ac, pretium purus. Duis tristique risus tortor, 
                        sed pretium nisi lacinia quis. 
                        Nulla facilisi.</p></div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xl-3 mb-5 mx-2 articleItem">
                <div class="row">
                    <div class="col bg-info"></div>
                    <div class="col bg-secondary"><h2 class="h4 fw-bold text-dark py-5 ps-3"><u><a href="articleTemplate.html" class="text-dark"> Titre de l'article </a></h2></u></div>
                </div>
                <div class="row">
                    <div class="col-12 bg-secondary"><p class="text-dark fs-5 px-4 py-3">Morbi vitae quam scelerisque, pulvinar lacus 
                        ac, pretium purus. Duis tristique risus tortor, 
                        sed pretium nisi lacinia quis. 
                        Nulla facilisi.</p></div>
                </div>
            </div>            
            <div class="col-12 col-lg-4 col-xl-3 mb-5 mx-2 articleItem">
                <div class="row">
                    <div class="col bg-info"></div>
                    <div class="col bg-secondary"><h2 class="h4 fw-bold text-dark py-5 ps-3"><u><a href="articleTemplate.html" class="text-dark"> Titre de l'article </a></h2></u></div>
                </div>
                <div class="row">
                    <div class="col-12 bg-secondary"><p class="text-dark fs-5 px-4 py-3">Morbi vitae quam scelerisque, pulvinar lacus 
                        ac, pretium purus. Duis tristique risus tortor, 
                        sed pretium nisi lacinia quis. 
                        Nulla facilisi.</p></div>
                </div>
            </div>            
        </div>

    


    


<script src="assets/bootstrap/bootstrap.bundle.js"></script>
</body>

</html>