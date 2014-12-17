(function($) {
    "use strict";
    
    // Navigation Menu Expander
    $('#nav-expander').sidr({
        side: 'right'
    });
    
    $('#sidr li a.more').click(function(e) {
        e.preventDefault();
        $(this).parent().find('ul').toggle();
    });
    
    // Subnav article loader
    $('#menu .subnav-menu li').hover(function() {
        $(this).parent().find('li').removeClass('current');
        $(this).addClass('current');
    });
        
    // Init datepicker for archive page
    $('#archive-date-picker').datepicker({
        format: 'mm/dd/yyyy'
    });
    
    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    
})(jQuery);