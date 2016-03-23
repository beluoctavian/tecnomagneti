(function ($) {
    $('#navbar').affix({
        offset: {
            top: $('header').height(),
        }
    });
})(jQuery);