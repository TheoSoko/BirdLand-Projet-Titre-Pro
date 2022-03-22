albumItems = document.querySelectorAll(".albumSectionItem")
bandItems = document.querySelectorAll(".bandSectionItem")
playlistItems = document.querySelectorAll(".playlistSectionItem")

function albumsDisplayNone(){
    albumItems.forEach(currentValue =>{
        currentValue.classList.add("d-none")
    })
}
function bandsDisplayNone(){
    bandItems.forEach(currentValue =>{
        currentValue.classList.add("d-none")
    })
}
function playlistsDisplayNone(){
    playlistItems.forEach(currentValue =>{
        currentValue.classList.add("d-none")
    })
}
function albumsVisible(){
    albumItems.forEach(currentValue =>{
        currentValue.classList.remove("d-none") 
    })
}
function bandsVisible(){
    bandItems.forEach(currentValue =>{
        currentValue.classList.remove("d-none") 
    })
}
function playlistsVisible(){
    playlistItems.forEach(currentValue =>{
        currentValue.classList.remove("d-none") 
    })
}

    albumsDisplayNone()
    bandsDisplayNone()
    playlistsDisplayNone()


document.addEventListener("click", action =>{
    if (event.target.matches("#userAlbumButton")){
        albumsVisible()
        bandsDisplayNone()
        playlistsDisplayNone()
        window.scrollTo(0, window.innerHeight - 210)
    }
    if (event.target.matches("#userBandButton")){
        bandsVisible()
        albumsDisplayNone()
        playlistsDisplayNone()
        window.scrollTo(0, window.innerHeight - 210)
    }
    if (event.target.matches("#userPlaylistButton")){
        playlistsVisible()
        bandsDisplayNone()
        albumsDisplayNone()
        window.scrollTo(0, window.innerHeight - 210)
    }

    if (event.target.matches(".userSettingsIcon")){
        window.location.href = "../userAccountSettings.php";
    }


})