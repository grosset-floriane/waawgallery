function togglemenu() {
    var nav = document.getElementById("nav");
    nav.classList.toggle("open");
    var buttonMenu = document.getElementById("buttonMenu");
    buttonMenu.classList.toggle("toggled");
    if(buttonMenu.classList.contains("toggled")) {
        buttonMenu.ariaExpanded = true;
        buttonMenu.ariaLabel = "Close menu";
    } else {
        buttonMenu.ariaExpanded = false;
        buttonMenu.ariaLabel = "Open menu";
    }
    var mainHeader = document.getElementById("waaw-header");
    mainHeader.classList.toggle("open");
}