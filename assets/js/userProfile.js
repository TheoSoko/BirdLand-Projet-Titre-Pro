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

    bandsDisplayNone()
    playlistsDisplayNone()


document.addEventListener("click", action =>{
    if (event.target.matches("#userAlbumButton")){
        albumsVisible()
        bandsDisplayNone()
        playlistsDisplayNone()
        if (window.innerWidth > 992 && window.scrollY < 992){
            window.scrollTo(0, 510)
        } else if (window.scrollY < 350){
            window.scrollTo(0, 350)
        }
    }
    if (event.target.matches("#userBandButton")){
        bandsVisible()
        albumsDisplayNone()
        playlistsDisplayNone()
        if (window.innerWidth > 992 && window.scrollY < 992){
            window.scrollTo(0, 510)
        } else if (window.scrollY < 350){
            window.scrollTo(0, 350)
        }
    }
    if (event.target.matches("#userPlaylistButton")){
        playlistsVisible()
        bandsDisplayNone()
        albumsDisplayNone()
        if (window.innerWidth > 992 && window.scrollY < 992){
            window.scrollTo(0, 510)
        } else if (window.scrollY < 350){
            window.scrollTo(0, 350)
        }
    }

    if (event.target.matches(".userSettingsIcon")){
        window.location.href = "../userAccountSettings.php";
    }


})