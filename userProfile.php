<?php 
include 'parts/header.php'
?>

<div class="row profileHeader pt-5">
    <div class="col"></div>
    <div class="col text-center">
        <div class="profilePic mx-auto px-lg-5"></div>
        <p class="text-myColor fs-4 fw-bold mt-3">Nom d'utilisateur</p>
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



<script src="assets/bootstrap/bootstrap.bundle.js"></script>
</body>
</html>