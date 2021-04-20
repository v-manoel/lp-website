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
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
  });
});