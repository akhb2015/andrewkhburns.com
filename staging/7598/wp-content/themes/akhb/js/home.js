/**
 * Javascript for home page overlay
 *
 * @author      Andy Burns
 * @copyright   2021
 */

var $=jQuery.noConflict();

$( document ).ready(function() {
    $('.overlay').addClass('fade-in');
});

//cookie stuff
$(document).ready(function() { 
    var cookie = false;
    var cookieContent = $('.cookie-disclaimer');

    checkCookie();

    if (cookie === true) {
      cookieContent.hide();
    }

    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toGMTString();
      document.cookie = cname + "=" + cvalue + "; " + expires;
    }

    function getCookie(cname) {
      var name = cname + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name) === 0) return c.substring(name.length, c.length);
      }
      return "";
    }

    function checkCookie() {
      var check = getCookie("akhbcookie");
      if (check !== "") {
        return cookie = true;
      } else {
          return cookie = false; //setCookie("acookie", "accepted", 365);
      }
      
    }
    $('.accept-cookie').click(function () {
      setCookie("akhbcookie", "accepted", 365);
      cookieContent.fadeOut(400);
    });
    $('.cookie-close').click(function () {
      cookieContent.slideToggle(400);
    });
});