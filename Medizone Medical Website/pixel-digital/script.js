jQuery(document).ready(function($){
    $(".feature-image-slider").slick({
        dots: true,
        arrows: false,
        infinite: true,
        centerPadding: '500px',
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });
});