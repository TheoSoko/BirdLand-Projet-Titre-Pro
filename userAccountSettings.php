<?php
include 'controllers/userSettingsCtrl.php';
include 'parts/header.php';
?>

<?php if (isset($_SESSION['id'])){ ?>

<!-- PARAMETRES GENERAUX -->
<?php if (!isset($_GET['setting'])){?>
    <div class="container">
        <div class="mt-5 pt-4 pb-2 pb-lg-0 text-center">
            <h1 class="text-myColor display-5">Paramètres du compte</h1>
        </div>
        <div class="row text-center text-lg-start">
            <div class="mt-5 col-lg-4 text-end d-none d-lg-block">
                <div><a class="btn btn-secondary mb-3 px-3" href="userAccountSettings.php?setting=username">Modifier</a></div>
                <div><a class="btn btn-secondary mb-3 mt-1 px-3" href="userAccountSettings.php?setting=email">Modifier</a></div>
                <div><a class="btn btn-secondary mb-3 mt-1 px-3" href="userAccountSettings.php?setting=profilePic">Modifier</a></div>
            </div>
            <!-- Infos -->
            <div class="mt-5 settingsText col-lg-5 ms-lg-1">
                <p class="text-myColor fs-4"><span class="fw-bold d-block d-lg-inline">Nom d'utilisateur : </span><span><?= $_SESSION['username'] ?></span></p>
                <div class="mt-2 mb-4"><a class="btn btn-secondary d-inline d-lg-none py-2 px-5" href="userAccountSettings.php?setting=username">Modifier</a></div>

                <p class="text-myColor fs-4"><span class="fw-bold d-block d-lg-inline">Adresse Email : </span><span><?= $_SESSION['email'] ?></span></p>
                <div class="mt-2 mb-4"><a class="btn btn-secondary mt-3 mb-5 d-inline d-lg-none py-2 px-5" href="userAccountSettings.php?setting=email">Modifier</a></div>

                <div class="row mt-4 mb-4">
                    <div class="col-12 col-lg-6"><p class="text-myColor fs-4 fw-bold">Photo de profil : </p></div>
                    <div class="col-12 col-lg-6"><img class="" src="<?= $_SESSION['profilePic']?>" alt="Image de profil de l'utilisateur" width="100px"></div>
                    <div class="mt-4"><a class="btn btn-secondary mt-3 mb-5 d-inline d-lg-none py-2 px-5" href="userAccountSettings.php?setting=profilePic">Modifier</a></div>
                </div>
                <p class="text-myColor fs-4 pt-3 mt-5 mt-lg-4"><span class="fw-bold d-block d-lg-inline"> Date de création du compte : </span><span><?= isset($profileCreationDate) ? $profileCreationDate : 'Non indiquée'?></span></p>
                <a class="mt-5 fw-bold btn btn-danger" href="userAccountSettings.php?setting=deleteAccount"> Supprimer le compte </a>
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
        <?php if (isset($successUsername)) {?>
                <p class="text-success fs-4 mt-3"><?= $successUsername ?></p>
        <?php }  ?>
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
        <?php if (isset($successEmail)) {?>
                <p class="text-success fs-4 mt-3"><?= $successEmail ?></p>
        <?php }  ?>
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
        <input type="submit" value="Confirmer" class="btn btn-secondary d-block mx-auto mt-4" name="changeProfilePicSubmit">
        <?php if (isset($profilePicErrorList)){ 
                foreach ($profilePicErrorList as $error){?>
                    <p class="text-danger fs-4 mt-3"><?= $error ?></p>
        <?php }} ?>
        <?php if (isset($successProfilePic)) {?>
                <p class="text-success fs-4 mt-3"><?= $successProfilePic ?></p>
        <?php } ?>
    </form>
<?php } ?>


<!-- SUPPRESSION DU COMPTE -->
<?php if (isset($_GET['setting']) && $_GET['setting'] == 'deleteAccount'){ ?>
    <div class="mt-5 pt-4 text-center">
        <h1 class="text-myColor display-6">Suppression du compte</h1>
        <h1 class="text-myColor h2 mt-4">Êtes-vous certain de vouloir supprimer votre compte? </h1>
        <div class="mt-5">
            <a class="btn btn-danger px-3 me-3 fs-5" href="userAccountSettings.php?setting=deleteAccountConfirm">Oui</a>
            <a class="ms-3 px-3 btn btn-secondary fs-5" href="userAccountSettings.php">Non</a>
        </div>
    </div>
<?php } ?>
<?php if (isset($_GET['setting']) && $_GET['setting'] == 'deleteAccountConfirm' && !isset($deleteUserSuccess)){?>
    <form action="" method="POST">
        <div class="mt-4 pt-4 pb-1 text-center">
            <h1 class="text-myColor h2 mt-4 mb-4 pb-3">Veuillez entrer votre mot de passe <br> pour confirmer la suppression <u>définitive</u>  du compte</h1>
            <label for="userPassword" class="mb-2 d-block text-myColor fs-4">Mot de passe : </label>
            <input type="password" name="userPassword" id="" class="inputWidth">
        </div>
        <div class="text-center mt-5"><input name="accountDeletion" type="submit" value="Supprimer mon compte" class="btn btn-danger fw-bold py-2"></div>
        <?php if (isset($deleteUserErrorList)){ 
                foreach ($deleteUserErrorList as $error){?>
                <div class="text-center"><p class="text-danger fs-4 mt-4"><?= $error ?></p></div>
        <?php }} ?>
    </form>
<?php } ?>


<?php } ?>


<?php if (isset($deleteUserSuccess)) {?>
    <div class="text-center">
        <p class="text-success fs-3 mt-5 pt-3 mb-5"><?= $deleteUserSuccess ?></p>
        <a href="index.php" class="btn btn-secondary fs-4">Revenir au site</a>
    </div>
<?php } ?>



</body>
</html>