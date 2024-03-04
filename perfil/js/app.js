//Seleccion de elementos
const toggle = document.querySelector(".toggle")
const menuDashboard = document.querySelector(".menu-dashboard")
const iconoMenu = toggle.querySelector("i")
const enlacesMenu = document.querySelectorAll(".enlace")

//Evento click
toggle.addEventListener("click", () => {
    // Alterna la clase "open" en el elemento con la clase "menu-dashboard"
    menuDashboard.classList.toggle("open")

    // Si el icono tiene la clase "bx-menu"
    if(iconoMenu.classList.contains("bx-menu")){
        // Reemplaza la clase "bx-menu" con "bx-x"
        iconoMenu.classList.replace("bx-menu", "bx-x")
    } else {
        // De lo contrario, reemplaza la clase "bx-x" con "bx-menu"
        iconoMenu.classList.replace("bx-x", "bx-menu")
    }
})

// Para cada elemento con la clase "enlace"
enlacesMenu.forEach(enlace => {
    // Añade un evento de click
    enlace.addEventListener("click", () => {
        // Añade la clase "open" al elemento con la clase "menu-dashboard"
        menuDashboard.classList.add("open")
        // Reemplaza la clase "bx-menu" con "bx-x" en el icono
        iconoMenu.classList.replace("bx-menu", "bx-x")
    })
})
