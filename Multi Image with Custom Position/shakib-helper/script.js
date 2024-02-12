jQuery(document).ready(function($){
    $('.jgb_item-permalink').hover(function () {
    currentColor =  $(this).find('.jgb_item-body').css('backgroundColor');
            console.log(currentColor);
       // over
            $(this).find('.jgb_item-body').css('backgroundColor', '#ffffff17');
            
        }, function () {
            // out
            $(this).find('.jgb_item-body').css('backgroundColor', currentColor);
        }
    );


});