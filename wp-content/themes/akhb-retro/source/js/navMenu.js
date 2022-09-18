import $ from 'jquery'

$(document).ready(function() {

//stick nav menu to the top on scroll  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      //console.log($(window).scrollTop())
    if ($(window).scrollTop() > 69) {
      $('#site-navigation').addClass('site-navigation-fixed');
      $('.site-branding').addClass('site-branding-fixed');
      $('.social-media').addClass('social-media-fixed');
    }
    if ($(window).scrollTop() < 69) {
      $('#site-navigation').removeClass('site-navigation-fixed');
      $('.site-branding').removeClass('site-branding-fixed');
      $('.social-media').removeClass('social-media-fixed');
    }
  });


  $('.hamburger').click(function(){
    $('body').toggleClass('menu-shown');
  });

  $('#nav-icon3').click(function(){
    $(this).toggleClass('open');
    
  });



});