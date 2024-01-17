// document.addEventListener('DOMContentLoaded', function() {
//     // Retrieve the tutor name from local storage
//     var storedTutorName = localStorage.getItem('tutorName');
//     var storedQuestion = localStorage.getItem('question');

//     // Check if the tutor name is available
//     if (storedTutorName) {
//         // Update the content of the h2 element with the tutor name
//         document.querySelector('.booking-form h2').innerText = 'Schedule a Session with ' + storedTutorName;
//     }
//     if (storedQuestion) {
//         // Update the content of the h2 element with the tutor name
//         document.querySelector('#special-request').value =  storedQuestion;
//     }
//      // Retrieve the subjects from local storage
//     var mySubjects = localStorage.getItem('mySubjects');

//         // Check if subjects are available
//         if (mySubjects) {
//             // Split the subjects into an array using the comma as a separator
//             var subjectsArray = mySubjects.split(',');

//             // Get the select element
//             var subjectSelect = document.getElementById('subject');

//             // Create options for each subject and append them to the select element
//             subjectsArray.forEach(function(subject) {
//                 var option = document.createElement('option');
//                 option.value = subject.trim(); // trim to remove leading/trailing spaces
//                 option.text = subject.trim();
//                 subjectSelect.add(option);
//             });
//         }
//         function bookingFormSubmitHandleSubmit (){

//         }
// });

$(document).ready(function() {
    // Retrieve the tutor name from local storage
    var storedTutorName = localStorage.getItem('tutorName');
    var storedQuestion = localStorage.getItem('question');

    // Check if the tutor name is available
    if (storedTutorName) {
        // Update the content of the h2 element with the tutor name
        $('.booking-form h2').text('Schedule a Session with ' + storedTutorName);
    }

    if (storedQuestion) {
        // Update the content of the h2 element with the tutor name
        $('#special-request').val(storedQuestion);
    }

    // Retrieve the subjects from local storage
    var mySubjects = localStorage.getItem('mySubjects');

    // Check if subjects are available
    if (mySubjects) {
        // Split the subjects into an array using the comma as a separator
        var subjectsArray = mySubjects.split(',');

        // Get the select element
        var subjectSelect = $('#subject');

        // Create options for each subject and append them to the select element
        $.each(subjectsArray, function(index, subject) {
            var option = $('<option>', {
                value: subject.trim(),
                text: subject.trim()
            });
            subjectSelect.append(option);
        });
    }

    // Your form submission logic using jQuery
    function bookingFormSubmitHandleSubmit() {
        // Your form submission logic goes here
   // Display a loading message or spinner while processing the form
   $.blockUI({ message: 'Processing to the payment, Please Wait...' });

   // Simulate an asynchronous operation (replace this with your actual form submission logic)

       // When the operation is complete, unblock the UI
       //$.unblockUI();
       $.ajax({
        type: 'POST',
        url: ajaxurl, // Replace with your actual backend endpoint
        data: {
            // Your form data goes here
            // Example: key1: 'value1', key2: 'value2'
            action: 'change_product_details_to_tutor',
            name: $('#full-name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            subject: $('#subject').val(),
            date:$('#date').val(),
            hour: $('input[name="hours"]:checked').val(),
            question: $('#special-request').val(),
            teacherName: localStorage.getItem('tutorName'),
           
        },
        success: function(response) {
            // Handle the success response
            console.log('Product has been changed');
            // When the operation is complete, unblock the UI
           //for localhost
            //window.location.href  ='http://localhost/renu-academic/product/hello/';
            window.location.href  ='https://natkeneducation.com/step/checkout-woo/';
            $.unblockUI();
        },
        error: function(xhr, status, error) {
            // Handle the error response
            console.log('Product has failed to changed');
            console.log(xhr);
            console.log(status);
            console.log(error);
            // When the operation is complete (even if there's an error), unblock the UI
            $.unblockUI();
        }
    });



        return false;
    }

    // // Attach the form submission handler
    $('.booking-form-renu').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Call your form submission logic
        bookingFormSubmitHandleSubmit();
    });
});