(function ($) {
    jQuery(document).ready(function ($) {
        console.log('Single page loaded');
        console.log(postId);
        console.log('post counti updating');

        //Increasing post view
        $.ajax({
          type: "POST",
          url: adminUrl.url,
          data: {
            action: "total_view_book",
            postid: postId
          },
  
          success: function (response) {
            console.log("Response From PHP " + response.message + 'post count Updated');
            // Handling success response
          
          },
          error: function (error) {
            console.log("Response From PHP " + response.message + 'Post count NOT Updated' );
          },
        });

$('#wa_button_sigle').click(function (e) { 
    e.preventDefault();
    console.log(postId);
    console.log(e);
    
    $.ajax({
        type: "POST",
        url: adminUrl.url,
        data: {
          action: "total_click_book",
          postid: postId
        },

        success: function (response) {
          console.log("Response From PHP " + response.message);
          // Handling success response
        
        },
        error: function (error) {
          console.log("Response From PHP " + response.message);
        },
      });
    
});



    // Ending Brackets --  Write Before here
});
})(jQuery);