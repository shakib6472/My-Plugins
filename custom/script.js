jQuery(document).ready(function ($) {
  //initial height Mesurements
  var iniHeight = $(".container.details-sec.charecter").height();
  iniHeight += 180;
  $(".section-holder").css("height", iniHeight + "px");

  $("#save-settings-btn").on("click", function (e) {
    e.preventDefault();
    var offset = $("#offset-settings").val();
    var limit = $("#limit-settings").val();
    console.log("clicked");
    console.log(ajax_object.ajax_url);
    function run_wait_me() {
      $("form#readercamp-settings-form").waitMe({});
    }

    run_wait_me();
    // Perform Ajax request
    $.ajax({
      url: ajax_object.ajax_url, // WordPress Ajax URL
      type: "POST",
      data: {
        action: "save_offset_settings", // Ajax action name
        offset: offset,
        limit: limit, // Serialized form data
      },
      success: function (response) {
        //$("form#readercamp-settings-form").waitMe("hide");
        // Handle success
        console.log("Settings saved via Ajax");
        console.log("Reloading");
        // Allow form submission after successful Ajax
        $("#readercamp-settings-form").off("submit").submit();
        // You can perform additional actions based on the response
      },

      error: function (xhr, status, error) {
        $("form#readercamp-settings-form").waitMe("hide");
        console.error("Ajax request failed");
      },
    });
  });

  //single page sliding
  $("nav ul li.masthead__tabs__li a").click(function (e) {
    e.preventDefault();
    var dataC = $(this).attr("data-content");
    var oldShow = $(".masthead__tabs__link.masthead__tabs__link--active");
    $(oldShow).removeClass("masthead__tabs__link--active");

    $(this).addClass("masthead__tabs__link--active");
    console.log("masthead__tabs__link--active");

    setTimeout(function () {
      if ("charecter" == dataC) {
        // Get the height of the .comic element
        var secHeight = $(".container.details-sec.charecter").height();
        console.log(secHeight);
        secHeight += 180;
        console.log(secHeight);

        // Apply the height dynamically to the .section-holder element
        $(".section-holder").css("height", secHeight + "px");
        $(".container.details-sec.charecter").css({
          transform: "translateX(0)",
          display: "block",
        });
        $(".container.details-sec.comic").css({
          transform: "translateX(-150%)",
          display: "none",
        });
        $(".container.details-sec.series").css({
          transform: "translateX(-300%)",
          display: "none",
        });
        $(".container.details-sec.stories").css({
          transform: "translateX(-450%)",
          display: "none",
        });
        $(".container.details-sec.events").css({
          transform: "translateX(-600%)",
          display: "none",
        });
      } else if ("comic" == dataC) {
        // Get the height of the .comic element
        var secHeight = $(".container.details-sec.comic").height();
        secHeight += 180;

        // Apply the height dynamically to the .section-holder element
        $(".section-holder").css("height", secHeight + "px");
        $(".container.details-sec.charecter").css({
          transform: "translateX(150%)",
          display: "none",
          // Displaying the first one
        });
        $(".container.details-sec.comic").css({
          transform: "translateX(0)",
          display: "block",
        });
        $(".container.details-sec.series").css({
          transform: "translateX(-150%)",
          display: "none",
        });
        $(".container.details-sec.stories").css({
          transform: "translateX(-300%)",
          display: "none",
        });
        $(".container.details-sec.events").css({
          transform: "translateX(-450%)",
          display: "none",
        });
      } else if ("series" == dataC) {
        // Get the height of the .comic element
        var secHeight = $(".container.details-sec.series").height();
        secHeight += 180;

        // Apply the height dynamically to the .section-holder element
        $(".section-holder").css("height", secHeight + "px");
        $(".container.details-sec.charecter").css({
          transform: "translateX(300%)",
          display: "none",
          // Displaying the first one
        });
        $(".container.details-sec.comic").css({
          transform: "translateX(150%)",
          display: "none",
        });
        $(".container.details-sec.series").css({
          transform: "translateX(0)",
          display: "block",
        });
        $(".container.details-sec.stories").css({
          transform: "translateX(-150%)",
          display: "none",
        });
        $(".container.details-sec.events").css({
          transform: "translateX(-300%)",
          display: "none",
        });
      } else if ("stories" == dataC) {
        // Get the height of the .comic element
        var secHeight = $(".container.details-sec.stories").height();
        secHeight += 180;

        // Apply the height dynamically to the .section-holder element
        $(".section-holder").css("height", secHeight + "px");
        $(".container.details-sec.charecter").css({
          transform: "translateX(450%)",
          display: "none",
          // Displaying the first one
        });
        $(".container.details-sec.comic").css({
          transform: "translateX(300%)",
          display: "none",
        });
        $(".container.details-sec.series").css({
          transform: "translateX(150%)",
          display: "none",
        });
        $(".container.details-sec.stories").css({
          transform: "translateX(0)",
          display: "block",
        });
        $(".container.details-sec.events").css({
          transform: "translateX(-150%)",
          display: "none",
        });
      } else if ("events" == dataC) {
        // Get the height of the .comic element
        var secHeight = $(".container.details-sec.events").height();
        secHeight += 180;

        // Apply the height dynamically to the .section-holder element
        $(".section-holder").css("height", secHeight + "px");
        $(".container.details-sec.charecter").css({
          transform: "translateX(600%)",
          display: "none",
          // Displaying the first one
        });
        $(".container.details-sec.comic").css({
          transform: "translateX(450%)",
          display: "none",
        });
        $(".container.details-sec.series").css({
          transform: "translateX(300%)",
          display: "none",
        });
        $(".container.details-sec.stories").css({
          transform: "translateX(150%)",
          display: "none",
        });
        $(".container.details-sec.events").css({
          transform: "translateX(0)",
          display: "block",
        });
      }
    }, 100);
    $("body").css({
      overflowX: "hidden",
    });
  });
  //End Jqury
});
