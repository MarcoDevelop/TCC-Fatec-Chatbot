function PLACA(placa){ 

    if(placa.value.length == 3){
        placa.value = placa.value + '-'; 
    }

}

function CEP(cep){ 

    if(cep.value.length == 5){
        cep.value = cep.value + '-'; 
    }

}

function TEL(telefone){ 

    if(telefone.value.length == 5){
        telefone.value = '-' + telefone.value; 
    }

}

function CPF(cpf){

    if(cpf.value.length == 3){
        cpf.value = cpf.value + '.'; 
    }

    if(cpf.value.length == 7){
        cpf.value = cpf.value + '.'; 
    }

    if(cpf.value.length == 11){
        cpf.value = cpf.value + '-'; 
    }

}