window.addEventListener('scroll', scrollFunc);
(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 57)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 57
  });

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 50) {
      $("#mainNav").addClass("navbar-shrink");
        $(".carousel-indicators").css("display","none");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
        $(".carousel-indicators").css("display","");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

  // Scroll reveal calls
  window.sr = ScrollReveal();
  sr.reveal('.sr-icons', {
    duration: 600,
    scale: 0.3,
    distance: '0px'
  }, 200);
  sr.reveal('.sr-button', {
    duration: 1000,
    delay: 200
  });
  sr.reveal('.sr-contact', {
    duration: 600,
    scale: 0.3,
    distance: '0px'
  }, 300);

  // Magnific popup calls
  $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1]
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
    }
  });

})(jQuery); // End of use strict


function scrollFunc() {
    var windowScroll = this.scrollY;

    var $carousel_cap = document.getElementsByClassName('carousel-caption');
    $carousel_cap[0].style.transform = 'translateY(-' + windowScroll/3.5 + 'px)';   
    $carousel_cap[1].style.transform = 'translateY(-' + windowScroll/3.5 + 'px)';   
    $carousel_cap[2].style.transform = 'translateY(-' + windowScroll/3.5 + 'px)'; 
    
    
//    var $backBird = document.getElementsByClassName('bg-primary')[0];
//    $backBird.style.transform = 'translateY(-' + windowScroll/3.5 + 'px)';
//    
//    var $backBird = document.getElementById("services");
//    $backBird.style.transform = 'translateY(-' + windowScroll/2.5 + 'px)'; 
//    
//    var $backBird = document.getElementById("categories");
//    $backBird.style.transform = 'translateY(-' + windowScroll/2.5 + 'px)';  
//    
//    var $backBird = document.getElementsByClassName('bg-dark text-white')[0];
//    $backBird.style.transform = 'translateY(-' + windowScroll/2.5 + 'px)';
//    
//    var $backBird = document.getElementById("contact");
//    $backBird.style.transform = 'translateY(-' + windowScroll/2.5 + 'px)';
//    
//
//    var $foreBird = document.getElementsByClassName('btn btn-primary btn-xl js-scroll-trigger')[0];
//    $foreBird.style.transform = 'translateY(-' + windowScroll/6 + 'px)';

}
