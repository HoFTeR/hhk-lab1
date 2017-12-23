jQuery(document).ready(function () {
    jQuery('a#search-link').click(function (e) {
        jQuery(this).toggleClass('active');
        jQuery('.search-box').toggle();
        e.stopPropagation();
    });
    //jQuery("div.#epoch-wrap.comments-area.epoch-wrapper").removeAttr("style");
});