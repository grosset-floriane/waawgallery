function togglemenu() {
    var nav = document.getElementById("nav");
    nav.classList.toggle("open");
    var buttonMenu = document.getElementById("buttonMenu");
    buttonMenu.classList.toggle("toggled");
    var mainHeader = document.getElementById("waaw-header");
    mainHeader.classList.toggle("open");
}