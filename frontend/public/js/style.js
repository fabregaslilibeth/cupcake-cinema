$(window).scroll(function(){
    if ($(window).scrollTop() >= 100) {
        $('nav').addClass('nav-bar-colored');

    }
    else {
        $('nav').removeClass('nav-bar-colored');

    }
});

