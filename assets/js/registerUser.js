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
                    if (xhr.response == 1) {
                        window.location.href = "../userProfile.php"
                    }
                    else {
                        errorEmailNode = document.getElementById("errorEmail")
                        errorUsernameNode = document.getElementById("errorUsername")
                        errorPasswordNode = document.getElementById("errorPassword")
                        existingUserNode = document.getElementById("existingUser")

                        let errorListJson = JSON.parse(xhr.response)
                        console.log(errorListJson)
                        Object.entries(errorListJson).forEach(([key, value]) => {


                            //Message d'erreur pour l'email
                            if (key.includes("Email")){
                                if (!errorEmailNode){
                                    let errorEmail = document.createElement("p")
                                    errorEmail.innerText = value
                                    errorEmail.id = "errorEmail"
                                    errorEmail.classList.add("text-danger", "fw-bold", "fs-5", "mx-2", "mt-2")
                                    emailDivRegister.append(errorEmail)
                                }
                            }  else if (errorEmailNode){
                                errorEmailNode.remove()
                            } 
                            //Message d'erreur pour le nom d'utilisateur
                            if (key.includes("Username")){
                                if (!errorUsernameNode){
                                let errorUsername = document.createElement("p")
                                errorUsername.innerText = value
                                errorUsername.id = "errorUsername"
                                errorUsername.classList.add("text-danger", "fw-bold", "fs-5", "mx-2", "mt-2")
                                usernameDivRegister.append(errorUsername)
                                } 
                            } else if (errorUsernameNode){
                                errorUsername.remove()
                            } 
                            //Message d'erreur pour le mot de passe
                            if (key.includes("Password")){
                                if (!errorPasswordNode){
                                let errorPassword = document.createElement("p")
                                errorPassword.innerText = value
                                errorPassword.id = "errorPassword"
                                errorPassword.classList.add("text-danger", "fw-bold", "fs-5", "mx-2", "mt-2")
                                registrationSubmit.classList.remove("my-4")
                                passwordDivRegister.append(errorPassword)
                                }
                            } else if (errorPasswordNode){
                                errorPasswordNode.remove()
                            }
                            //Message d'erreur si un compte existe déjà
                            if (key.includes("existingUser")){
                                if (!existingUserNode){
                                let existingUser = document.createElement("p")
                                existingUser.innerText = value
                                existingUser.id = "existingUser"
                                existingUser.classList.add("text-danger", "fw-bold", "fs-5", "mx-2", "mt-2", "mb-0", "pb-0")
                                registrationSubmit.classList.remove("my-4")
                                registrationForm.append(existingUser)
                                }
                            } else if (existingUserNode){
                                existingUserNode.remove()
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