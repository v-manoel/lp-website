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
