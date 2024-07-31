$(window).scroll(function() {
  if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
      $('#return-to-top').fadeIn(300);
  } else {
      $('#return-to-top').fadeOut(300);
  }
});

// When arrow is clicked
$('#return-to-top').click(function() {      
  $('body').animate({
      scrollTop : 0
  }, 300);
});