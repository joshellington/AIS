var ais = {}, $ = jQuery;

$(function() {
  if ($('.permalink-post').length) {
    $('.permalink-post img').removeAttr('width').removeAttr('height');
    ais.bindKeyboard('single');
  }

  if ($('.home-post').length) {
    ais.bindKeyboard('home');
  }

  $('.search-toggle').click(function(e) {
    $('.search-header').toggle().find('input').focus();
    e.preventDefault();
  });
});

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

ais.bindKeyboard = function(place) {
  var body = $('body');
  var ele = $('.post');

  if (place === 'single') {
    ele = $('.post img');
  }

  var currentEle = ele.first();

  Mousetrap.bind('j', function() {
    var scroll = _.debounce(function() {
      body.animate({'scrollTop': currentEle.offset().top}, 300)
    }, 150);
    scroll();

    if (currentEle.next().length) {
      currentEle = currentEle.next();
    } else {
      currentEle = ele.first();
    }
  });

  Mousetrap.bind('k', function() {
    var scroll = _.debounce(function() {
      body.animate({'scrollTop': currentEle.offset().top}, 300)
    }, 150);
    scroll();

    if (currentEle.prev().length) {
      currentEle = currentEle.prev();
    } else {
      currentEle = ele.last();
    }
  });

  Mousetrap.bind('enter', function() {
    var link = currentEle.find('a').attr('href');
    if (link) {
      location.href = link;
    }
  });
};
