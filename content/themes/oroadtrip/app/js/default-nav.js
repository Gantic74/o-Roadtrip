require('jquery.scrollex');

var app = {
  $header: $('.header'),
  $main: $('.main__blog'),

  init: function() {
    console.log('init');

    app.$main.scrollex({
      enter: app.enterMain,
      bottom: '80vh',
      leave: app.leaveMain
    });

    $('.displayMenuUser').on(
      'click',
      app.displayMenuUser
    );

    $('.hideMenuUser').on(
      'click',
      app.hideMenuUser
    );

    $('.displaySignupForm').on(
      'click',
      app.displaySignupForm
    );

    $('.hideSignupForm').on(
      'click',
      app.hideSignupForm
    );

    $('.returnDisplayMenuUser').on(
      'click',
      app.returnDisplayMenuUser
    );
  },

  enterMain: function() {
    app.$header
      .removeClass('header--fixed')
      .css('top', '')
    ;
  },

  leaveMain: function() {
    app.$header
      .addClass('header--fixed')
      .animate(
        {
          top: 0
        }, 
        250
      )
    ;
  },

  displayMenuUser: function() {
    $('.overlay').removeClass('overlay--hidden');
    $('.home__container').addClass('home__container--blurred');
    $('.default-layout__container').addClass('default-layout__container--blurred');
    $('.fa-user').addClass('fa-user--hidden');
  },

  hideMenuUser: function() {
    $('.overlay').addClass('overlay--hidden');
    $('.home__container').removeClass('home__container--blurred');
    $('.default-layout__container').removeClass('default-layout__container--blurred');
    $('.fa-user').removeClass('fa-user--hidden');
  },

  displaySignupForm: function() {
    $('.overlay').addClass('overlay--hidden');
    $('.overlay__signup').removeClass('overlay__signup--hidden');
  },

  hideSignupForm: function() {
    $('.overlay__signup').addClass('overlay__signup--hidden');
    $('.home__container').removeClass('home__container--blurred');
    $('.default-layout__container').removeClass('default-layout__container--blurred');
    $('.fa-user').removeClass('fa-user--hidden');
  },

  returnDisplayMenuUser: function() {
    $('.overlay__signup').addClass('overlay__signup--hidden');
    $('.overlay').removeClass('overlay--hidden');
  }
};

$(app.init);
