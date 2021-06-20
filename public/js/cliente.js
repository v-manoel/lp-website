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
