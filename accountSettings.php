<?php
include 'controllers/userSettingsCtrl.php';
include 'parts/header.php';
?>

<?php if (isset($_SESSION['id'])){ ?>

<!-- PARAMETRES GENERAUX -->
<?php if (!isset($_GET['setting'])){?>
    <div class="container">
        <div class="mt-5 pt-4 text-center">
            <h1 class="text-myColor display-5">Paramètres du compte</h1>
        </div>
        <div class="row">
            <div class="mt-5 col-lg-4 text-end">
                <div><a class="btn btn-secondary mb-3" href="accountSettings.php?setting=username">Modifier</a></div>
                <div><a class="btn btn-secondary mb-3 mt-1" href="accountSettings.php?setting=email">Modifier</a></div>
                <div><a class="btn btn-secondary mb-3 mt-1" href="accountSettings.php?setting=profilePic">Modifier</a></div>
            </div>
            <!-- Infos -->
            <div class="mt-5 settingsText col-lg-5 ms-lg-3">
                <p class="text-myColor fs-4"><span class="fw-bold"> Nom d'utilisateur : </span><span><?= $_SESSION['username'] ?></span></p>
                <p class="text-myColor fs-4"><span class="fw-bold"> Adresse Email : </span><span><?= $_SESSION['email'] ?></span></p>
                <div class="row mt-4 mb-4">
                    <div class="col"><p class="text-myColor fs-4 fw-bold">Photo de profil : </p></div>
                    <div class="col"><img class="" src="<?= $_SESSION['profilePic']?>" alt="Image de profil de l'utilisateur" width="100px"></div>
                </div>
                <p class="text-myColor fs-4 mt-4"><span class="fw-bold"> Date de création du compte : </span><span><?= isset($profileCreationDate) ? $profileCreationDate : 'Non indiqué'?></span></p>
                <a class="mt-5 fw-bold btn btn-danger" href="accountSettings.php?setting=deleteAccount"> Supprimer le compte </a>

            </div>
            <!--  -->
            <div class="col-lg-4"></div>
        </div>
    </div>
<?php } ?>

<!-- MODFICATION NOM D'UTILISATEUR -->
<?php if (isset($_GET['setting']) && $_GET['setting'] == 'username') {?>
    <div class="mt-5 pt-4 text-center">
        <h1 class="text-myColor display-6">Changement du nom d'utilisateur</h1>
    </div>
    <form action="" method="POST" class="text-center text-myColor fs-5 mt-4">
        <label for="newUsername" class="d-block mb-3 mt-4 pt-3 fs-5">Entrez un nouveau nom d'utilisateur : </label>
        <input type="text" name="newUsername" id="" placeholder="<?= $_SESSION['username']?>">
        <input type="submit" value="Confirmer" class="btn btn-secondary d-block mx-auto mt-4" name="changeUsernameSubmit">
        <?php if (isset($usernameErrorList)){ 
                foreach ($usernameErrorList as $error){?>
                    <p class="text-danger fs-4 mt-3"><?= $error ?></p>
        <?php }} ?>
    </form>
<?php } ?>

<!-- MODFICATION EMAIL -->
<?php if (isset($_GET['setting']) && $_GET['setting'] == 'email') {?>
    <div class="mt-5 pt-4 text-center">
        <h1 class="text-myColor display-6">Changement de l'adresse email</h1>
    </div>
    <form action="" method="POST" class="text-center text-myColor fs-5 mt-4">
        <label for="newEmail" class="d-block mb-3 mt-4 pt-3 fs-5">Entrez un nouvel email : </label>
        <input type="text" class="inputWidth" name="newEmail" id="" placeholder="<?= $_SESSION['email']?>">
        <input type="submit" value="Confirmer" class="btn btn-secondary d-block mx-auto mt-4" name="changeEmailSubmit">
        <?php if (isset($emailErrorList)){ 
                foreach ($emailErrorList as $error){?>
                    <p class="text-danger fs-4 mt-3"><?= $error ?></p>
        <?php }} ?>
    </form>
<?php } ?>

<!-- MODFICATION IMAGE DE PROFIL -->
<?php if (isset($_GET['setting']) && $_GET['setting'] == 'profilePic') {?>
    <div class="mt-5 pt-4 text-center">
        <h1 class="text-myColor display-6">Changement de l'image de profil</h1>
    </div>
    <form action="" method="POST"class="text-center text-myColor fs-5 mt-4" enctype="multipart/form-data">
        <label for="newProfilePic" class="d-block mb-3 mt-4 pt-3 fs-5">Ajoutez une image de profil : </label>
        <input type="file" name="newProfilePic" id="">
        <input type="btn" value="Confirmer" class="btn btn-secondary d-block mx-auto mt-4" name="changeProfilePicSubmit">
        <p class="fs-4 mt-4 text-danger">Malheureusement, l'ajout d'image de profil n'est pas disponible pour l'instant.</p>
        <?php if (isset($profilePicErrorList)){ 
                foreach ($profilePicErrorList as $error){?>
                    <p class="text-danger fs-4 mt-3"><?= $error ?></p>
        <?php }} ?>
    </form>
<?php } ?>

<!-- SUPPRESION DU COMPTE -->
<?php if (isset($_GET['setting']) && $_GET['setting'] = 'deleteAccount'){ ?>
    <div class="mt-5 pt-4 text-center">
        <h1 class="text-myColor display-6">Suppression du compte</h1>
        <h1 class="text-myColor h2">Êtes-vous certain de vouloir supprimer votre compte? </h1>
        <div class="mt-5"><button class="btn btn-danger px-3 me-3 fs-5">Oui</button><button class="ms-3 px-3 btn btn-secondary fs-5">Non</button></div>
    </div>
<?php } ?>


<?php } ?>

</body>
</html>