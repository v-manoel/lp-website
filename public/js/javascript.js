$(document).ready(function(){

    var DIRPAGE="http://"+document.location.hostname+"/la-pechincha"+"/";

    $('#FormSelect').on('submit',function(event){
        event.preventDefault(); /* Não enviar formulario com refresh de pagina */
        var dados=$(this).serialize(); /* Captura todos os dados */
        $.ajax({
            url: DIRPAGE+'cadastro/seleciona',
            method: 'post',
            dataType: 'html',
            data: dados,
            success: function(dados){
                $('.Resultado').html(dados);
            }
        });
    });
    
    $(document).on('click','.imgEdit',function(){
        var ImgRel=$(this).attr('rel');

        $.ajax({
            url: DIRPAGE+'cadastro/getDbData/'+ImgRel,
            method: 'post',
            dataType: 'html',
            data: {'Id':ImgRel},
            success: function(dados){
                $('.ResultadoFormulario').html(dados);
            }
        });
    })

});

