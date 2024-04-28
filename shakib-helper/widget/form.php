<?php
class Elementor_form_finder extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'quiz-form';
    }

    public function get_title()
    {
        return esc_html__('Quiz Form ', 'renuaddons');
    }

    public function get_icon()
    {
        return 'far fa-water';
    }
    protected function _register_controls()
    {

        // //end Control
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['find', 'quiz', 'form'];
    }

    protected function render()
    {
        $home_url = untrailingslashit(home_url());
?>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
        <style>
            form {
                padding: 20px;
            }

            form table {
                width: 100%;
            }

            form table tr,
            form table td,
            form table th {
                border: 1px solid rgb(192, 192, 192);
                padding: 10px;
            }

            form table tr:nth-child(odd) {
                background-color: rgb(228, 228, 228);
            }

            form table tr:nth-child(even) {
                background-color: rgba(236, 236, 236, 0.479);
            }

            .custom-radio {
                position: relative;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .custom-radio input {
                opacity: 0;
                display: none;
                cursor: pointer;
            }

            .checkmark {
                height: 20px;
                width: 20px;
                background-color: #eee;
                border-radius: 4px;
                border: 1px solid #ccc;
            }

            .custom-radio input:checked+.checkmark:after {
                content: '\2713';
                /* Unicode character for checkmark */
                display: block;
                margin-top: -4px;
                color: white;
            }

            .custom-radio input:checked+.checkmark {
                background-color: #2196F3;
            }

            .custom-radio:hover input+.checkmark {
                background-color: #ccc;
            }

            .tooltip {
                position: absolute;
                display: block;
                color: #ffffff;
                visibility: visible;
                z-index: +1;
                opacity: 1;
                top: -30px;
                left: -40px;
                background-color: black;
                padding: 3px 15px;
                border-radius: 9px;
                width: auto;
            }

            .loading {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(255, 255, 255, 0.7);
                /* semi-transparent white background */
                z-index: 9999;
                /* ensure it's on top of other content */
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .unloading {
                display: none;
            }

            .spiner {
                width: 50px;
                /* adjust as needed */
                height: 50px;
                /* adjust as needed */
                border: 5px solid #131313;
                /* Light grey */
                border-top: 5px solid #3498db;
                /* Blue */
                border-radius: 50%;
                animation: spin 1s linear infinite;
                /* Spin animation */
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }
        </style>


        <div class="container">
            <div class="row">
                <div class="unloading">
                    <div class="spiner">

                    </div>
                </div>
                <div class="col-md-12">

                    <form action="" class="user">
                        <input type="text" name="name" placeholder="Enter Name" class="name">
                        <input type="email" name="email" placeholder="Enter Email" class="email">
                        <input type="tel" name="phone" placeholder="Enter Mobile" class="phone">
                    </form>

                    <form action="" id="myForm">
                        <table class="text-center">
                            <thead>
                                <tr>
                                    <th style="width: 3%;">Sl</th>
                                    <th style="width: 53%;">Question</th>
                                    <th style="width: 11%;">Usually true (5)</th>
                                    <th style="width: 11%;">Sometimes true (3)</th>
                                    <th style="width: 11%;">Seldom true (1)</th>
                                    <th style="width: 11%;">Rarely true (0)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                global $wpdb;

                                $table_name = $wpdb->prefix . 'quiz_question_data';


                                $query = "SELECT * FROM $table_name";

                                // Retrieve the results
                                $results = $wpdb->get_results($query, ARRAY_A);
                                $sirial = 1;

                                // Check if there are any results
                                if ($results) {
                                    // Loop through each row of the results
                                    foreach ($results as $row) {
                                ?>
                                        <tr>
                                            <td class="text-center"><?php echo $row['id']; ?></td>
                                            <td style="text-align: left;"><?php echo $row['question']; ?></td>
                                            <td>
                                                <label class="custom-radio">
                                                    <input type="radio" name="quesn<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>" value="5">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom-radio">
                                                    <input type="radio" name="quesn<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>" value="3">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom-radio">
                                                    <input type="radio" name="quesn<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>" value="1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom-radio">
                                                    <input type="radio" name="quesn<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>" value="0">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                        </tr>
                                <?php   }
                                } else {
                                    echo 'No Result';
                                } ?>

                            </tbody>
                        </table>
                        <input type="submit" value="Get a result" class="btn btn-primary mt-2" />
                    </form>
                </div>
            </div>
        </div>

        <script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>
        <script src='https://kit.fontawesome.com/46882cce5e.js' crossorigin='anonymous'></script>
        <script>
            jQuery(document).ready(function($) {
                function unloadingToLoading() {
                    $('.unloading').addClass('loading');
                    $('.loading').removeClass('unloading');
                }

                function loadingToUnloading() {
                    $('.loading').addClass('unloading');
                }


                $('#myForm').submit(function(e) {
                    e.preventDefault();
                    unloadingToLoading();
                    var userArray = [];
                    var name = $('input.name').val();
                    var email = $('input.email').val();
                    var phone = $('input.phone').val();
                    var total = 0;
                    var mercy_total = 0;
                    var teaching_total = 0;
                    var prophecy_total = 0;
                    var giving_total = 0;
                    var exhortation_total = 0;
                    var serving_total = 0;
                    var administrativ_total = 0;
                    // Check if there is at least one radio button selected for each group of radios with the same name
                    var allGroupsSelected = true;
                    $('input[type="radio"]').each(function() {
                        var groupName = $(this).attr('name');
                        if ($('input[type="radio"][name="' + groupName + '"]:checked').length === 0) {
                            allGroupsSelected = false;
                            return false; // exit the loop early since at least one group is not selected
                        }
                    });


                    if ('' != name && '' != email && '' != phone) {
                        console.log(' Everything is fine');
                        // Check if there are any unchecked radio buttons
                        if (allGroupsSelected) {
                        // All radio buttons are selected, perform your action here



                        $('input[type="radio"]:checked').each(function() {
                            var question = $(this).attr('name');
                            var value = parseInt($(this).val());

                            if ($.inArray($(this).data('id'), [1, 8, 15, 22, 29, 36, 43, 50, 57, 64]) !== -1) {

                                total += value;
                                mercy_total += value;

                            } else if ($.inArray($(this).data('id'), [2, 9, 16, 23, 30, 37, 44, 51, 58, 65]) !== -1) {
                                ;
                                total += value;
                                teaching_total += value;

                            } else if ($.inArray($(this).data('id'), [3, 10, 17, 24, 31, 38, 45, 52, 59, 66]) !== -1) {

                                total += value;
                                prophecy_total += value;

                            } else if ($.inArray($(this).data('id'), [4, 11, 18, 25, 32, 39, 46, 53, 60, 67]) !== -1) {
                                total += value;
                                giving_total += value;

                            } else if ($.inArray($(this).data('id'), [5, 12, 19, 26, 33, 40, 47, 54, 61, 68]) !== -1) {

                                //Giving Mercy total
                                total += value;
                                exhortation_total += value;

                            } else if ($.inArray($(this).data('id'), [6, 13, 20, 27, 34, 41, 48, 55, 62, 69]) !== -1) {

                                total += value;
                                serving_total += value;

                            } else if ($.inArray($(this).data('id'), [7, 14, 21, 28, 35, 42, 49, 56, 63, 70]) !== -1) {
                                total += value;
                                administrativ_total += value;
                            }



                        });
                        // Create an array to store the variables and their values
                        var totals = [{
                                name: 'https://starcye.com/questions/mercy/',
                                value: mercy_total
                            },
                            {
                                name: 'https://starcye.com/questions/teaching/',
                                value: teaching_total
                            },
                            {
                                name: 'https://starcye.com/questions/prophecy/',
                                value: prophecy_total
                            },
                            {
                                name: 'https://starcye.com/questions/giving/',
                                value: giving_total
                            },
                            {
                                name: 'https://starcye.com/questions/exhortation/',
                                value: exhortation_total
                            },
                            {
                                name: 'https://starcye.com/questions/service/',
                                value: serving_total
                            },
                            {
                                name: 'https://starcye.com/questions/administrative/',
                                value: administrativ_total
                            }
                        ];

                        // Find the maximum value
                        var max = Math.max(...totals.map(item => item.value));

                        // Filter variables with the maximum value
                        var maxTotals = totals.filter(item => item.value === max);

                        // If there are multiple variables with the maximum value, choose one randomly
                        var randomMaxTotal = maxTotals[Math.floor(Math.random() * maxTotals.length)];

                        // Output the result
                        console.log(randomMaxTotal.name + ' has the maximum value: ' + randomMaxTotal.value);



                        // Serialize form data into an array of objects
                        var formDataArray = $(this).serializeArray();

                        // Convert array of objects to JSON string
                        var formDataJSON = JSON.stringify(formDataArray);

                       // Push all user data into userArray
                        userArray.push({
                            name: name,
                            email: email,
                            phone: phone,
                            total: total // Optionally include total score here
                        });

                        //Convert userArray to JSON string
                        var userArrayJSON = JSON.stringify(userArray);

                      //  Send data via AJAX
                        console.log('Sending Ajax request');
                        $.ajax({
                            url: '<?php echo admin_url('/admin-ajax.php') ?>',
                            type: 'POST',
                            data: {
                                action: 'save_user_data_and_details',
                                userArray: userArrayJSON, // Send user data as JSON string
                                formDataJSON: formDataJSON
                            },
                            success: function(response) {
                                console.log('Data sent successfully');
                                console.log(response); // Log any response from the server
                                window.location.href = randomMaxTotal.name;
                                
                            },
                            error: function(xhr, status, error) {
                                console.error('Error sending data:', error);
                            }
                        });
                        } else {
                            loadingToUnloading();
                            // Some radio buttons are not selected, you can handle this case as per your requirement

                            alert('Please make sure you have answered all questions!');
                        }

                    } else {
                        loadingToUnloading();
                        alert('Please Fill Your details');

                    }


                });







                $('td').mouseenter(function(e) {
                    // Get the input value inside the hovered td
                    var inputVal = $(this).find('input[type="radio"]').val();

                    // Get the corresponding th text
                    var thText = $(this).closest('table').find('th').eq($(this).index()).text();

                    // Show tooltip only if inputVal is not empty
                    if (inputVal) {
                        // Create and append tooltip element
                        var tooltip = $('<div class="tooltip">' + thText + '</div>');
                        $('body').append(tooltip);

                        // Position the tooltip relative to the mouse pointer
                        tooltip.css({
                            top: e.pageY + 10, // Add 10px offset to prevent it from overlapping with the cursor
                            left: e.pageX + 10 // Add 10px offset to prevent it from overlapping with the cursor
                        });

                        // Remove tooltip when mouse leaves the td
                        $(this).mouseleave(function() {
                            tooltip.remove();
                        });
                    }
                });


                //Submission #form 


            });
        </script>


<?php
    }
}
