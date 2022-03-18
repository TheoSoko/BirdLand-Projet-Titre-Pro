document.addEventListener("click", action => {
    if (event.target.matches(".js-close-form") || !event.target.closest("#loginModal, #logoutModal") ) {
        loginModal.style.display = "none"
        logoutModal.style.display = "none"
    }
    if (event.target.matches("#loginButton")){
        loginModal.style.display = "block"
    }
    if (event.target.matches("#logoutButton")){
        logoutModal.style.display = "block"
    }
})