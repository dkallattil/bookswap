$("button").click(function() {
    $('html,body').animate({
        scrollTop: $("#how-it-works").offset().top},
        'slow');
});