(function ($) {
  "use strict;"
  
  $(document).ready(function() {
    var nestor_base_url = Drupal.settings['settings']['nestor_base_url'];
    
    $(".switcher .link").click(function() {

      if ($(".switcher .themeOptions").css("display") === "none") {
        $(".switcher .themeOptions").css("display", "block"); 
        $(".switcher .title").css("display", "block"); 
      } else {
        $(".switcher .themeOptions").css("display", "none");
        $(".switcher .title").css("display", "none");
      }
      
    })
    
    // Theme color
    $('.themeColors li a').click(function() {
      var themeColor = $(this).attr('class');

      $('#themeColor').remove();
      $('body').append('<link rel="stylesheet" href="' + nestor_base_url + '/sites/all/themes/nestor/css/color/' + themeColor + '.css" id="themeColor">');
    });

    // Theme layout
    $('.themeLayout').change(function() {
      if($(this).val() == "boxed") {
        $('.main-wrapper').addClass('boxed');
        $('body').addClass('bg-pattern-cross_scratches');
      }
      else {
        $('.main-wrapper').removeClass('boxed');
      }
    });

    // Header
    $('.header-style').change(function() {
      if ($(this).val() == "header-1") {
        $('header').removeClass('header-2');
        $('header').addClass('header-1');
        $('#logo-region').addClass('col-md-3');
        $('#logo-region').removeClass('text-center');
        $('#logo-region').addClass('text-center-sm');
        $('#menu-region').addClass('col-md-9');
        $('.nestor-main-menu > .navbar-collapse > ul').addClass('navbar-right');
      } else if ($(this).val() == "header-2") {
        $('header').removeClass('header-1');
        $('header').addClass('header-2');
        $('#logo-region').removeClass('col-md-3');
        $('#logo-region').removeClass('text-center-sm');
        $('#logo-region').addClass('text-center');
        $('#menu-region').removeClass('col-md-9');
        $('.nestor-main-menu > .navbar-collapse > ul').removeClass('navbar-right');
      } else {
        $.getScript( "/sites/all/themes/nestor/js/waypoints.min.js");
        $.getScript( "/sites/all/themes/nestor/js/waypoints-sticky.min.js").done(function() {
         $('header').waypoint('sticky', {
            offset: "-25px"
          });
        });
      }
    });

    // Footer
    $('.footer-style').change(function() {
      if ($(this).val() == "footer-1") {
        $('.footer-columns').removeClass('bg-color-grayLight1');
        $('.footer-columns').addClass('bg-color-grayDark2');
        $('.footer-columns').addClass('text-color-light');
      } else {
        $('.footer-columns').removeClass('bg-color-grayDark2');
        $('.footer-columns').removeClass('text-color-light');
        $('.footer-columns').addClass('bg-color-grayLight1');
      }
    });

    // BG Patterns
    $('.themePatterns li a').click(function() {
      var bgPattern = $(this).css("background");

      $('body').css('background', bgPattern);
    });
    
  });

})(jQuery);