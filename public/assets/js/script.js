
window.onscroll = function() {
    const button = document.getElementById('ir-arriba');
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        button.style.display = "flex"; 
    } else {
        button.style.display = "none";
    }
};
document.getElementById('ir-arriba').onclick = function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' 
    });
};
     

        