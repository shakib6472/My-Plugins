jQuery(document).ready(function ($) {
  console.log("Initiate 1.1");
  function generateUniqueId() {
    return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(
      /[xy]/g,
      function (c) {
        var r = (Math.random() * 16) | 0,
          v = c == "x" ? r : (r & 0x3) | 0x8;
        return v.toString(16);
      }
    );
  }

  function getDeviceId() {
    var deviceId = localStorage.getItem("deviceId");
    if (!deviceId) {
      deviceId = generateUniqueId();
      localStorage.setItem("deviceId", deviceId);
    }
    return deviceId;
  }

  var currentUrl = window.location.href;
  // Check if the URL starts with 'only post page'
  // if (
  //   currentUrl.startsWith("https://hearing-test.pixelsdigital.net/exam/") ||
  //   currentUrl.startsWith(
  //     "https://hearing-test.pixelsdigital.net/hearing-test/"
  //   )
  // ) {
  if (
    currentUrl.startsWith("http://localhost/hearing-test/") ||
    currentUrl.startsWith("http://localhost/hearing-test/hearing-test")
  ) {
    // Your function logic here
    var deviceId = getDeviceId();
    var postid = $(".answer.submit").data("postid");

    $.ajax({
      type: "POST",
      url: ajax_object.ajax_url, // WordPress AJAX URL provided via wp_localize_script
      data: {
        action: "get_total_and_this_point", // Action hook to handle the AJAX request in your functions.php
        deviceId: deviceId,
        postid: postid,
      },
      dataType: "json",
      success: function (response) {
        // Handle success response
        $(".total-point").text(response.total);
        $(".this-point").text(response.this.point);
        $(".how-many-time-taseted").text(
          "Tested (" + response.this.point + ")"
        );
        $(".dropdown-toggle i").addClass("option-" + response.this.label);
        $(".loader-box").css("visibility", "hidden");
      },
      error: function (xhr, textStatus, errorThrown) {
        // Handle error
        console.error("Error:", errorThrown);
      },
    });
  }

  $(".answer.submit").click(function (e) {
    e.preventDefault();
    var text = $(this).val();

    if ("Retry" == text) {
      window.location.reload();
    } else {
      var post_id = $(this).data("postid");
      $(".loader-box").css("visibility", "visible");
      var inputedAnswer = $(".answer-input").val().trim();
      var labelValue = $(".dropdown-toggle i").data("value");
      var $result = $("p.result");
      var $aresult = $("p.right-answer");
      // Initialize the deviceId
      var deviceId = getDeviceId();
      // Clear previous results
      $result.empty();
      $aresult.empty();
      if (inputedAnswer !== "") {
        $("p.error").text("");
        $.ajax({
          type: "POST",
          url: ajax_object.ajax_url, // WordPress AJAX URL provided via wp_localize_script
          data: {
            action: "hearing_test_verify_the_answer", // Action hook to handle the AJAX request in your functions.php
            post_id: post_id, // Pass form data to the backend
          },
          dataType: "json",
          success: function (response) {
            // Handle success response
            if (response.success) {
              var actualAnswer = response.answer;
              var additional_anser = response.add_answer;
              console.log("additional_anser: " + additional_anser);
              // Split answers into arrays of words
              var inputWords = inputedAnswer.split(" ");
              var actualWords = actualAnswer.split(" ");
              var add_answer = additional_anser.split(",");
              var mainwords = [];
              var changedwords = [];
              var afterchaned = [];
              console.log("Add Anser: " + add_answer);
              var correctCount = 0;
              // Iterate over each word and compare
              for (var i = 0; i < inputWords.length; i++) {
                var word = inputWords[i];
                var actualWord = actualWords[i] ? actualWords[i] : "";
                var $span = $("<span>").text(word + " ");
                // Check if the word exists in actualWords
                if (actualWords.indexOf(word) !== -1) {
                  $span.addClass("text-success");
                  correctCount++; // Increment correct answers count
                } else {
                  $.each(add_answer, function (index, pair) {
                    var spit_pair = pair.split("=");
                    console.log("main Pair:" + spit_pair);
                    console.log("changed word:" + spit_pair[1]);
                    if (spit_pair[1] == word) {
                      //remove the 
                      console.log("changed word Matched");
                      mainwords.push(spit_pair[0]);
                      changedwords.push(spit_pair[1]);
                      afterchaned.push(spit_pair[1]);
                      $span.addClass("text-success");
                      correctCount++; // Increment correct answers count
                      return false; // Exit the loop by returning false
                    } else {
                      if (afterchaned.indexOf(word) !== -1) {
                        console.log("changed word NOT Matched");
                        $span.addClass("text-danger");
                      } 
                    }
                  });
                }

                $result.append($span);
              }
              //check if changedwords have somme words.
              //if yes then take the index number of the word & find the a word with same index from mainwords. & then find the word from actualWords & replace in actualWords with changedwords.
              // changedwords, mainwords, actualWords alls are array
              // make sure after replcare actualWords still be an array
              // Assume changedwords, mainwords, and actualWords are arrays
              changedwords.forEach((word, index) => {
                // Check if the word exists in changedwords
                if (changedwords.includes(word)) {
                  // Find the corresponding index from mainwords
                  var correspondingWord = mainwords[index];
                  // Find the index of correspondingWord in actualWords
                  var actualIndex = actualWords.indexOf(correspondingWord);
                  // If the word exists in actualWords, replace it with changedwords[index]
                  if (actualIndex !== -1) {
                    actualWords[actualIndex] = changedwords[index];
                  }
                }
              });

              // Separate correct and incorrect words in the actual answer
              for (var x = 0; x < actualWords.length; x++) {
                var aword = actualWords[x];
                var actualWord = actualWords[x] ? actualWords[x] : "";

                var $aspan = $("<span>").text(actualWord + " "); // Corrected variable declaration

                // Check if the aword exists in inputWords
                if (inputWords.indexOf(aword) !== -1) {
                  $aspan.addClass("text-success");
                  // No need to increment correctCount here
                } else {
                  $aspan.addClass("text-danger");
                }

                $aresult.append($aspan);
              }

              $.ajax({
                type: "POST",
                url: ajax_object.ajax_url, // WordPress AJAX URL provided via wp_localize_script
                data: {
                  action: "add_point_to_database", // Action hook to handle the AJAX request in your functions.php
                  device_id: deviceId,
                  post_id: post_id,
                  label: labelValue,
                  points: correctCount, // Points for the current answer
                },
                dataType: "json",
                success: function (response) {
                  // Handle success response
                  // Optionally display the actual correct answer
                  var rightAnswerHtml = $aresult.html();
                  $("p.right-answer").html("<b>" + rightAnswerHtml + "</b>");

                  $(".loader-box").css("visibility", "hidden");
                  $("p.right-answer").addClass("next");
                  $("p.result").addClass("next");
                  $(".answer.submit").val("Retry");
                },
                error: function (xhr, textStatus, errorThrown) {
                  // Handle error
                  console.error("Error:", errorThrown);
                },
              });

              // Get the previous Value (point) from local storage.
              // Addition this question value & save to localstorage
            } else {
              console.log(response);
            }
          },
          error: function (xhr, textStatus, errorThrown) {
            // Handle error
            console.error("Error:", errorThrown);
          },
        });
      } else {
        $(".loader-box").css("visibility", "hidden");
        $("p.error").text("Please Enter Your Answer First");
      }
    }
  });

  // Book mark System Dropdown

  $(".dropdown-toggle").click(function () {
    $(".dropdown-menu").toggle();
  });

  //Filter Upload,
  $(".ht-post .dropdown-item").click(function () {
    var selectedText = $(this).html(); // Copy the HTML content of the selected item
    $(".dropdown-toggle").html(selectedText); // Set the button text to the selected item
    $(".loader-box").css("visibility", "visible");
    $(".dropdown-menu").hide(); // Toggle the dropdown menu
    var labelValue = $(".dropdown-toggle i").data("value");
    var postid = $(".dropdown-toggle i").data("postid");
    var deviceId = getDeviceId();

    $.ajax({
      type: "POST",
      url: ajax_object.ajax_url, // WordPress AJAX URL provided via wp_localize_script
      data: {
        action: "only_lebel_update", // Action hook to handle the AJAX request in your functions.php
        labelValue: labelValue, // Pass form data to the backend
        postid: postid, // Pass form data to the backend
        device_id: deviceId,
      },
      dataType: "json",
      success: function (response) {
        // Handle success response
        // Reload the window
        //location.reload();
        if (!response.success) {
          $(".loader-box").css("visibility", "hidden");
          $(".error.text-danger").text("Please Answer Onec first to set lebel");
        } else {
          $(".loader-box").css("visibility", "hidden");
        }
      },
      error: function (xhr, textStatus, errorThrown) {
        // Handle error
        console.error("Error:", errorThrown);
      },
    });
  });

  // Filter Download
  $(".all-posts .dropdown-item").click(function () {
    var selectedText = $(this).html(); // Copy the HTML content of the selected item
    $(".dropdown-toggle").html(selectedText); // Set the button text to the selected item
    $(".loader-box").css("visibility", "visible");
    $(".dropdown-menu").hide(); // Toggle the dropdown menu
    var labelValue = $(".dropdown-toggle i").data("value");
    var deviceId = getDeviceId(); // Assuming this function returns the device ID
    $(".container .posts").empty();

    $.ajax({
      type: "POST",
      url: ajax_object.ajax_url, // WordPress AJAX URL provided via wp_localize_script
      data: {
        action: "Get_filterised_posts", // Action hook to handle the AJAX request in your functions.php
        labelValue: labelValue, // Pass form data to the backend
        device_id: deviceId, // Pass form data to the backend
      },
      dataType: "json",
      success: function (response) {
        // Handle success response
        var postsContainer = $(".posts"); // The container where filtered posts will be displayed
        postsContainer.empty(); // Clear previous results
        if (!response.success) {
          postsContainer.text("No Questions Found with this Lebel");
        } else {
        }
        // Loop through the response data and generate HTML for each post
        $.each(response.posts, function (index, post) {
          var postHtml = `
                    <div class="form-control mb-2 d-flex flex-row justify-content-between align-items-center">
                        <div class="p mb-0">${post.title}</div>
                        <div class="p mb-0">
                            <a href="${post.permalink}">
                                <div class="btn btn-success">
                                    Practice This
                                </div>
                            </a>
                        </div>
                    </div>`;
          postsContainer.append(postHtml);
        });

        $(".loader-box").css("visibility", "hidden"); // Hide the loader
      },
      error: function (xhr, textStatus, errorThrown) {
        // Handle error
        console.error("Error:", errorThrown);
        $(".loader-box").css("visibility", "hidden"); // Hide the loader
      },
    });
  });

  $(document).click(function (e) {
    if (!$(e.target).closest(".custom-dropdown").length) {
      $(".dropdown-menu").hide();
    }
  });
});
