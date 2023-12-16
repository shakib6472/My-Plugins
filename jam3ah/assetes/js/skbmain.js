(function ($) {
  jQuery(document).ready(function ($) {
    console.log(adminUrl.url);
   
    // ... other routes and configurations

    $(".lp-profile-nav-tabs li").click(function () {
      const tabId = $(this).attr("data-content");
      console.log(tabId);
      $(".lp-profile-nav-tabs li").removeClass("active");
      $(this).addClass("active");
      updateContent(tabId);
    });

    function updateContent(tabId) {
      // Hide all tab content
      $(".content").removeClass("active");

      // Show the selected tab content
      $(`.${tabId}-content`).addClass("active");
    }

    $(".logout").click(function (e) {
      confirm("Are You Sure to logout?");
    });

    $(".delete").click(function (e) {
      e.preventDefault();

      const postId = $(this).attr("post-id");
      const parentElement = $(this).parent().parent();
      var thisProp = $(this);
      thisProp.text(" ");
      thisProp.addClass("spinner");

      var deleteRequest = confirm(
        "Are you really want to delete this? Deleted Book Never can be back"
      );
      if (deleteRequest) {
        console.log("Delete confirmed for " + postId);

        deletePost(postId, thisProp, parentElement);
      } else {
        console.log("Deleting Not Accepted for " + postId);
        thisProp.text("Delete");
        thisProp.removeClass("spinner");
      }
    });

    function deletePost(postId, thisProp, parentElement) {
      $.ajax({
        type: "POST",
        url: adminUrl.url,
        data: {
          action: "delete_book_action",
          post_id: postId,
        },
        success: function (response) {
          console.log("Post deleted:", response);
          thisProp.text("deleted");
          thisProp.removeClass("spinner");
          parentElement.hide(2000);

          // Handle success response if needed
        },
        error: function (error) {
          console.error("Error deleting post:", error);
          // Handle error if needed
        },
      });
    }

    //Add a new book CLicking Animation
    $(document).on("click", ".submit-button .book-submit", function (e) {
      e.preventDefault();

      let bookName = $(".book-name-box").val();
      let bookPrice = $(".book-price-box").val();
      //let fileInput = $("#imageupload");
      // let file = fileInput.files[0];
      // let fileType = file.type;
      let file = $("#imageupload")[0].files[0];
      console.log(file);
      if (file) {
        fileType = $("#imageupload")[0].files[0]["type"];
        console.log(fileType);
      }

      let bookDescription = $(".book-description-box").val();
      let bookWa = $(".book-wa-box").val();
      let postType = $(".book-pt-box").val();
      console.log(postType);

      if ("" !== bookName) {
        if ("" !== bookPrice) {
          if ("" !== file) {
            if (
              "image/jpeg" == fileType ||
              "image/jpg" == fileType ||
              "image/png" == fileType
            ) {
              if ("" !== bookDescription) {
                if ("" !== bookWa) {
                  if (validateInput(bookWa)) {
                    //Main Funtionality
                    $(".error").show();
                    console.log($(this).text());
                    console.log("Post is publishing in private");
                    $(this).text(" ");
                    $(this).addClass("rotating");

                    $(".submit-button").addClass("clicked");
                    jam3ah_proceed_to_pay_for_book();

                    function jam3ah_proceed_to_pay_for_book() {
                      const formData = new FormData(
                        document.getElementById("bookForm")
                      );
                      formData.append("action", "add_to_cart");
                      formData.append("product_id", 15494);
                      $.ajax({
                        type: "POST",
                        url: adminUrl.url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                          // Handling success response
                          console.log("Is Success: " + response.success);
                          console.log("message: " + response.message);
                          console.log("Post ID: " + response.post_id);

                          localStorage.setItem("postid", response.post_id);
                          $(".submit-button").removeClass("clicked");
                          $(".submit-button .book-submit").removeClass(
                            "rotating"
                          );

                          $(".submit-button .book-submit").text(
                            "Redirecting..."
                          );
                          window.location.href = adminUrl.homeUrl + "checkout";
                        },
                        error: function (error) {
                          console.error("Error Adding to cart:", error);
                          $(".submit-button").removeClass("clicked");
                          $(".submit-button .book-submit").removeClass(
                            "rotating"
                          );
                          $(".submit-button .book-submit").text(
                            "Somethingwrong.. try again later..."
                          );
                          // Handle error if needed
                        },
                      });
                    }
                  } else {
                    $(".error").show();
                    $(".error p").text("WhatsApp Link is not valid");
                  }
                } else {
                  $(".error").show();
                  $(".error p").text("Enter Your WhatsApp Link");
                }
              } else {
                $(".error").show();
                $(".error p").text("Enter Your Book Description");
              }
            } else {
              $(".error").show();
              $(".error p").text("You can only Choose PNG,JPG or JPEG.");
            }
          } else {
            $(".error").show();
            $(".error p").text("Choose A Book Photo");
          }
        } else {
          $(".error").show();
          $(".error p").text("Enter Your Book Price");
        }
      } else {
        $(".error").show();
        $(".error p").text("Enter Your Book Name");
      }
    });

    function validateInput(input) {
      const regex = /^https:\/\/wa\.me\/\d+$/;
      console.log(regex.test(input));
      return regex.test(input);
    }

    function isSpecificPage() {
      return window.location.href.includes("thanks");
    }

    // Function to perform an action specific to the desired page
    function performActionOnSpecificPage() {
      console.log("This is the specific page. Performing the desired action.");
      // Retrieve the values from localStorage
      let retrievedPostId = localStorage.getItem("postid");

      // Use the retrieved values as needed
      console.log("Post Id:", retrievedPostId);

      var formData = new FormData();
      formData.append("action", "add_new_post");
      formData.append("postid", retrievedPostId);

      $.ajax({
        type: "POST",
        url: adminUrl.url,
        data: {
          action: "add_new_post",
          postid: retrievedPostId,
        },

        success: function (response) {
          console.log("Response From PHP " + response);
          // Handling success response
          $(".container .row .col-md-12 .thankyou-box .text-box .publish").text(
            "Successfuly Published"
          );
          $(".container .row .col-md-12 .thankyou-box .reloading").hide();
          $(".container .row .col-md-12 .thankyou-box .notice").hide();
          $(".container .row .col-md-12 .thankyou-box .complete").show();
        },
        error: function (error) {
          $(".container .row .col-md-12 .thankyou-box .text-box .publish").text(
            "Unfortunatly Book Publishing is failed. If you paid, Please contact with our support as soon as possible"
          );
          $(".container .row .col-md-12 .thankyou-box .notice").hide();
        },
      });
    }

    // Check if it's the specific page and perform the action
    if (isSpecificPage()) {
      performActionOnSpecificPage();
    }

    // Edit The Books
    $(".update-button").click(function (e) {
      e.preventDefault();
      console.log("update button clicked");

      $(".Form-part .loader .success-message").hide();
      $(".Form-part .loader").show();

      const postData = {
        post_id: parseFloat($(".post-id").val()),
        title: $(".book-name-box").val(),
        price: $(".book-price-box").val(),
        description: $(".book-description-box").val(),
        whatsapp: $(".book-wa-box").val(),
        action: "update_post_action",
      };

      console.log(postData);

      $.ajax({
        type: "POST",
        url: adminUrl.url,
        data: postData,
        success: function (response) {
          // Handle success response
          $(".Form-part .loader .rotating").hide();
          $(".Form-part .loader .success-message").show();
          console.log("Post updated successfully:", response);
        },
        error: function (xhr, textStatus, errorThrown) {
          // Handle error
          console.error("Error updating post:", errorThrown);
        },
      });
    });

    /* *************************************************************
     * Want a Book Publishing Everything
     * ************************************************************** */
    $(document).on(
      "click",
      ".want-submit-button .want-book-submit",
      function (e) {
        e.preventDefault();

        let wantbookName = $(".want-book-name-box").val();
        //let fileInput = $("#imageupload");
        // let file = fileInput.files[0];
        // let fileType = file.type;
        let wantfile = $("#wantimageupload")[0].files[0];
        console.log(wantfile);
        if (wantfile) {
          fileType = $("#wantimageupload")[0].files[0]["type"];
          console.log(fileType);
        }

        let wantbookDescription = $(".want-book-description-box").val();
        let wantbookWa = $(".want-book-wa-box").val();
        let wantpostType = "wantoed-book";

        if ("" !== wantbookName) {
          if ("" !== wantfile) {
            if (
              "image/jpeg" == fileType ||
              "image/jpg" == fileType ||
              "image/png" == fileType
            ) {
              if ("" !== wantbookDescription) {
                if ("" !== wantbookWa) {
                  //Main Funtionality
                  $(".error").show();
                  console.log($(this).text());
                  console.log("Post is publishing");
                  $(this).text(" ");
                  $(this).addClass("rotating");

                  $(".want-submit-button").addClass("clicked");
                  jam3ah_want_book_publishing();

                  function jam3ah_want_book_publishing() {
                    const formData = new FormData(
                      document.getElementById("want-bookForm")
                    );
                    formData.append("action", "publish_want_a_book");

                    $.ajax({
                      type: "POST",
                      url: adminUrl.url,
                      data: formData,
                      processData: false,
                      contentType: false,
                      success: function (response) {
                        // Handling success response
                        console.log("Is Success: " + response.success);
                        console.log("message: " + response.message);
                        console.log("Post ID: " + response.post_id);
                        console.log("Wa Link Updated: " + response.Walink);
                        console.log("Post URL: " + response.post_url);

                        localStorage.setItem("postid", response.post_id);
                        $(".submit-button").removeClass("clicked");
                        $(".submit-button .book-submit").removeClass(
                          "rotating"
                        );

                        $(".submit-button .book-submit").text(
                          "Wanted Book Submited Successfully"
                        );
                        window.location.href = response.post_url;
                      },
                      error: function (error) {
                        console.error("Error Adding to cart:", error);
                        $(".submit-button").removeClass("clicked");
                        $(".submit-button .book-submit").removeClass(
                          "rotating"
                        );
                        $(".submit-button .book-submit").text(
                          "Somethingwrong.. try again later..."
                        );
                        // Handle error if needed
                      },
                    });
                  }
                } else {
                  $(".error").show();
                  $(".error p").text("Enter Your WhatsApp Link");
                }
              } else {
                $(".error").show();
                $(".error p").text("Enter Your Book Description");
              }
            } else {
              $(".error").show();
              $(".error p").text("You can only Choose PNG,JPG or JPEG.");
            }
          } else {
            $(".error").show();
            $(".error p").text("Choose A Book Photo");
          }
        } else {
          $(".error").show();
          $(".error p").text("Enter Your Book Name");
        }
      }
    );



 //Shipping Address
      $('button[type="submit"][name="calc_shipping"][value="1"]').on('click', function() {
          var area = $('p input[placeholder="Area"]').val();
          var Block = $('p input[placeholder="Block"]').val();
          var Street = $('p input[placeholder="Street"]').val();
          var Jaddah = $('p input[placeholder="Jaddah"]').val();
          var House = $('p input[placeholder="House"]').val();
          var Floor = $('p input[placeholder="Floor"]').val();
          // AJAX request to send data to server 
          $.ajax({
              url: adminUrl.url,
              type: 'POST',
              data: {
                  action: 'update_custom_shipping_field',
                  area: area,
                  Block: Block,
                  Street: Street,
                  Jaddah: Jaddah,
                  House: House,
                  Floor: Floor
              },
              success: function(response) {
                  console.log('Custom shipping field value updated!');
              }
          });
      });
 
  

    // Ending Brackets --  Write Before here
  });
})(jQuery);
