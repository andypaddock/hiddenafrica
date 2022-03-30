//@prepros-prepend mixitup.min.js
//@prepros-prepend mixitup-multifilter.min.js
//@prepros-prepend mixitup-pagination.js
//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend owl.carousel.min.js
//@prepros-prepend readmore.js
//@prepros-prepend scrollreveal.js

jQuery(document).ready(function ($) {

  /* ADD CLASS ON SCROLL*/

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      $("body").addClass("scrolled");
    } else {
      $("body").removeClass("scrolled");
    }
  });


  /* TABBED CONTENT */

  $(document).ready(function () {
    if ($('.tabbed-section').length) {
      $(".tabbed-section__head--tab:nth-child(1)").addClass("active");
      $(".tabbed-section__body--item:nth-child(1)").addClass("visible");
    }
  });

  $(".tabbed-section__head--tab").click(function (e) {
    var selectedTab = $(this).attr("data-tab");
    $(".tabbed-section__head--tab.active").removeClass('active');
    $(this).addClass('active');
    $(".tabbed-section__body--item.visible").removeClass('visible');
    $(".tabbed-section__body--item." + selectedTab).addClass('visible');
  });

  // ============ Carousels

  $(".testimonial-carousel").owlCarousel({
    loop: true,
    margin: 48,
    center: true,
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayHoverPause: true,
    responsive: {
      0:{
        items:1,
        nav: false
      },
      600:{
        items:1,
        nav: false
      },
      1000:{
        items:1,
        nav: true,
        dots: false
      }
    }
  });

  $(".dest-slider").owlCarousel({
    loop: true,
    margin: 32,
    responsive: {
      0:{
        items:1,
        nav: false
      },
      600:{
        items:2,
        nav: false
      },
      1000:{
        items:3,
        nav: true,
        dots: false
      }
    }
  });
  $(".signature-itins").owlCarousel({
    loop: true,
    margin: 32,
    responsive: {
      0:{
        items:1,
        nav: false
      },
      600:{
        items:2,
        nav: false
      },
      1000:{
        items:3,
        nav: true,
        dots: false
      }
    }
  });
  $(".prop-slider").owlCarousel({
    loop: true,
    margin: 48,
    center: true,
    navText: ["<div class='nav-button owl-prev'><i class='fal fa-chevron-left'></i></div>","<div class='nav-button owl-next'><i class='fal fa-chevron-right'></i></div>"],
    responsive: {
      0:{
        items:1,
        nav: false
      },
      600:{
        items:1,
        nav: false
      },
      1000:{
        items:1,
        nav: true,
        dots: false
      }
    }
  });
  $(".itin-slider").owlCarousel({
    loop: true,
    margin: 32,
    navText: ["<div class='nav-button owl-prev'><i class='fal fa-chevron-left'></i></div>","<div class='nav-button owl-next'><i class='fal fa-chevron-right'></i></div>"],
    responsive: {
      0:{
        items:1,
        nav: false
      },
      600:{
        items:2,
        nav: false
      },
      1000:{
        items:3,
        nav: true,
        dots: false
      }
    }
  });

  // ========== Controller for lightbox elements

$('#parent').magnificPopup({
  delegate: 'a',
  type: 'image',
  gallery: {
    enabled: true
  }
});

$('.map-image').magnificPopup({
  delegate: 'a',
  type: 'image',
  
});

$('.image-popup-vertical-fit').magnificPopup({
  type: 'image',
  closeOnContentClick: true,
  mainClass: 'mfp-img-mobile',
  image: {
    verticalFit: true
  }
  
});

$('.image-popup-no-margins').magnificPopup({
  type: 'image',
  closeOnContentClick: true,
  closeBtnInside: false,
  fixedContentPos: true,
  mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
  image: {
    verticalFit: true
  },
  zoom: {
    enabled: true,
    duration: 300 // don't foget to change the duration also in CSS
  }
});

$(".toggle-block label").click(function () {
  var otherLabels = $(this).parent().siblings(".item").find("label");
  otherLabels.removeClass("collapsed");
  otherLabels.next().slideUp();
  $(this).toggleClass("collapsed");
  $(this).next().slideToggle();
});



  new Readmore('article', {
    collapsedHeight: 96,
  });

  new Readmore('.readmore', {
    collapsedHeight: 180,
  });

  new Readmore('.staffreadmore', {
    collapsedHeight: 120,
  });


  // SIDEBAR MOBILEMENU

  $(document).ready(function () {

    function toggleSidebar() {
      $(".navbutton").toggleClass("active");
      $("main").toggleClass("move-to-left");
      $(".sidebar-item").toggleClass("active");
    }

    $(".navbutton").on("click tap", function () {
      toggleSidebar();
    });

    // $(document).keyup(function(e) {
    //   if (e.keyCode === 27) {
    //     toggleSidebar();
    //   }
    // });

  });

  // var mixer = mixitup('.filter-grid');
  var containerEl = document.querySelector('.filter-grid');
