const regexUsername = new RegExp(/^[\wÀ-ÖØ-öø-ÿ\-]{1,50}$/)
const regexPassword = new RegExp(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&µ£\/\\~|\-])[\wÀ-ÖØ-öø-ÿ@$!%*#?&µ£\/\\~|\-]{8,70}$/)


document.addEventListener("focusout", e =>{
    if (e.target.matches("[name=usernameRegistration]") && e.target.value.length > 0){
        let existingErrorUsername = document.getElementById("errorUsername")
        if (!regexUsername.test(e.target.value)){
            if (existingErrorUsername == null){
                let errorUsername = document.createElement("p")
                errorUsername.id = "errorUsername"
                errorUsername.classList.add("text-danger", "fw-bold", "fs-5", "mt-3")
                errorUsername.innerText = "Le nom d\'utilisateur ne peut contenir que des lettres, chiffres, et tirets"
                usernameDivRegister.append(errorUsername)
            }
            return
        }
        if (regexUsername.test(e.target.value) && existingErrorUsername !== null){
            existingErrorUsername.remove()
        }
    }
    if (e.target.matches("[name=passwordRegistration]") && e.target.value.length > 0){
        let existingErrorPassword = document.getElementById("errorPassword")
        if (!regexPassword.test(e.target.value)){
            if (existingErrorPassword == null){
            let errorPassword = document.createElement("p")
            errorPassword.id = "errorPassword"
            errorPassword.classList.add("text-danger", "fw-bold", "fs-5", "mt-3")
            errorPassword.innerText = "Le mot de passe doit contenir au moins une lettre, un chiffre, et un caractère spécial, et doit comporter au moins 8 caractères"
            passwordDivRegister.append(errorPassword)
            }
            return
        } 
        if (regexPassword.test(e.target.value) && existingErrorPassword !== null){
            existingErrorPassword.remove()
        }
    }
})