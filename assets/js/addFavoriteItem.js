document.addEventListener("click", action => {
    if (event.target.parentNode.matches("[name=addToFavorites]")){
        let albumId = event.target.parentNode.id
        xhr = new XMLHttpRequest
        xhr.open("POST", "controllers/userAddAlbumCtrl.php", true)
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
})