document.addEventListener("click", action => {
    if (event.target.parentNode.matches(".addToFavorite")){
        let albumId = event.target.parentNode.id
        xhr = new XMLHttpRequest
        xhr.open("POST", "controllers/userFavoriteItemsCtrl.php", true)
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhr.send("addFavoriteAlbum=yes&albumId=" + albumId)
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.response == false) {
                    alert('ca marche pas')
                } else {
                    let message = xhr.responseText
                    if (message.includes("noSession")){
                        alert("pas de session")
                    } else if (message.includes('ok')){
                        alert("yes")
                    }
                }
            }
        }
    }
})