$(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('(00) 00000-0000');
  $('.cpf').mask('000.000.000-00');
  $('.money').mask('000.000.000.000,00');
});

$("#desk-header").hover(
    function() {
      $("#categorias").collapse('show');
    }
  );

$("#desk-header").click(function(){$("#categorias").collapse('hide');});


function SwitchImgSrc(source_img, target_img) {
  var target = document.getElementById(target_img); 
  var aux_src = source_img.src;
  source_img.src = target.src;
  target.src = aux_src;
}

function CollapseItem(collapser, collapsed) {
  collapser.getElementsByClassName(collapsed)[0].style.display = "none";
}
function UncollapseItem(collapser, collapsed) {
  collapser.getElementsByClassName(collapsed)[0].style.display = "block"
}

function launch_toast() {
  var x = document.getElementById("toast")
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
}

function closeMessage(close) {
  alert("ola");
  document.getElementById(close).hidden = true;
}