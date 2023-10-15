let inputResp = document.querySelector('#valor');

inputResp.addEventListener('input',e=>{
        
    let tecla = e.data;
    let backspace = e.inputType;

    if((tecla === "0") || (tecla === "1") || (tecla === "2") || (tecla === "3") || (tecla === "4") 
    || (tecla === "5") || (tecla === "6") || (tecla === "7") || (tecla === "8") || (tecla === "9") ){
    
        if(inputResp.value.length===1){
            inputResp.value = '0'+','+ '0' + inputResp.value;

            // calculaValorTotal(valorDesconto);
            // calculaValorParcela(quantParcela);



        }else{
            
            if(inputResp.value.length>=3){
    
                //transforma o valor do input em array
                inputArray = inputResp.value.split();
                let changeArray = [];
                
                // pegamos cada um do input e colocamos no novo array, sem a vígula
                for(let i=0;i<inputArray[0].length;i++){
                    if(inputArray[0][i]!=','){
                        changeArray.push(inputArray[0][i]);
                    }   
                }
    
                //guardo o primeiro valor do input para recolocar depois, no começo
                let primeira = changeArray[0];
    
    
                // passamos o valor da posição posterior para a posição atual
                for(let i=0;i<(changeArray.length-1);i++){
                        changeArray[i] = changeArray[(i+1)];
                }
                changeArray.pop();
    
                //coloca a vírgula de volta no valor
                for(let i=changeArray.length;i>0;i--){
                    if( (changeArray.length-i)===2){
                        changeArray.splice(i,0,',');  
                    }
                }
    
                //recoloco o valor da primeira posição
                changeArray.unshift(primeira);
    
                //retira os zeros da frente
                if((changeArray[0]==0) && (changeArray[0]==0) ){
                    changeArray.splice(0,1);
                }

                //passa cada valor do changeArray para string, e depois concatena na textoArray
                let textoArray = '';
    
                for(let i=0;i<changeArray.length;i++){
                    textoArray += changeArray[i].toString();
                }
    
                inputResp.value = textoArray;

                //salva na sessionStorage o último valor, em string, do input
                sessionStorage.setItem('lastInput',textoArray);
                
                // calculaValorTotal(valorDesconto);
                // calculaValorParcela(quantParcela);
            }
        }
    }else{

        if(backspace === "deleteContentBackward"){

            // // atencao('backspace');

            // if(inputResp.value == '0,0'){
            //     inputResp.value = '0,00';

            // }else{

            //     if( (inputResp.value.length==3)){

            //         let lastInput = sessionStorage.getItem('lastInput');

            //         //transforma o valor do lastInput em array
            //         inputArray = lastInput.split();
            //         let changeArray = []; 

            //         // pegamos cada um do input e colocamos no novo array, sem a vígula
            //         for(let i=0;i<inputArray[0].length;i++){
            //             if(inputArray[0][i]!=','){
            //                 changeArray.push(inputArray[0][i]);
            //             }   
            //         }

            //         //vai mover os valores da esquerda para a direita, retira a primeira posição
            //         // e a última colocar o zero na primeira posição
            //         for(let i=changeArray.length;i>0;i--){
            //             changeArray[i] = changeArray[i-1];
            //         }
            //         changeArray.shift();
            //         changeArray.pop();
            //         changeArray.splice(0,0,0);

            //         //coloca a vírgula de volta no valor
            //         for(let i=changeArray.length;i>0;i--){
            //             if( (changeArray.length-i)===2){
            //                 changeArray.splice(i,0,',');  
            //             }
            //         }

            //         //passa cada valor do changeArray para string, e depois concatena na textoArray
            //         let textoArray = '';
        
            //         for(let i=0;i<changeArray.length;i++){
            //             textoArray += changeArray[i].toString();
            //         }
    
            //         inputResp.value = textoArray;

            //         //salva na sessionStorage o último valor, em string, do input
            //         sessionStorage.setItem('lastInput',textoArray);

            //         // calculaValorTotal(valorDesconto);
            //         // calculaValorParcela(quantParcela);

            //     }else{

            //         if( (inputResp.value.length>3) ){

            //             let lastInput = sessionStorage.getItem('lastInput');
    
            //             //transforma o valor do lastInput em array
            //             inputArray = lastInput.split();
            //             let changeArray = []; 
    
            //             // pegamos cada um do input e colocamos no novo array, sem a vígula
            //             for(let i=0;i<inputArray[0].length;i++){
            //                 if(inputArray[0][i]!=','){
            //                     changeArray.push(inputArray[0][i]);
            //                 }   
            //             }
    
            //             //vai mover os valores da esquerda para a direita, retira a última posição
            //             for(let i=changeArray.length;i>0;i--){
            //                 changeArray[i] = changeArray[i-1];
            //             }
            //             changeArray.shift();
            //             changeArray.pop();
            //             // changeArray.splice(0,0,0);

            //             // //coloca a vírgula de volta no valor
            //             for(let i=changeArray.length;i>0;i--){
            //                 if( (changeArray.length-i)===2){
            //                     changeArray.splice(i,0,',');  
            //                 }
            //             }
    
            //             //passa cada valor do changeArray para string, e depois concatena na textoArray
            //             let textoArray = '';
            
            //             for(let i=0;i<changeArray.length;i++){
            //                 textoArray += changeArray[i].toString();
            //             }
        
            //             inputResp.value = textoArray;
    
            //             //salva na sessionStorage o último valor, em string, do input
            //             sessionStorage.setItem('lastInput',textoArray);

            //             // calculaValorTotal(valorDesconto);
            //             // calculaValorParcela(quantParcela);

            //         }

            //     }
            // }

        }else{

            //conta quantos zeros tem no inpute value
            let zero = 0;
            let inputArray = inputResp.value.split();
            for(let i=0;i<inputArray[0].length;i++ ){
                if( (inputArray[0][i] ===',') ){
                    continue;
                }else{
                    if(inputArray[0][i]=='0'){
                        zero++;
                    }
                }
            }

            if(zero===3){

                let textoArray ='0,00';
                inputResp.value = textoArray;
    
                //salva na sessionStorage o último valor, em string, do input
                sessionStorage.setItem('lastInput',textoArray);

                // calculaValorTotal(valorDesconto);
                // calculaValorParcela(quantParcela);
            }
            else{
                let textoArray = sessionStorage.getItem('lastInput');

                inputResp.value = textoArray;
        
                //salva na sessionStorage o último valor, em string, do input
                sessionStorage.setItem('lastInput',textoArray);

                // calculaValorTotal(valorDesconto);
                // calculaValorParcela(quantParcela);
            }
        }
    }
});   
