jQuery(document).ready(function ($) {
  console.log("asd");
  $("#profile-nav .lp-profile-nav-tabs li").click(function (e) {
    e.preventDefault();
    var dataContent = $(this).data("content");
    $("#profile-nav .lp-profile-nav-tabs li").removeClass("active");
    $(this).addClass("active");
    console.log($(this));
    // .lp-user-profile .lp-profile-content
    forRemoveClass = ".lp-user-profile .lp-profile-content";
    forAddClass = ".lp-user-profile .lp-profile-content." + dataContent;
    $(forRemoveClass).removeClass("active");
    $(forAddClass).addClass("active");
  });
  $("#payment-type").change(function () {
    // Get the selected value
    var selectedValue = $(this).val();
    console.log(selectedValue);
    // Perform your action based on the selected value
    if (selectedValue === "COD") {
      $(".form-group.cod").show(500);
    } else {
      // Do something when "option2" is selected
      $(".form-group.cod").hide(500);
    }
    // Add more conditions as needed for other options
  });
  $("#area").change(function () {
    // Get the selected value
    var selectedValue = $(this).val();
    var $citySelect = $("#city");
    console.log(selectedValue);
    // Perform your action based on the selected value
    if (selectedValue === "area 1") {
      $citySelect.empty();
      cityOptions = [
        { value: "city 1 for area 1", text: "City 1 for Area 1" },
        { value: "city 2 for area 1", text: "City 2 for Area 1" },
        { value: "city 3 for area 1", text: "City 3 for Area 1" },
        { value: "city 4 for area 1", text: "City 4 for Area 1" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "area 2") {
      $citySelect.empty();
      cityOptions = [
        { value: "city 1 for area 2", text: "City 1 for Area 2" },
        { value: "city 2 for area 2", text: "City 2 for Area 2" },
        { value: "city 3 for area 2", text: "City 3 for Area 2" },
        { value: "city 4 for area 2", text: "City 4 for Area 2" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "area 3") {
      $citySelect.empty();
      cityOptions = [
        { value: "city 1 for area 3", text: "City 1 for Area 3" },
        { value: "city 2 for area 3", text: "City 2 for Area 3" },
        { value: "city 3 for area 3", text: "City 3 for Area 3" },
        { value: "city 4 for area 3", text: "City 4 for Area 3" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "area 4") {
      $citySelect.empty();
      cityOptions = [
        { value: "city 1 for area 4", text: "City 1 for Area 4" },
        { value: "city 2 for area 4", text: "City 2 for Area 4" },
        { value: "city 3 for area 4", text: "City 3 for Area 4" },
        { value: "city 4 for area 4", text: "City 4 for Area 4" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    }
    // Add more conditions as needed for other options
  });
  $("#city").change(function () {
    // Get the selected value
    var selectedValue = $(this).val();
    var $citySelect = $("#distric");
    console.log(selectedValue);
    // Perform your action based on the selected value
    if (selectedValue === "city 1 for area 1") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 1", text: "distric 1 for city 1" },
        { value: "distric 2 for city 1", text: "distric 2 for city 1" },
        { value: "distric 3 for city 1", text: "distric 3 for city 1" },
        { value: "distric 4 for city 1", text: "distric 4 for city 1" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 2 for area 1") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 2", text: "distric 1 for city 2" },
        { value: "distric 2 for city 2", text: "distric 2 for city 2" },
        { value: "distric 3 for city 2", text: "distric 3 for city 2" },
        { value: "distric 4 for city 2", text: "distric 4 for city 2" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 3 for area 1") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 3", text: "distric 1 for city 3" },
        { value: "distric 2 for city 3", text: "distric 2 for city 3" },
        { value: "distric 3 for city 3", text: "distric 3 for city 3" },
        { value: "distric 4 for city 3", text: "distric 4 for city 3" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 4 for area 1") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 4", text: "distric 1 for city 4" },
        { value: "distric 2 for city 4", text: "distric 2 for city 4" },
        { value: "distric 3 for city 4", text: "distric 3 for city 4" },
        { value: "distric 4 for city 4", text: "distric 4 for city 4" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    }
    // Add more conditions as needed for other options
    if (selectedValue === "city 1 for area 1") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 1", text: "distric 1 for city 1" },
        { value: "distric 2 for city 1", text: "distric 2 for city 1" },
        { value: "distric 3 for city 1", text: "distric 3 for city 1" },
        { value: "distric 4 for city 1", text: "distric 4 for city 1" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 2 for area 1") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 2", text: "distric 1 for city 2" },
        { value: "distric 2 for city 2", text: "distric 2 for city 2" },
        { value: "distric 3 for city 2", text: "distric 3 for city 2" },
        { value: "distric 4 for city 2", text: "distric 4 for city 2" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 3 for area 1") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 3", text: "distric 1 for city 3" },
        { value: "distric 2 for city 3", text: "distric 2 for city 3" },
        { value: "distric 3 for city 3", text: "distric 3 for city 3" },
        { value: "distric 4 for city 3", text: "distric 4 for city 3" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 4 for area 1") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 4", text: "distric 1 for city 4" },
        { value: "distric 2 for city 4", text: "distric 2 for city 4" },
        { value: "distric 3 for city 4", text: "distric 3 for city 4" },
        { value: "distric 4 for city 4", text: "distric 4 for city 4" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    }
    // Add more conditions as needed for other options
    if (selectedValue === "city 1 for area 2") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 1", text: "distric 1 for city 1" },
        { value: "distric 2 for city 1", text: "distric 2 for city 1" },
        { value: "distric 3 for city 1", text: "distric 3 for city 1" },
        { value: "distric 4 for city 1", text: "distric 4 for city 1" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 2 for area 2") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 2", text: "distric 1 for city 2" },
        { value: "distric 2 for city 2", text: "distric 2 for city 2" },
        { value: "distric 3 for city 2", text: "distric 3 for city 2" },
        { value: "distric 4 for city 2", text: "distric 4 for city 2" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 3 for area 2") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 3", text: "distric 1 for city 3" },
        { value: "distric 2 for city 3", text: "distric 2 for city 3" },
        { value: "distric 3 for city 3", text: "distric 3 for city 3" },
        { value: "distric 4 for city 3", text: "distric 4 for city 3" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 4 for area 2") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 4", text: "distric 1 for city 4" },
        { value: "distric 2 for city 4", text: "distric 2 for city 4" },
        { value: "distric 3 for city 4", text: "distric 3 for city 4" },
        { value: "distric 4 for city 4", text: "distric 4 for city 4" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    }
    // Add more conditions as needed for other options
    if (selectedValue === "city 1 for area 3") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 1", text: "distric 1 for city 1" },
        { value: "distric 2 for city 1", text: "distric 2 for city 1" },
        { value: "distric 3 for city 1", text: "distric 3 for city 1" },
        { value: "distric 4 for city 1", text: "distric 4 for city 1" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 2 for area 3") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 2", text: "distric 1 for city 2" },
        { value: "distric 2 for city 2", text: "distric 2 for city 2" },
        { value: "distric 3 for city 2", text: "distric 3 for city 2" },
        { value: "distric 4 for city 2", text: "distric 4 for city 2" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 3 for area 3") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 3", text: "distric 1 for city 3" },
        { value: "distric 2 for city 3", text: "distric 2 for city 3" },
        { value: "distric 3 for city 3", text: "distric 3 for city 3" },
        { value: "distric 4 for city 3", text: "distric 4 for city 3" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 4 for area 3") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 4", text: "distric 1 for city 4" },
        { value: "distric 2 for city 4", text: "distric 2 for city 4" },
        { value: "distric 3 for city 4", text: "distric 3 for city 4" },
        { value: "distric 4 for city 4", text: "distric 4 for city 4" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    }
    // Add more conditions as needed for other options
    if (selectedValue === "city 1 for area 4") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 1", text: "distric 1 for city 1" },
        { value: "distric 2 for city 1", text: "distric 2 for city 1" },
        { value: "distric 3 for city 1", text: "distric 3 for city 1" },
        { value: "distric 4 for city 1", text: "distric 4 for city 1" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 2 for area 4") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 2", text: "distric 1 for city 2" },
        { value: "distric 2 for city 2", text: "distric 2 for city 2" },
        { value: "distric 3 for city 2", text: "distric 3 for city 2" },
        { value: "distric 4 for city 2", text: "distric 4 for city 2" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 3 for area 4") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 3", text: "distric 1 for city 3" },
        { value: "distric 2 for city 3", text: "distric 2 for city 3" },
        { value: "distric 3 for city 3", text: "distric 3 for city 3" },
        { value: "distric 4 for city 3", text: "distric 4 for city 3" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    } else if (selectedValue === "city 4 for area 4") {
      $citySelect.empty();
      cityOptions = [
        { value: "distric 1 for city 4", text: "distric 1 for city 4" },
        { value: "distric 2 for city 4", text: "distric 2 for city 4" },
        { value: "distric 3 for city 4", text: "distric 3 for city 4" },
        { value: "distric 4 for city 4", text: "distric 4 for city 4" },
        // Add more options as needed
      ];

      cityOptions.forEach(function (option) {
        $citySelect.append(
          '<option value="' + option.value + '">' + option.text + "</option>"
        );
      });
    }
    // Add more conditions as needed for other options
  });

  //Ajax to adding new post

  $(".parcel-form").submit(function (e) {
    e.preventDefault(); // Prevent the form from submitting normally
    console.log("form is submitting");
    $.LoadingOverlay("show");
    // Get form data
    var formData = $(this).serialize();
    console.log(formData);
    //Make AJAX request
    $.ajax({
      type: "POST",
      url: ajax_object.ajax_url, // WordPress AJAX URL provided via wp_localize_script
      data: {
        action: "add_new_parcel_from_user", // Action hook to handle the AJAX request in your functions.php
        formData: formData, // Pass form data to the backend
      },
      dataType: "json",
      success: function (response) {
        // Handle success response
        console.log(response);
        console.log("Name: " + response.name);
        console.log("Contact: " + response.contact);
        console.log("Payment Type: " + response.paymentType);
        console.log("Post ID: " + response.post_id);
        $.LoadingOverlay("hide");
        // Reload the window
        location.reload();
      },
      error: function (xhr, textStatus, errorThrown) {
        // Handle error
        console.error("Error:", errorThrown);
      },
    });
  });
});
