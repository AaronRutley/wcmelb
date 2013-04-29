$(document).ready(function() {
 // slider effect for nav 
  $('span.header-icon').click(function() {
    var $marginLefty = $('.mobile-content');
    $marginLefty.animate({
      marginLeft: parseInt($marginLefty.css('marginLeft'),10) == 0 ?
        270:
        0
    });
  });
  

	


  
});