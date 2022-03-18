document.addEventListener("click", action =>{
    if (event.target.matches("[name=loginSubmit]")){
        if (emailOrUsernameLogin.value && passwordLogin.value){
            let xhr = new XMLHttpRequest()
            xhr.open("POST", "controllers/loginCtrl.php", true)
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            xhr.send("emailOrUsernameLogin=" + emailOrUsernameLogin.value + "&passwordLogin=" + passwordLogin.value)
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.response == false) {
                        console.log("Compu-Tron not happy. I will destroy your planet, you damn humans.")
                    }
                    else if (xhr.responseText == 'OK') {
                        window.location.href = "../userProfile.php"
                    } else {
                        alert(xhr.responseText)
                    }
                }
            } 
        }
    }
})