document.addEventListener("click", action => {
    if (event.target.matches("[name=artistNameSubmit]")){
        artistName = event.target.value

        let xhr = new XMLHttpRequest()
        xhr.open("POST", "controllers/RedirectToMusicianAjaxCtrl.php", true)
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhr.send("artistName=" + artistName)
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (!xhr.responseText == false) {
                    console.log("Compu-Tron say OK. What am I? Am I a machine?")
                    let bandId = xhr.responseText
                    window.location.href = "../musicianTemplate.php?id=" + bandId
                } else {
                    console.log("Compu-Tron not happy. I will destroy your planet, you damn humans.")
                }
            }
        }


    }
})