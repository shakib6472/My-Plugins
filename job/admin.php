<?php

// Add Tutor's Subjects Admin Menu
function code_list_call_function_for_admin_widget_menu()
{
    add_menu_page(
        'Form Submissions', // Page title
        'Form Submissions', // Menu title
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
        <h2>Form Submissions</h2>
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
                </style>
                </head>

                <body>
                    <div class="backend-view">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="list-of-users">
                                        <form action="">
                                            <table id="datatablewithcode">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 3%;">SL</th>
                                                        <th style="width: 15%;">Name</th>
                                                        <th style="width: 15%;">Email</th>
                                                        <th style="width: 15%;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php


                                                    global $wpdb;

                                                    $table_name = $wpdb->prefix . 'form_data_by_shakib';

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
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['total']; ?></td>
                                                               
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
                        });
                    </script>


                </body>
            </div>
        </div>
    </div>

<?php
}
