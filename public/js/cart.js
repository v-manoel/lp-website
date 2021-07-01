$(document).ready(function(){

    var DIRPAGE="http://"+document.location.hostname+"/lapechincha"+"/";

    $('#just-add').on('click',function(event){
        event.preventDefault(); /* Não enviar formulario com refresh de pagina */

        var dados=$('#newItemForm').serialize(); /* Captura todos os dados */
        $.ajax({
            url: DIRPAGE+'cart/newItem/',
            method: 'post',
            dataType: 'html',
            data: dados
        });
        location.reload();
    });
});

function attItem(qnty){
    form = 'form-'+qnty.id;
    if(isNaN(qnty.value)){
        qnty.value = 1;
    }

    document.getElementById(form).submit();
}

function changeQnty(qnty_field,operation){
    qnty = document.getElementById(qnty_field);
    if(operation == "delete"){
        qnty.value = 0;
    
    }else if(operation == "add" && qnty.value < qnty.max){
        qnty.value = parseInt(qnty.value) + 1;
    
    }else if(operation == "remove" && qnty.value > 1){
        qnty.value = qnty.value - 1;
    }

    attItem(qnty);
}


