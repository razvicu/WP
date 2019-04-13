$(document).ready(() => {
    let menu = document.getElementsByClassName("menu")[0];
    let dropdownmenu = document.getElementsByClassName("dropdown-menu")[0];

    menu.addEventListener("mouseenter", () => {
        dropdownmenu.style.display = "block";
    })
    menu.addEventListener("mouseleave", () => {
        dropdownmenu.style.display = "none";
    })

    let dropdownable = document.getElementsByClassName("dropdownable");
    
    Array.prototype.slice.call(dropdownable).forEach(function(element) {
        console.log(element.children[1]);
        
        element.addEventListener("mouseenter", function() {
            this.children[1].style.display = "block";
        })

        element.addEventListener("mouseleave", function() {
            this.children[1].style.display = "none";
        })
    });
})