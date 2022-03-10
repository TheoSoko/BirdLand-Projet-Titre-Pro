document.addEventListener("click", action => {
    if (event.target.matches(".js-musicians-info")) {
        let musicians = event.target.dataset.musicians
        //musicianList = musicians.split(", ")
        //console.log(musicianList)
        if (musicians.length >= 3){
            console.log("oui")
            document.getElementById(musicians).style.display = "block"
            event.target.style.display = "none"
        }
    }
    })