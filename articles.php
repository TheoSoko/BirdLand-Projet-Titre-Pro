<?php 
include 'parts/header.php'
?>


<div class="container-fluid">
    <div class="row">
        <div class="col d-flex justify-content-center px-0 mb-3">
            <H1 id="h1mainTitleCollection">ARTICLES</H1>
        </div>
    </div>

    <div class="row d-flex justify-content-center mx-1 mb-3 pb-2">
        <div class="articlesPresentation">
            <h2 id="articlesH2">Présentation de la section</h2>
            <p id="articlesParagraph" class="pt-2">Curabitur quis ultrices ex.Donec posuere nibh odio, ac tempor metus placerat id. Posuere nibh odio. Maecenas tristique.</p>
        </div>
    </div>

    <div class="text-center mb-3 mb-lg-5 mt-5 mt-lg-1 py-3 me-3">
        <svg class="mb-1 ms-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
        <input type="search" name="searchArticle" id="searchArticle" class="py-1 ms-2"> 
    </div>

    <div class="row pt-5">
        <div class="col-xl-6 col-sm-12 d-flex justify-content-center text-center"><span class="blocCategory blocCategoryDark"><a class="blocCategoryTextDark" href="articles-blog.html">ARTICLES BLOG</a></span></div>
        <div class="col-xl-6 col-sm-12 d-flex justify-content-center text-center"><span class="blocCategory blocCategoryDark"><a class="blocCategoryTextDark" href="">PODCASTS</a></span></div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-sm-12 d-flex justify-content-center text-center"><span class="blocCategory blocCategoryDark"><a class="blocCategoryTextDark" href="">INTERVIEWS</a></span></div>
        <div class="col-xl-6 col-sm-12 d-flex justify-content-center text-center"><span class="blocCategory blocCategoryDark"><a class="blocCategoryTextDark" href="">AUTRES</a></span></div>
    </div>

</div>


<script src="assets/bootstrap/bootstrap.bundle.js"></script>
</body>
</html>