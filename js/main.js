var ais = {}, $ = jQuery;

$(window).load(function() {
  if ($('.home-post').length) {
    ais.resizeHomePost();
  }

  ais.loaded();
});

ais.resizeHomePost = function() {
  $('.image img').css({'max-height': (window.innerHeight - 150) +'px'});
};

ais.loaded = function() {
  $('body').addClass('loaded');
};
