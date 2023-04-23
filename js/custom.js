// preloader
$(window).load(function(){
    $('.preloader').fadeOut(1000); // set duration in brackets    
});

$(function() {
    new WOW().init();
    $('.templatemo-nav').singlePageNav({
    	offset: 70
    });

    /* Hide mobile menu after clicking on a link
    -----------------------------------------------*/
    $('.navbar-collapse a').click(function(){
        //$(".navbar-collapse").collapse('hide');
    });
})
document.getElementById("acceso").addEventListener("click", function(){
    window.location.href = "https://shopbarrio.online/administracion/mostrar_productos";
});
