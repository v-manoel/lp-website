$(function () {
    $('.selectpicker').selectpicker({});
    
    
    $('.selectpicker').on('changed.bs.select', function(e) {
      console.log('Value is: ' + this.options[this.selectedIndex].value +
                  ' Text is: ' + this.options[this.selectedIndex].textContent);
    });
  });