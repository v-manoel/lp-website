 function checkLoginUpdateFields(){
    if(!(document.getElementById("npswd").value == document.getElementById("npswd_check").value) ){
        alert("As novas senhas inseridas não conferem!");
        document.getElementById("npswd_check").value = "";
        document.getElementById("npswd").value = "";
        return false;
    }
    return true;

}
 

function showPassword(toggler, toggled){
    document.getElementById(toggled).setAttribute('type','password');
    toggler.classList.toggle('bi-eye');
    toggler.classList.add('bi-eye-slash');

}

function HidePassword(toggler, toggled){
    document.getElementById(toggled).setAttribute('type','text');
    toggler.classList.toggle('bi-eye-slash');
    toggler.classList.add('bi-eye');

}

function confirmDeleteAccount() {
    var pswd = prompt("Digite sua senha para confirmar");
    if (pswd != null && pswd != "" ) {
        document.getElementById("del_pswd").value = pswd;
        return true;
    }
    return false;
  }

$(document).ready(function(){

    var DIRPAGE="http://"+document.location.hostname+"/lapechincha"+"/";

    $('#state').on('change',function(){
        var stateID = $(this).val();

        $.ajax({
            url: DIRPAGE+'account/ajaxCall/',
            method: 'post',
            dataType: 'html',
            data: {'state_id':stateID},
            success: function(dados){
                $('#city').html(dados);
            }
        });
    });
});

function cardOption(card){
    if(card.getElementsByClassName("edittype")[0].hidden){
        card.getElementsByClassName("number")[0].hidden = true;
        card.getElementsByClassName("data")[0].hidden = true;
        card.getElementsByClassName("edittype")[0].hidden = false;
    }else{
        card.getElementsByClassName("number")[0].hidden = false;
        card.getElementsByClassName("data")[0].hidden = false;
        card.getElementsByClassName("edittype")[0].hidden = true; 
    }
}

$('#card-holder').on('input', function() {
    $('#model-name').html($('#card-holder').val());
  });

$('#card-expiration').on('input', function() {
    var data = $('#card-expiration').val();
    data = data.substr(5,2) + '/' + data.substr(2,2);
    
    $('#model-date').html(data);
});

$('#card-number').on('input', function() {
    var data = $('#card-number').val();
    if(data.length <= 3)
        $('#num-3').html(data);
    else if(data.length <= 6)
        $('#num-6').html(data.substr(3,5));
    else if(data.length <= 9)
        $('#num-9').html(data.substr(6,8));
    else if(data.length <= 12)
        $('#num-12').html(data.substr(9,11));
});