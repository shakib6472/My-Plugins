jQuery(document).ready(function($){
    $('.product').click(function (e) { 
        e.preventDefault();
        console.log($(this).hasClass('product2'));
        $('.product').removeClass('active');
        $(this).addClass('active');
    });


$('.submit-btn').click(function (e) { 
    e.preventDefault();
    $('.pre-loader').css('display', 'flex');
    console.log('Payment Proccesing');
    var package = $('.product.active').data('quantity');
    var deliveryValue = $('input[name="delivery"]:checked').val();
    console.log(package);
    console.log(deliveryValue);

    $.ajax({
    type: 'POST',
    url: ajax_object.ajax_url, // WordPress AJAX URL provided via wp_localize_script
    data: {
    action: 'add_new_order_for_this_bottole', // Action hook to handle the AJAX request in your functions.php
    package: package, // Pass form data to the backend
    deliveryValue: deliveryValue, // Pass form data to the backend
    },
    dataType: 'json',
    success: function(response) {
    // Handle success response

    console.log(response);
    $('.pre-loader').css('display', 'flex');

    // Reload the window
    // location.reload();
    location.href = ajax_object.hone_url;
    },
    error: function(xhr, textStatus, errorThrown) {
    // Handle error
    console.error('Error:', errorThrown);
    }
    });
});

});
