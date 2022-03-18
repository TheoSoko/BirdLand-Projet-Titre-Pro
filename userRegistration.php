<?php 
include 'parts/header.php';
?>




<div class="pt-1 pb-2 my-4 rounded text-center " id="registrationModal">
    <form method="POST" id="registrationForm">
        <div class="d-flex justify-content-end me-3 closeFormModalDiv"><span class="js-close-form closeFormModal fs-1 fw-bold">&times;</span></div>
        <h2 class="h1 text-myColor mb-5 pb-3">Créer un compte</h2>
        <div class="my-4" id="emailDivRegister">
            <label for="email" class="d-block text-myColor fs-4 my-2">Votre adresse mail : </label>
            <input type="mail" name="emailRegistration" id="emailRegistration" class="fs-5">
        </div>
        <div class="my-4"  id="usernameDivRegister">
            <label for="username" class="d-block text-myColor fs-4 my-2">Votre nom d'utilisateur : </label>
            <input type="text" name="usernameRegistration" id="usernameRegistration" class="fs-5">
        </div>
        <div class="my-4" id="passwordDivRegister">
            <label for="password" class="d-block text-myColor fs-4 my-2">Votre mot de passe : </label>
            <input type="password" name="passwordRegistration" id="passwordRegistration" class="fs-5">
        </div>
        <div class="pb-2"><input type="button" class="registrationSubmit btn btn-secondary fw-bold fs-5 my-4" value="Valider l'inscription" name="registrationSubmit" id="registrationSubmit"></div>
    </form>
</div>





<script src="assets/js/registerUser.js"></script>

</body>
</html>