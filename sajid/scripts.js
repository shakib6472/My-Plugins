jQuery(document).ready(function ($) {
  console.log("object");
  var plasticLICLID = $("#fieldname4_1").val();
  var plasticLICCoatedCopper = $("#fieldname6_1");
  console.log(plasticLICLID);

  function radioButtonclickedfor1(value) {
    var nLic = value * 3500;
    var formattedLic = nLic.toLocaleString("en-IN");
    var ncoated = value * 825;
    var formattedncoated = ncoated.toLocaleString("en-IN");

    $("#fieldname4_1").val(formattedLic + " KG");
    $("#fieldname6_1").val(formattedncoated + " KG");
    var total = nLic + ncoated;
    var formattedtotal = total.toLocaleString("en-IN");
    $("#fieldname5_1").val(formattedtotal + " KG");
  }
  function radioButtonclickedfor2(value) {
   
    if (1 == value) {
      $('.left-image2').hide();
      $('.left-image3').hide();
      $('.left-image1').show();
      $('#boxname4_1').val('10 TO 20%');
      
    } else if (2 == value) {
      $('.left-image1').hide();
      $('.left-image3').hide();
      $('.left-image2').show();
      $('#boxname4_1').val('25 TO 35%');
    } else if (3 == value) {
      $('.left-image2').hide();
      $('.left-image1').hide();
      $('.left-image3').show();
      $('#boxname4_1').val('30 TO 40%');
    }
  }

  $('input[type="radio"]').click(function (e) {
    e.preventDefault();
    var thisValue = $(this).val();
    var datakey = $(this).data('key');
    // Check the clicked radio button
    $('input[type="radio"]').removeClass('active');
    $(this).addClass('active');
    console.log(thisValue);
    if ('calculator1' == datakey) {
      radioButtonclickedfor1(thisValue);
    }else {
      radioButtonclickedfor2(thisValue);
    }
  });
});
