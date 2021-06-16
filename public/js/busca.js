$(function () {
    $('.selectpicker').selectpicker({});
    
    
    $('.selectpicker').on('changed.bs.select', function(e) {
      console.log('Value is: ' + this.options[this.selectedIndex].value +
                  ' Text is: ' + this.options[this.selectedIndex].textContent);
    });
  });

  
/* Sidebar */
$(document).ready(function () {
  $("#sidebar").mCustomScrollbar({
      theme: "minimal"
  });

  $('#dismiss, .overlay').on('click', function () {
      $('#sidebar').removeClass('active');
      $('.overlay').removeClass('active');
  });

  $('#sidebarCollapse').on('click', function () {
      $('#sidebar').addClass('active');
      $('.overlay').addClass('active');
      
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
  });
});


/* Onload functions */
var url = new URL(window.location.href)
document.onload = pickSelectOption(url.searchParams.get("orderby"));

/* set orderby value as selected option */
function pickSelectOption($pick_name){
  document.getElementById("select_orderby").value = $pick_name
}

function changeLabelColor(prefix,id){


  if(document.getElementById(prefix+id).checked) {
      document.getElementById(prefix+id+'pill').style.backgroundColor= "#f6c532";
      document.getElementById(prefix+id+'pill').style.color= "#2b2b2b";
    }else{
      document.getElementById(prefix+id+'pill').style.backgroundColor= "#2b2b2b";
      document.getElementById(prefix+id+'pill').style.color= "#FFFFFF";
    }
}