var mixer;

if (containerEl) {
    mixer = mixitup(containerEl, {
      multifilter: {
        enable: true
    }
         
    });
}

// var mixer = mixitup('.multi-grid', {
//   multifilter: {
//       enable: true
//   }
// });




  // ACCORDIAN SINGLE ITEM ONLY

  $(document).ready(function () {
    $('.block__title').click(function (event) {
      if ($('.block').hasClass('one')) {
        $('.block__title').not($(this)).removeClass('active');
        $('.block__text').not($(this).next()).slideUp(300);
      }
      $(this).toggleClass('active').next().slideToggle(300);
    });

  });



  var slideLeft = {
  distance: '40px',
  origin: 'left',
  opacity: 0.0,
  duration: 1000,
  delay:250,
  mobile:false,
  };
  var slideRight = {
  distance: '40px',
  origin: 'right',
  opacity: 0.0,
  duration: 1000,
  mobile:false,
  };
  var slideDown = {
  distance: '40px',
  origin: 'top',
  opacity: 0.0,
  duration: 1000,
  mobile:false,
  };
  var slideUp = {
  distance: '40px',
  origin: 'bottom',
  opacity: 0.0,
  duration: 1000,
  mobile:false,
  };
  var tileDown = {
  distance: '40px',
  origin: 'top',
  opacity: 0.0,
  duration: 1000,
  mobile:false,
  interval:40,
  };
  
  ScrollReveal().reveal('.fmleft', slideLeft);
  ScrollReveal().reveal('.fmtop', slideDown);
  ScrollReveal().reveal('.fmbottom', slideUp);
  ScrollReveal().reveal('.fmright', slideRight);
  ScrollReveal().reveal('.tile', tileDown);
  ScrollReveal().reveal('.row-default', slideRight);
  ScrollReveal().reveal('.row-reverse', slideLeft);
  

  $('.expvideo').parent().click(function () {
    if($(this).children(".expvideo").get(0).paused){
              $(this).children(".expvideo").get(0).play();   
              $(this).children(".playpause").fadeOut();
              document.querySelector(".wrapper").classList.add("expanded")
      }else{       
        $(this).children(".expvideo").get(0).pause();
    $(this).children(".playpause").fadeIn();
    document.querySelector(".wrapper").classList.remove("expanded")
      }
  });

  $(document).ready(function(){
    $(".limit-four").slice(0, 4).show();
    $("#loadMore").on("click", function(e){
      e.preventDefault();
      $(".limit-four:hidden").slice(0, 4).slideDown();
      if($(".limit-four:hidden").length == 0) {
        $("#loadMore").text("No Content").addClass("noContent");
      }
    });
    
  });

  $(".limit-six")
  .slice(0, 6)
  .show();
$(".limit-six:hidden").css("opacity", 0);
$("#viewAll").on("click", function(e) {
  $(".limit-six:hidden") // Added :hidden
    .slice(0, 5)
    .slideDown("slow")
    .animate(
      {
        opacity: 1
      },
      {
        queue: false,
        duration: "slow"
      }
    );
  // We need to check the count of just the hidden items
  if ($(".limit-six:hidden").length == 0) {
    $("#viewAll").fadeOut("slow");
  }
  e.preventDefault();
});


  $(document).ready(function () {
  
    'use strict';
    
     var c, currentScrollTop = 0,
         navbar = $('#navbar');
  
     $(window).scroll(function () {
        var a = $(window).scrollTop();
        var b = navbar.height();
       
        currentScrollTop = a;
       
        if (c < currentScrollTop && a > b + b) {
          navbar.addClass("scrollUp");
        } else if (c > currentScrollTop && !(a <= b)) {
          navbar.removeClass("scrollUp");
        }
        c = currentScrollTop;
    });
    
  });

  $(".map-link").click(function(){
    $(".map-hero").addClass("visible")
  });
  $(".map-close").click(function(){
    $(".map-hero").removeClass("visible")
  });



}); //Don't remove ---- end of jQuery wrapper



