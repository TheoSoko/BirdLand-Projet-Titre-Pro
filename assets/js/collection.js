document.addEventListener("click", event1 => {
    if (event1.target.matches(".js-musicians-info")) {
        let musicians = event1.target.dataset.musicians
        //musicianList = musicians.split(", ")
        //console.log(musicianList)
        if (musicians.length >= 3){
            console.log("oui")
            document.getElementById(musicians).style.display = "block"
            event1.target.style.display = "none"
        }
        let previousEventTarget = event1.target
        document.addEventListener("click", event2 => {
            if (event2.target != previousEventTarget){
                document.getElementById(musicians).style.display = "none"
                previousEventTarget.style.display = "block"
            }
        })
    }
})