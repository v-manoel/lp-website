
const vslider = $('.vertical-items-carousel');
vslider.slick({
    dots: false,
    arrows: false,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    vertical: true,
    responsive: [
      {
        breakpoint: 990,
        settings: {
          vertical: false,
          slidesToShow: 5,
          slidesToScroll: 1,

        }
      },
      {
        breakpoint: 600,
        settings: {
          vertical: false,
          slidesToShow: 3,
          slidesToScroll: 1,
          vertical: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          vertical: false,
          slidesToShow: 2,
          slidesToScroll: 1,
          vertical: false
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
  
  vslider.on('wheel', (function(e) {
    e.preventDefault();
  
    if (e.originalEvent.deltaY < 0) {
      $(this).slick('slickNext');
    } else {
      $(this).slick('slickPrev');
    }
  }));
  
  function CollapseItem(collapser, collapsed) {
    collapser.getElementsByClassName(collapsed)[0].style.display = "none";
  }
  function UncollapseItem(collapser, collapsed) {
    collapser.getElementsByClassName(collapsed)[0].style.display = "block"
  }
  
  