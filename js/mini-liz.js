jQuery(document).foundation();

showLeft.onclick = function() {
    jQuery('.mobile-nav').addClass('menu-open');
};

hideLeft.onclick = function() {
    jQuery('.mobile-nav').removeClass('menu-open');
};