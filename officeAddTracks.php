<?php 
include 'parts/header.php';
include 'controllers/officeAddTracksCtrl.php'
?>
<div class="container text-center">
    <div class="mt-5 pt-4">
        <h1 class="text-myColor display-5">Ajout de pistes à un album</h1>
    </div>

    <?php if (!isset($_GET['albumSearchSubmit']) && !isset($_GET['selectedAlbum'])){ ?>
        <form class="mt-5 pt-5" method="GET" action="">
            <label for="albumSearch" class="text-myColor fs-4 d-block mb-3">Recherchez un album :</label>
                <input type="text" name="albumSearch" id="albumSearch" placeholder="Un album" class="px-2" required>
                <div class="d-flex justify-content-center mt-4"><input type="submit" class="btn btn-secondary d-block py-1 px-3" value="Chercher" name="albumSearchSubmit"></div>
        </form>
    <?php } ?>
    
    <?php if (isset($albums) && !empty($albums)){ ?>
        <form action="" method="GET" class="mt-5">
            <select class="fs-5"name="albumSelect">
                <?php foreach ($albums as $album) { ?>  
                    <option value="<?=$album->id?>"><?= $album->title ?></option>
                <?php } ?>
            </select>
            <div class="d-flex justify-content-center mt-4 mb-5">
                <input type="submit" class="btn btn-secondary d-block py-1 px-3 fw-bold mb-4" value="Sélectionner cet album" name="selectedAlbum">
            </div>
            <a class="text-myColor fs-4" href="officeAddTracks.php">Retour</a>      
        </form>
    <?php } else if (isset($albums) && empty($albums)) { ?>
            <p class="text-myColor fs-3 mt-5 pt-2 mb-5">Votre recherce n'a rien donné</p>
            <a class="text-myColor fs-4 mt-3" href="officeAddTracks.php">Retour</a>
    <?php } ?>
</div>




<?php if (isset($_GET['selectedAlbum']) || isset($_GET['addTracksSubmit'])){ ?>
    <div class="justify-content-center d-flex mt-5 pt-3 row">
        <div class="col-12 imageColSize"><img src="<?= $album->cover ?>" alt="Image de la pochette d'album" width="100%" height="auto"></div>
        <div class="d-block text-center mt-2"><p class="text-myColor fs-4"><?= $album->title ?></p></div>
    </div>

    <form class="mt-3 text-center" action="">
        <label for="numberOfTracks" class="text-myColor fs-4 d-block mb-3">Nombre de pistes</label>
        <div id="divForCountBtn" class="text-center mb-4"></div>
        <input type="button" name="addTracks" id="addTracks" value="Ajouter" class="fs-5 me-3 fw-bold btn btn-warning">
        <input type="button" name="removeTracks" id="removeTracks" value="Désajouter" class="fs-5 fw-bold btn btn-warning">
    </form>

    <form class="mt-5 mb-5" method="POST" name="trackForm">
        <div class="d-flex justify-content-center">
            <table class="text-myColor fs-5">
                <thead id="tableHead" class="d-none">
                    <th>Titre</th>
                    <th>Durée</th>
                    <th>Numéro</th>
                </thead>
                <tbody id="tableBody">
                    <!--
                        <tr class="addedTableRow">
                            <td><input type="text" name="trackTitle" id=""></td>
                            <td><input type="time" name="trackDuration" id=""></td>
                            <td><input type="number" name="trackOrder" id=""></td>
                        </tr>
                    -->
                </tbody>
            </table>
        </div>
        <div class=""><input type="submit" class="mx-auto mt-4 btn btn-secondary fw-bold" value="Confirmer" id="addTracksSubmit" name="addTracksSubmit"></div>
        <input type="hidden" name="countEntries" id="countEntries">
    </form>

    <?php if (isset($result) && $result){ ?>
        <div class="text-myColor fs-4 text-center mt-5 pt-4 mb-5">
            <p>Les pistes ont bien été ajoutés à la base de données. Merci!</p>
        </div>
    <?php } ?>

    <div class="text-myColor fs-5 text-center mt-5 pt-4 mb-5" id="helpText">
        <p>Pour la durée des pistes, utilisez <u>les flèches ou les chiffres de votre clavier</u>, les valeurs sont : <span class="fw-bold">"hh:mm:ss"</span> ou <span class="fw-bold">"heures : minutes : secondes"</span>.</p>
        <p>Pour numérotation des pistes, elle se fait ainsi: <span class="fw-bold">"1, 2, 3, 4, etc."</span>, ou <span class="fw-bold">"A1, A2, A3, B1, B2, etc."</span></p>
    </div>

<?php } ?>



