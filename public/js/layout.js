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