$('nav a').click(function(e){

    var id = $(this).attr('href');
        targetOffset = $(id).offset().top,
        menuHeight = $('nav').innerHeight();

    
    $('html, body').animate({
        scrollTop: targetOffset - menuHeight
    }, 300);

    
    
});


var valor = document.querySelector('.valor');
var parcela = document.querySelector('.parcela');



valor.addEventListener("keyup", (event) => {
    parcela.disabled = valor.value.trim().length > 0
})

parcela.addEventListener("keyup", (event) => {
    valor.disabled = parcela.value.trim().length > 0
})
