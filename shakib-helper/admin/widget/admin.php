<?php

// Add Tutor's Subjects Admin Menu
function add_tutors_subjects_menu()
{
    add_menu_page(
        'Quiz Result', // Page title
        'Quiz Result', // Menu title
        'manage_options',    // Capability required to access the menu
        'quiz-result',   // Menu slug
        'quize_results_page_content', // Callback function to display the page content
        'dashicons-flag',    // Icon for the menu (you can choose from Dashicons: https://developer.wordpress.org/resource/dashicons/)
        9                   // Menu position
    );
    add_submenu_page('quiz-result', 'Add New Question', 'Add new question', 'manage_options', 'add-new-qustion', 'add_new_question_page', 100);
    add_submenu_page('quiz-result', 'Reset The Database', 'Reset The databse', 'manage_options', 'reset-database', 'reset_database', 100);
}
add_action('admin_menu', 'add_tutors_subjects_menu');

// Callback function to display the page content


function quize_results_page_content()
{

?>
    <div class="wrap">
        <h2>Quiz Result</h2>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">




        <div class="subject-container">
            <div class="container">

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

                    .box form table tr,
                    .box form table td,
                    .box form table th {
                        border: 1px solid rgb(192, 192, 192);
                        padding: 1px;
                    }

                    form table tr:nth-child(odd) {
                        background-color: rgb(228, 228, 228);
                    }

                    form table tr:nth-child(even) {
                        background-color: rgba(236, 236, 236, 0.479);
                    }

                    .reslut {
                        border: 1px solid rgb(58, 58, 58);
                        background: rgb(66, 66, 66);
                        border-radius: 100%;
                        color: white;
                        padding: 7px;
                        width: 41px;
                    }

                    .user-del {
                        border: 1px solid rgb(211, 211, 211);
                        padding: 20px;
                        border-radius: 20px;
                        box-shadow: inset 1px 2px 10px green;
                    }

                    .gridbox {
                        border: 2px solid #958f8f;
                        width: 100%;
                        padding: 20px;
                        border-radius: 13px;
                        display: grid;
                        grid-template-columns: repeat(10, 1fr);
                        grid-template-rows: repeat(7, 1fr);
                        grid-auto-flow: column;
                        grid-column-gap: 5px;
                        grid-row-gap: 15px;
                    }

                    .gridbox td {
                        border: 1px solid #c1c1c1;
                        border-radius: 9px;
                        padding: 10px;
                    }

                    .gridbox td .result {
                        border: 1px solid #c1c1c1;
                        border-radius: 9px;
                        padding: 8px;
                        background-color: #4a4a4a;
                        color: white;
                        width: 75%;
                        margin: 9px 0 0 0;
                    }

                    .load.text-center {
                        height: 500px;
                        border: 1px solid green;
                        width: 96%;
                        display: flex;
                        align-content: center;
                        align-items: center;
                        justify-content: center;
                        background: #0000006b;
                        border-radius: 13px;
                    }
                </style>
                </head>

                <body>
                    <div class="backend-view">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="list-of-users">
                                        <form action="">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th style="width: 3%;">ID</th>
                                                        <th style="width: 40%;">Name</th>
                                                        <th style="width: 15%;">Total Point</th>
                                                        <th style="width: 15%;">Submission Date</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php


                                                    global $wpdb;

                                                    $table_name = $wpdb->prefix . 'quiz_user_data';

                                                    // Select all data from the custom database table
                                                    $query = "SELECT * FROM $table_name";

                                                    // Retrieve the results
                                                    $results = $wpdb->get_results($query, ARRAY_A);

                                                    // Check if there are any results
                                                    if ($results) {
                                                        // Loop through each row of the results
                                                        foreach ($results as $row) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $row['id']; ?></td>
                                                                <td><?php echo $row['username']; ?></td>
                                                                <td><i class="fa fa-check-circle  text-success"></i> <?php echo $row['total']; ?> / 100</td>
                                                                <td><?php echo $row['created_at']; ?></td>
                                                                <td class="text-center">
                                                                    <div class="butns">
                                                                        <a href="#" data-id="<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                                                        <a href="#" data-id="<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                    <?php

                                                        }
                                                    } else {
                                                        echo 'No data found.';
                                                    }



                                                    ?>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box d-flex justify-content-center align-items-center ">
                                        <div class="user-del" style="display: none;">
                                            <div class="container">
                                                <div class="row">

                                                    <h3>User Name: John Doe</h3>
                                                    <h5>User Email: john@doe.com</h5>
                                                    <h5>User Mobile: 013193103585</h5>
                                                    <h5>User Country: USA</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="load text-center" style="display: none; ">
                                            <div class="spinner-border" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <div class="gridbox" style="display: none;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>

                    <script>
                        jQuery(document).ready(function($) {

                            $('.butns .btn.btn-success').click(function(e) {
                                e.preventDefault();
                                var datId = $(this).data('id');
                                console.log('The ID is: ' + datId);
                                //loading Start
                                $('.box .load').css("display", "flex");

                                //ajax Start
                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo admin_url('admin-ajax.php') ?>', // WordPress AJAX URL provided via wp_localize_script
                                    data: {
                                        action: 'getthisuserdatareselts', // Action hook to handle the AJAX request in your functions.php
                                        id: datId, // Pass form data to the backend
                                    },
                                    dataType: 'json',
                                    success: function(response) {
                                        // Handle success response
                                        console.log(response);
                                        var responseData = JSON.parse(response);
                                        console.log(responseData);
                                        // Clear existing content in the gridbox before appending new data
                                        $('.gridbox').empty();
                                        $.each(responseData, function(index, item) {
                                            var lastChar = item.name.substring(item.name.length - 2);
                                            console.log(lastChar);
                                            var gridItem = '<td><div class="boxi text-center d-flex flex-column align-items-center"><div class="sl"> Q NO.' + lastChar + '</div><div class="result">' + item.value + '</div></div></td>';
                                            $('.gridbox').append(gridItem);
                                        });
                                        $('.box .gridbox').css("display", "grid");
                                        $('.box .load').css("display", "none");
                                        // Reload the window
                                    },
                                    error: function(xhr, textStatus, errorThrown) {
                                        // Handle error
                                        console.error('Error:', errorThrown);
                                        $('.box .load').css("display", "none");
                                    }
                                });




                            });
                        });
                    </script>
                </body>

            </div>
        </div>
        <script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>
        <script src="https://kit.fontawesome.com/46882cce5e.js" crossorigin="anonymous"></script>




    <?php
}


