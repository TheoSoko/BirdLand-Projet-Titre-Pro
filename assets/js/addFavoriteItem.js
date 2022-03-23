document.addEventListener("click", action => {
    //Pour l'ajout d'albums
    if (event.target.parentNode.matches("[name=addFavoriteAlbum]")){
        let albumId = event.target.parentNode.id
        xhr = new XMLHttpRequest
        xhr.open("POST", "controllers/userAddItemCtrl.php", true)
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhr.send("addFavoriteAlbum=yes&albumId=" + albumId)
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.response !== false){
                    let message = xhr.responseText
                    if (message.includes("noSession")){
                        alert("pas de session")
                    } else if (message.includes('ok')){
                        favoriteIcon.classList.add("text-success")
                    }
                }
            }
        }
    }
    //Pour l'ajout de groupes
    if (event.target.parentNode.matches("[name=addFavoriteBand]")) {
        let bandId = event.target.parentNode.id
        xhr = new XMLHttpRequest
        xhr.open("POST", "controllers/userAddItemCtrl.php", true)
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhr.send("addFavoriteBand=yes&bandId=" + bandId)
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.response !== false){
                    let message = xhr.responseText
                    if (message.includes("noSession")){
                        alert("pas de session")
                    } else if (message.includes('ok')){
                        favoriteIcon.classList.add("text-success")
                    }
                }
            }
        }
    }
})