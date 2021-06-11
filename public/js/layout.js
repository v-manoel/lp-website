$("#desk-header").hover(
    function() {
      $("#categorias").collapse('show');
    }
  );

$("#desk-header").click(function(){$("#categorias").collapse('hide');});