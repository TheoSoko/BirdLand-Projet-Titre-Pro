document.addEventListener("click", e => {
    if (e.target.matches(".js-close-form") || !event.target.closest("#loginModal, #logoutModal") ) {
        loginModal.style.display = "none"
        logoutModal.style.display = "none"
    }
    if (e.target.matches("#loginButton")){
        loginModal.style.display = "block"
    }
    if (e.target.matches("#logoutButton")){
        logoutModal.style.display = "block"
    }
})