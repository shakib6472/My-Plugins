jQuery(document).ready(function($){
    $('.new_enroll_now_button').click(function (e) { 
        e.preventDefault();
        $('.pre-loader').css('display', 'flex');
        product_id = $(this).data('id');

        $.ajax({
        type: 'POST',
        url: ajax_object.ajax_url, // WordPress AJAX URL provided via wp_localize_script
        data: {
        action: 'add_to_cart_and_go_to_checkout', // Action hook to handle the AJAX request in your functions.php
        product_id: product_id, // Pass form data to the backend
        },
        dataType: 'json',
        success: function(response) {
        // Handle success response
        console.log(response.data);
        // Reload the window
        window.location = response.data;
        },
        error: function(xhr, textStatus, errorThrown) {
        // Handle error
        console.error('Error:', errorThrown);
        }
        });
    });
});