<script>
    let increment = 0
    let countBtn = document.createElement("span")
    countBtn.classList.add("btn", "btn-info", "fw-bold", "fs-5", "px-3", "py-2")
    divForCountBtn.append(countBtn)

    countBtn.style.display = "none"
    addTracksSubmit.style.display = "none"
    helpText.style.display = "none"


    document.addEventListener("click", action => {
        if (event.target.matches("#addTracks")){
            tableHead.classList.remove("d-none")
            addTracksSubmit.style.display = "block"
            helpText.style.display = "block"
            countBtn.style.display = "inline"

            increment ++

            /* Autre façon de faire, peut-être pas compatible avec tous les navigateurs, je sais pas.
            tableBody.insertAdjacentHTML("afterbegin", 
                `<tr class="addedTableRow">
                    <td><input type="text" name="trackTitle" id=""></td>
                    <td><input type="time" name="trackDuration" id="" step="1" min="00:00:01" max="6:00:00" value="00:05:30" required></td>
                    <td><input type="text" name="trackOrder" id=""></td>
                </tr>` )
            
            allTrackTitles = document.querySelectorAll("input[name='trackTitle']")
            allTrackDurations = document.querySelectorAll("input[name='trackDuration']")
            allTrackOrders = document.querySelectorAll("input[name='trackOrder']")
            allTrackTitles.forEach(trackTitle => trackTitle.name = "trackTitle" + increment);
            allTrackDurations.forEach(trackDuration => trackDuration.name = "trackDuration" + increment);
            allTrackOrders.forEach(trackOrder => trackOrder.name = "trackOrder" + increment);
            */


           // Création du formulaire html 
           
            let row = document.createElement('tr')
            tableBody.append(row)

            let trackTitleCell = document.createElement('td')
            let trackTitle = document.createElement('input')
            trackTitle.type = "text"
            trackTitle.required = "true"
            trackTitle.name = "trackTitle" + increment
            trackTitleCell.append(trackTitle)

            let trackDurationCell = document.createElement('td')
            let trackDuration = document.createElement('input')
            //trackDuration.type = "time"
            trackDuration.type = "text"
            trackDuration.name = "trackDuration" + increment
            //trackDuration.step = "1"
            //trackDuration.max = "06:00:00"
            trackDuration.maxLength = "8"
            trackDuration.value = "00:05:30"
            trackDurationCell.append(trackDuration)

            let trackOrderCell = document.createElement('td')
            let trackOrder = document.createElement('input')
            trackOrder.type = "text"
            trackOrder.name = "trackOrder" + increment
            trackOrder.maxLength = "4"
            trackOrder.value = increment
            trackOrderCell.append(trackOrder)
            
            row.append(trackTitleCell)
            row.append(trackDurationCell)
            row.append(trackOrderCell)
            
            //

            countEntries.value = increment
            countBtn.innerText = increment
            window.scrollTo(0, document.body.scrollHeight);
        }
        if (event.target.matches("#removeTracks")){
            tableBody.lastElementChild.remove()
            increment --
            countBtn.innerText = increment
            countEntries.value = increment
        }
    })

</script>




<script src="assets/bootstrap/bootstrap.bundle.js"></script>
</body>
</html>