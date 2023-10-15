let pesquisa = document.querySelector("#input-pesquisa");
let secaoUser = document.querySelectorAll(".list-group-item");

pesquisa.addEventListener('input', function(e){

    let backspace = e.inputType;

    if( backspace ==="deleteContentBackward" ){

        if( pesquisa.value.length > 0 ){

            for(let i=0;i<secaoUser.length;i++){
                secaoUser[i].style.display = 'flex';
            }

            for(let i=0;i<secaoUser.length;i++){
    
                let stringContem = secaoUser[i].innerText.toUpperCase();
                let stringContida = pesquisa.value.toUpperCase();

                if( !(stringContem.includes(stringContida)) ){
                    
                    secaoUser[i].style.display = 'none';
                }
            }
    
        }
    
    }if( pesquisa.value.length > 0 ){

        for(let i=0;i<secaoUser.length;i++){

            let stringContem = secaoUser[i].innerText.toUpperCase();
            let stringContida = pesquisa.value.toUpperCase();

            if( !(stringContem.includes(stringContida)) ){
                
                secaoUser[i].style.display = 'none';
            }
        }

    }else{

        for(let i=0;i<secaoUser.length;i++){
            secaoUser[i].style.display = 'flex';
        }
    }

});