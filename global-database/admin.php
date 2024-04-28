<?php

// Add Tutor's Subjects Admin Menu
function code_list_call_function_for_admin_widget_menu()
{
    add_menu_page(
        'Global Database', // Page title
        'Global Database', // Menu title
        'manage_options',    // Capability required to access the menu
        'code-list',   // Menu slug
        'code_list_page_content', // Callback function to display the page content
        'dashicons-flag',    // Icon for the menu (you can choose from Dashicons: https://developer.wordpress.org/resource/dashicons/)
        9                   // Menu position
    );
    // add_submenu_page('code-list', 'Add New Question', 'Add new question', 'manage_options', 'add-new-qustion', 'add_new_question_page', 100);
    // add_submenu_page('code-list', 'Reset The Database', 'Reset The databse', 'manage_options', 'reset-database', 'reset_database', 100);
}
add_action('admin_menu', 'code_list_call_function_for_admin_widget_menu');

// Callback function to display the page content


function code_list_page_content()
{
?>
    <div class="wrap">
        <h2>Global Database</h2>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">




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

                    .loading-container {
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        display: none;
                        justify-content: center;
                        align-items: center;
                        z-index: 55555;
                        background-color: rgb(46 46 46 / 59%);

                        /* Semi-transparent background */
                    }

                    .all-dels {
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        z-index: 55555;
                        background-color: rgb(46 46 46 / 59%);

                        /* Semi-transparent background */
                    }

                    .all-dels .row {
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 9px;
                        box-shadow: 0px 4px 6px -1px #3498db;
                        z-index: 555555;
                    }

                    .loading {
                        border: 8px solid #f3f3f3;
                        border-top: 8px solid #3498db;
                        border-radius: 50%;
                        width: 50px;
                        height: 50px;
                        animation: spin 1s linear infinite;
                    }

                    @keyframes spin {
                        0% {
                            transform: rotate(0deg);
                        }

                        100% {
                            transform: rotate(360deg);
                        }
                    }


                    .all_details_text {
                        height: 600px;
                        overflow-x: auto;
                        width: 1004px;
                    }
                </style>
                </head>

                <body>
                    <div class="loading-container">
                        <div class="loading"></div>
                    </div>
                    <div class="all-dels" style="display:none">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center all_details_text">
                                    <h1>All Details About Shakib Shown</h1>
                                    <hr>
                                    <p class=" text-start">
                                        Name : Shakib Shown
                                        Emali: Shakib6472@hotmail.com
                                        All Question & Answer List Here
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="backend-view">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="list-of-users">
                                        <form action="">
                                            <table id="datatablewithcode">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 3%;">ID</th>
                                                        <th style="width: 15%;">Full Name</th>
                                                        <th style="width: 15%;">Email</th>
                                                        <th style="width: 20%;">Date</th>
                                                        <th style="width: 20%;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php


                                                    global $wpdb;

                                                    $table_name = $wpdb->prefix . 'global_survey_details';

                                                    // Select all data from the custom database table
                                                    $query = "SELECT * FROM $table_name";

                                                    // Retrieve the results
                                                    $results = $wpdb->get_results($query, ARRAY_A);

                                                    // Check if there are any results
                                                    if ($results) {
                                                        // Loop through each row of the results
                                                        //     // SQL to create table
                                                        // $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}global_survey_details (
                                                        //     id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                        //     fullname VARCHAR(255) NOT NULL,
                                                        //     email VARCHAR(255),
                                                        //     all_details TEXT NOT NULL,
                                                        //     regi_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                                                        // )";
                                                        foreach ($results as $row) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $row['id']; ?></td>
                                                                <td><?php echo $row['fullname']; ?></td>
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['regi_date']; ?></td>
                                                                <td>

                                                                    <div>
                                                                        <div class="btn btn-success js--view-all-details" data-id="<?php echo $row['id']; ?>"> View</div>
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
                        </div>


                    </div>

                    <script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>
                    <script src="https://kit.fontawesome.com/46882cce5e.js" crossorigin="anonymous"></script>
                    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
                    <script>
                        jQuery(document).ready(function($) {
                            let table = new DataTable('#datatablewithcode');

                            $('.js--view-all-details').click(function(e) {
                                e.preventDefault();
                                $('.loading-container').css('display', 'flex');
                                var id = $(this).data('id');
                                console.log(id);
                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo admin_url('/admin-ajax.php') ?>', // WordPress AJAX URL provided via wp_localize_script
                                    data: {
                                        action: 'get_surveydata_fromdatabase', // Action hook to handle the AJAX request in your functions.php
                                        id: id, // Pass form data to the backend
                                    },

                                    success: function(response) {
                                        // Handle success response
                                        //console.log(response);
                                        // console.log(response.data.all_details);
                                        // console.log(response.data.email);
                                        // console.log(response.data.fullname);



                                        // Parse JSON data
                                        var data = JSON.parse(response.data.all_details);

                                        // Function to create HTML for displaying data
                                        function displayData(data) {
    var html = "<ul>";
    for (var key in data) {
        var modifiedKey = key.replace(/_/g, ' '); // Replace underscores with spaces in the key
        html += "<li class='form-control'><strong>" + modifiedKey + ":</strong> ";
        if (typeof data[key] === 'object') {
            html += displayData(data[key]); // Recursively call to display nested objects
        } else {
            html += data[key];
        }
        html += "</li>";
    }
    html += "</ul>";
    return html;
}

                                        // Display data

                                        $('.all-dels h1').text('All Details About ' + response.data.fullname);
                                        $('.all-dels p').html(displayData(data));
                                        $('.all-dels').show();
                                        $('.loading-container').css('display', 'none');


                                        // Reload the window
                                        // location.reload();
                                    },
                                    error: function(xhr, textStatus, errorThrown) {
                                        // Handle error
                                        console.error('Error:', errorThrown);
                                    }
                                });

                            });

                            $('.all-dels').click(function(e) {
                                e.preventDefault();
                                $('.all-dels').hide();
                                $('.loading-container').css('display', 'none');
                            });
                        });
                    </script>


                </body>
            </div>
        </div>
    </div>

<?php
}
