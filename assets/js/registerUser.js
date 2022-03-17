document.addEventListener("click", action => {
    if (event.target.matches("[name=registrationSubmit]")){
        if (emailRegistration.value && usernameRegistration.value && passwordRegistration.value){
            let xhr = new XMLHttpRequest()
            xhr.open("POST", "controllers/registerCtrl.php", true)
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            xhr.send("emailRegistration=" + emailRegistration.value + "&usernameRegistration=" + usernameRegistration.value + "&passwordRegistration=" + passwordRegistration.value)
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.response == false) {
                        console.log("Compu-Tron not happy. I will destroy your planet, you damn humans.")
                    }
                    if (xhr.response = 1) {
                        window.location.href = "../userProfile.php";
                        return
                    }
                    else {
                        let errorListJson = JSON.parse(xhr.response)
                        Object.entries(errorListJson).forEach(([key, value]) => {
                            console.log(key, value)
                            if (key.includes("Email")){
                                let errorEmail = document.createElement("p")
                                errorEmail.innerText = value
                                errorEmail.classList.add("text-danger", "fw-bold", "fs-5", "mx-2", "mt-2")
                                emailDivRegister.append(errorEmail)
                            }
                            if (key.includes("Username")){
                                let errorUsername = document.createElement("p")
                                errorUsername.innerText = value
                                errorUsername.classList.add("text-danger", "fw-bold", "fs-5", "mx-2", "mt-2")
                                usernameDivRegister.append(errorUsername)
                            }
                            if (key.includes("Password")){
                                let errorPassword = document.createElement("p")
                                errorPassword.innerText = value
                                errorPassword.classList.add("text-danger", "fw-bold", "fs-5", "mx-2", "mt-2")
                                registrationSubmit.classList.remove("my-4")
                                passwordDivRegister.append(errorPassword)
                            }
                            if (key.includes("existingUser")){
                                let existingUser = document.createElement("p")
                                existingUser.innerText = value
                                existingUser.classList.add("text-danger", "fw-bold", "fs-5", "mx-2", "mt-2", "mb-0", "pb-0")
                                registrationSubmit.classList.remove("my-4")
                                registrationForm.append(existingUser)
                            }
                          })

                        if (registrationModal.offsetHeight >= 660){
                            registrationModal.style.top = "3%"
                        }
                    } 
                }
            }
        }

    }

})