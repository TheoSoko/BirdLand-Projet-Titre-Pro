document.addEventListener("click", action => {
    if (event.target.matches("[name=logoutButton]")){
        let xhr = new XMLHttpRequest()
        xhr.open("POST", "controllers/logoutCtrl.php", true)
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhr.send("logout=logout")
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.response == false) {
                    console.log("Compu-Tron not happy. I will destroy your planet, you damn humans.")
                }
                if (xhr.response == 1) {
                    console.log("OK.")
                }
            }
        }
    }
})