const campo1 = document.querySelector(".campo1");
const campo2 = document.querySelector(".campo2");
const campo3 = document.querySelector(".campo3");
var resultado

campo1.addEventListener("keyup", (event) => {
    var clean = event.target.value.replace(/[^0-9,]*/g, '').replace(',', '.')
    resultado = clean * 0.3
    campo3.value = resultado.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

})

campo2.addEventListener("keyup", (event) => {
    var clean2 = event.target.value.replace(/[^0-9,]*/g, '').replace(',', '.')
    var result = resultado - clean2
    var convert = result.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
   if(campo1 != ""){
       campo3.value = convert
   }
})




