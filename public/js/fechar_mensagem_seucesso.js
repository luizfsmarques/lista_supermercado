let alerta = document.querySelector('#alerta-sucesso');
let xis = document.querySelector('#fechar-sucesso');


xis.addEventListener('click', function(e){

    alerta.style.visibility = 'hidden';
    alerta.style.position = 'absolute';
    alerta.style.top = '-1000px';


});