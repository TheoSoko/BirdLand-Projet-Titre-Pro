<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Birdland</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-costum py-4">
        <a class="navbar-brand" href="index.php">Birdland</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <li class="nav-item"> <a class="nav-link" href="#" id="tst">Collection</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Articles</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Musiciens</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Culture</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Playlists</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Recherche</a> </li>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <H1 id="h1mainTitle">BIRDLAND</H1>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="presentation py-3">
                    <h2 id="h2Presentation">Présentation du site</h2>
                    <p class="presentationText">Ellentesque et dolor tristique, eleifend turpis eget, laoreet ipsum. Proin commodo, risus sit amet varius laoreet, metus urna cursus dolor.
                        Donec fringilla vel libero id fringilla. Donec nec odio eget dolor fringilla venenatis. </p>
                    <p class="presentationText"> In sit amet arcu auctor, rhoncus lacus a, tincidunt magna. Duis tristique dignissim nunc, non interdum odio placerat id. </p>
                </div>
            </div>
        </div>
        <div class="row blocTextLink">
            <div class="col d-flex justify-content-center">
                <p id="textLinkPresentation">Lien vers page de présentation complète du site, (avec image en fond)</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-12 d-flex justify-content-center"><span class="blocCollection text-center"><a class="blocCategoryText" href="">COLLECTION</a></span></div>
            <div class="col-xl-6 col-sm-12 d-flex justify-content-center"><span class="blocArticles text-center"><a class="blocCategoryText" href="">ARTICLES</a></span></div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-12 d-flex justify-content-center"><span class="blocMusiciens text-center"><a class="blocCategoryText" href="">MUSICIENS</a></span></div>
            <div class="col-xl-6 col-sm-12 d-flex justify-content-center"><span class="blocPlaylists text-center"><a class="blocCategoryText" href="">PLAYLISTS</a></span></div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center"><span class="blocCulture text-center mx-2 mx-md-0"><a class="blocCategoryText" href="">CULTURE</a></span></div>
        </div>
    </div>

    <script src="assets/bootstrap/bootstrap.bundle.js"></script>
</body>

</html>