function add_new_question_page()
{
    ?>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
        <script src='https://kit.fontawesome.com/46882cce5e.js' crossorigin='anonymous'></script>


        <style>
            .subject-container .container .row {
                font-family: Arial, Helvetica, sans-serif;
                border: 1px solid rgb(177, 177, 177);
                padding: 30px;
                margin: 20px 0 0 0;
                border-radius: 13px;
                box-shadow: inset 1px 1px 10px 0px rgb(170, 170, 170);
            }

            .subject-container .container .sub-box {
                margin: 0 0 20px 0;
            }

            .subject-container .container h6 {
                font-size: 21px;
                font-weight: bold;
                font-family: "Jost", sans-serif;
            }

            .subject-container .container .box {
                padding: 10px 0;
            }

            .sub-subjects.d-block {
                padding: 0;
            }

            .subject-container .container .box .inputbox {
                width: 80%;
            }

            .subject-container .container .box .inputbox p {
                padding: 6px 0 0 0;
                font-size: 11px;
            }

            .subject-container .container .box input {
                width: 100%;
                border: 1px solid rgb(197, 197, 197);
                border-radius: 9px;
                padding: 8px;
                background-color: #ececec;
            }

            .subject-container .container .box i {
                padding: 0;
                border-radius: 9px;
            }

            table th,
            table td {
                border: 1px solid rgb(218, 218, 218);
                padding: 10px;
            }

            table td input{
                width: 100%;
                padding: 10px;
                border: 1px solid #bbbbbb;
            }

            table tr:nth-child(even) {
                background-color: rgb(255, 230, 230);
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
          <div class="subject-container">
            <div class="container">
                <div class="row sub-subjects-box">
                    <div class="sub-box d-flex justify-content-between align-items-center">
                        <h6>Add a new Questoin</span> </h6>

                    </div>

                    <div class="sub-subjects d-block">

                        <div class="box d-flex justify-content-between align-items-start ">
                            <div class="inputbox">
                                <input type="text" class="subsubjects" placeholder="Enter Question With ? Simble">
                                <p>*Please enter with ? Mark</p>
                            </div>
                            <button class="btn btn-success submit-btn sub-subject-submit"><i class="fa fa-plus" aria-hidden="true"></i><span style="padding: 0 20px;">Add</span> </button>

                        </div>


                    </div>


                </div>
            </div>
        </div>
        <div class="subject-container">
            <div class="unloading">
                <div class="spiner"></div>
            </div>
            <div class="container">
                <div class="row sub-subjects-box">
                    <div class="sub-box d-flex justify-content-between align-items-center">
                        <h6>List Of Questions</span> </h6>

                    </div>

                    <table>
                        <tr>
                            <th style="width: 10%;">SL</th>
                            <th style="width: 70%;">Question</th>
                            <th style="width: 20%;">Action</th>
                        </tr>
                        <?php

                        global $wpdb;

                        $table_name = $wpdb->prefix . 'quiz_question_data';


                        $query = "SELECT * FROM $table_name";

                        // Retrieve the results
                        $results = $wpdb->get_results($query, ARRAY_A);
                        $response = array();
                        // Check if there are any results
                        if ($results) {
                            // Loop through each row of the results
                            foreach ($results as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><input type="text" class="questionno<?php echo $row['id']; ?>" data-id= <?php echo $row['id']; ?> value="<?php echo $row['question']; ?>"></td>
                                    <td>
                                        <div class="action">
                                            <div class="btn btn-success update-question" data-id="<?php echo $row['id']; ?>">Update</div>
                                            <div class="btn btn-danger delete-question" data-id="<?php echo $row['id']; ?>">Delete</div>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }
                        }

                        ?>

                    </table>



                </div>
            </div>
        </div>



        <script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>

        <script>
            jQuery(document).ready(function($) {
                function unloadingToLoading() {
                    $('.unloading').addClass('loading');
                    $('.loading').removeClass('unloading');
                }

                function loadingToUnloading() {
                    $('.loading').addClass('unloading');
                }

                $('.sub-subject-submit').click(function(e) {
                    e.preventDefault();

                    var question = $('input.subsubjects').val();
                    if ('' != question) {
                        //Proccess
                        unloadingToLoading();
                        console.log(question);
                        $('.inputbox p').text('Adding The Question, Please Wait....');
                        $('.inputbox p').css('color', 'Green');
                        $.ajax({
                            url: '<?php echo admin_url('/admin-ajax.php') ?>',
                            type: 'POST',
                            data: {
                                action: 'add_new_question_to_database',
                                question: question,
                            },
                            success: function(response) {
                                console.log('Question Saved');
                                console.log(response); // Log any response from the server
                                window.location.reload(); // Reload the page
                            },
                            error: function(xhr, status, error) {
                                console.error('Error sending data:', error);
                            }
                        });
                    } else {
                        alert('Add Question First');
                    }


                });


                $('.delete-question').click(function(e) {
                    e.preventDefault();

                    if (confirm('Are You Sure to Delete Question Number' + $(this).data('id'))) {
                        console.log('Yes');
                        unloadingToLoading();
                        var id = $(this).data('id');
                        $.ajax({
                            url: '<?php echo admin_url('/admin-ajax.php') ?>',
                            type: 'POST',
                            data: {
                                action: 'delete_a_question_to_database',
                                questionid: id,
                            },
                            success: function(response) {
                                console.log('Question Deleted');
                                console.log(response); // Log any response from the server
                                window.location.reload(); // Reload the page
                            },
                            error: function(xhr, status, error) {
                                console.error('Error sending data:', error);
                            }
                        });

                    } else {
                        console.log('No');
                    }
                });
                $('.update-question').click(function(e) {
                    e.preventDefault();
                        unloadingToLoading();
                        var id = $(this).data('id');
                        var question = $('.questionno'+ id ).val();
                        console.log(question);
                        $.ajax({
                            url: '<?php echo admin_url('/admin-ajax.php') ?>',
                            type: 'POST',
                            data: {
                                action: 'update_a_question_to_database',
                                questionid: id,
                                question: question,
                            },
                            success: function(response) {
                                console.log('Question Deleted');
                                console.log(response); // Log any response from the server
                                window.location.reload(); // Reload the page
                            },
                            error: function(xhr, status, error) {
                                console.error('Error sending data:', error);
                            }
                        });

                    
                });




            });
        </script>

    <?php
}
function reset_database()
{
    ?>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
        <script src='https://kit.fontawesome.com/46882cce5e.js' crossorigin='anonymous'></script>


        <style>
            .subject-container .container .row {
                font-family: Arial, Helvetica, sans-serif;
                border: 1px solid rgb(177, 177, 177);
                padding: 30px;
                margin: 20px 0 0 0;
                border-radius: 13px;
                box-shadow: inset 1px 1px 10px 0px rgb(170, 170, 170);
            }

            .subject-container .container .sub-box {
                margin: 0 0 20px 0;
            }

            .subject-container .container h6 {
                font-size: 21px;
                font-weight: bold;
                font-family: "Jost", sans-serif;
            }

            .subject-container .container .box {
                padding: 10px 0;
            }

            .sub-subjects.d-block {
                padding: 0;
            }

            .subject-container .container .box .inputbox {
                width: 80%;
            }

            .subject-container .container .box .inputbox p {
                padding: 6px 0 0 0;
                font-size: 11px;
            }

            .subject-container .container .box input {
                width: 100%;
                border: 1px solid rgb(197, 197, 197);
                border-radius: 9px;
                padding: 8px;
                background-color: #ececec;
            }

            .subject-container .container .box i {
                padding: 0;
                border-radius: 9px;
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

        <div class="sub-box d-flex justify-content-between align-items-center">
            <h2>Reset The Databse</span> </h2>

        </div>

        <div class="subject-container">
            <div class="unloading">
                <div class="spiner"></div>
            </div>
            <div class="container">
                <div class="row sub-subjects-box">
                    <div class="sub-box d-flex justify-content-between align-items-center">
                        <h6>Are You Sure to reset Database?</span> </h6>
                    </div>
                    <button class="populate-questions-button btn btn-warning">Reset The Database</button>
                </div>
            </div>
        </div>



        <script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>

        <script>
            jQuery(document).ready(function($) {
                function unloadingToLoading() {
                    $('.unloading').addClass('loading');
                    $('.loading').removeClass('unloading');
                }

                function loadingTounLoading() {
                    $('.loading').addClass('unloading');
                    $('.unloading').removeClass('loading');
                }

                $('.populate-questions-button').click(function(e) {
                    e.preventDefault();

                    if (confirm('Are You Sure to Reset The Database?')) {
                        unloadingToLoading();
                        $.ajax({
                            url: '<?php echo admin_url('/admin-ajax.php') ?>',
                            type: 'POST',
                            data: {
                                action: 'reset_the_database',
                                id : 'new',
                            },
                            success: function(response) {
                                console.log('Database Reseted');
                                console.log(response); // Log any response from the server
                                // Redirect after successful AJAX request
                                window.location.href = '<?php echo admin_url('/admin.php?page=add-new-qustion') ?>';
                            },
                            error: function(xhr, status, error) {
                                console.error('Error sending data:', error);
                            }
                        });

                    } else {
                        console.log('No');
                    }
                });




            });
        </script>

    <?php
}
