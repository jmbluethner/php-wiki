function openDrawerMenu(){
    var nav = document.getElementById('mainNavBar');
    var x = document.getElementById("mainNavBar");
    if (x.className === "navBar"){
        x.className += " responsive";
        nav.style.backgroundColor = 'rgb(10,10,10)';
        tintNavbar();
    } else {
        x.className = "navBar";
        nav.style.backgroundColor = 'transparent';
        tintNavbar();
    }
}
window.onscroll = function() {
    tintNavbar();
}
function checkPagePos() {
    if(window.scrollY!=0) {
        return true;
    }
}
function tintNavbar() {
    var nav = document.getElementById('mainNavBar');
    if(checkPagePos()) {
        nav.style.backgroundColor = 'rgb(10,10,10)';
    } else {
        var x = document.getElementById("mainNavBar");
        if (x.className === "navBar"){
            nav.style.backgroundColor = 'transparent';
        }
    }
}
