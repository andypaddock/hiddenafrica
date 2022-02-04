//@prepros-prepend mixitup.min.js
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
    nav: true,
    dots: false,
    items: 1,
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayHoverPause: true,
  });

  $(".dest-slider").owlCarousel({
    loop: true,
    margin: 48,
    center: true,
    nav: true,
    dots: false,
    items: 3,
  });
  $(".prop-slider").owlCarousel({
    loop: true,
    margin: 48,
    center: true,
    nav: true,
    navText: ["<div class='nav-button owl-prev'><i class='fal fa-chevron-left'></i></div>","<div class='nav-button owl-next'><i class='fal fa-chevron-right'></i></div>"],
    dots: false,
    items: 1,
  });
  $(".itin-slider").owlCarousel({
    loop: true,
    margin: 48,
    nav: true,
    dots: false,
    items: 3,
  });

  // ========== Controller for lightbox elements

$('#parent').magnificPopup({
  delegate: 'a',
  type: 'image',
  gallery: {
    enabled: true
  }
});

$('.map-item .image').magnificPopup({
  delegate: 'a',
  type: 'image',
  gallery: {
    enabled: true
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
    collapsedHeight: 100,
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
         
    });
}




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
  reset:true,
  duration: 1000,
  delay:250,
  mobile:false,
  };
  var slideRight = {
    distance: '40px',
    origin: 'right',
    opacity: 0.0,
  reset:true,
  duration: 1000,
  mobile:false,
  };
  var slideDown = {
    distance: '40px',
    origin: 'top',
    opacity: 0.0,
  reset:true,
  duration: 1000,
  mobile:false,
  };
  var slideUp = {
    distance: '40px',
    origin: 'bottom',
    opacity: 0.0,
  reset:true,
  duration: 1000,
  mobile:false,
  };
  var tileDown = {
    distance: '40px',
    origin: 'top',
    opacity: 0.0,
  reset:true,
  duration: 1000,
  mobile:false,
  interval:40,
  };
  
  ScrollReveal().reveal('.fmleft', slideLeft);
  ScrollReveal().reveal('.fmtop', slideDown);
  ScrollReveal().reveal('.fmbottom', slideUp);
  ScrollReveal().reveal('.fmright', slideRight);
  ScrollReveal().reveal('.tile', tileDown);
  

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
    
  })




}); //Don't remove ---- end of jQuery wrapper



