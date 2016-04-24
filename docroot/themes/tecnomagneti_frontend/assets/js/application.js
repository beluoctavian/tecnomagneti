(function ($) {
    $('#navbar').affix({
        offset: {
            top: $('header').height(),
        }
    });
    $('#block-views-block-news-block-1 .item-list ul').ticker({
        controls: false, //show controls, to be implemented
        interval: 5000, //interval to show next item
        effect: "slideUp", // available effects: fadeIn, slideUp, slideDown
        duration: 400 //duration of the change to the next item
    });
})(jQuery);