<?php


function save_user_data_and_details()
{
    global $wpdb;

    // Parse the JSON data sent from the frontend
    $userArray = json_decode(stripslashes($_POST['userArray']), true);


    // Extract user details
    $name = $userArray[0]['name'];
    $email = $userArray[0]['email'];
    $phone = $userArray[0]['phone'];
    $total = $userArray[0]['total']; // Optional if you want to save the total score
    $formDataJSON = json_decode(stripslashes($_POST['formDataJSON']), true);

    // Insert data into the database
    $table_name = $wpdb->prefix . 'quiz_user_data';
    $wpdb->insert(
        $table_name,
        array(
            'username' => $name,
            'email' => $email,
            'phone' => $phone,
            'total' => $total, // Optional if you want to save the total score
            'detailarray' => json_encode($formDataJSON) // Store the entire userArray as JSON
        )
    );

    // Send a response back to the frontend
    echo 'Data saved successfully';

    // Don't forget to exit
    wp_die();
}


// Add an action to handle the AJAX request
add_action('wp_ajax_save_user_data_and_details', 'save_user_data_and_details');
add_action('wp_ajax_nopriv_save_user_data_and_details', 'save_user_data_and_details'); // Handle non-logged in users as well


//Get data for user
function getthisuserdatareselts()
{

    global $wpdb;

    $table_name = $wpdb->prefix . 'quiz_user_data';


    $id  = $_POST['id'];
    $query = "SELECT * FROM $table_name  WHERE id=$id";

    // Retrieve the results
    $results = $wpdb->get_results($query, ARRAY_A);
    $response = array();
    // Check if there are any results
    if ($results) {
        // Loop through each row of the results
        foreach ($results as $row) {
            $details = $row['detailarray'];
            $response[] = $details;
        }

        // Send the response back to the frontend as JSON
        echo json_encode($response);

        // Don't forget to exit
    }

    wp_die();
}


// Add an action to handle the AJAX request
add_action('wp_ajax_getthisuserdatareselts', 'getthisuserdatareselts');
add_action('wp_ajax_nopriv_getthisuserdatareselts', 'getthisuserdatareselts'); // Handle non-logged in users as well


/*================================================
* Adding A new Question
* ================================================*/



//Get data for user
function add_new_question_to_database()
{

    global $wpdb;

    $table_name = $wpdb->prefix . 'quiz_question_data';


    $question  = $_POST['question'];
     // Insert data into the database
     $wpdb->insert(
         $table_name,
         array(
             'question' => $question
         )
     );

        // Send the response back to the frontend as JSON
        echo json_encode($question);

        // Don't forget to exit
        wp_die();
    }




// Add an action to handle the AJAX request
add_action('wp_ajax_add_new_question_to_database', 'add_new_question_to_database');
add_action('wp_ajax_nopriv_add_new_question_to_database', 'add_new_question_to_database'); // Handle non-logged in users as well



/*================================================
* Deleting A new Question
* ================================================*/

function delete_a_question_to_database()
{

    global $wpdb;

    $table_name = $wpdb->prefix . 'quiz_question_data';


    $id  = $_POST['questionid'];

      // Attempt to delete the question from the database
    $deleted = $wpdb->delete( $table_name, array( 'id' => $id ) );

        // Send the response back to the frontend as JSON
        if ($deleted === false) {
           
            echo json_encode('Data is not deleted');
        } else {
            echo json_encode('Data is deleted Successfully');
        }

        // Don't forget to exit
        wp_die();
    }




// Add an action to handle the AJAX request
add_action('wp_ajax_delete_a_question_to_database', 'delete_a_question_to_database');
add_action('wp_ajax_nopriv_delete_a_question_to_database', 'delete_a_question_to_database'); // Handle non-logged in users as well
/*================================================
* Updating  A new Question
* ================================================*/

function update_a_question_to_database()
{

    global $wpdb;

    $table_name = $wpdb->prefix . 'quiz_question_data';


    $id  = $_POST['questionid'];
    $question  = $_POST['question'];

    $existing_question = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $id");

    if ($existing_question) {
        // Update existing question
        $wpdb->update(
            $table_name,
            array('question' => $question),
            array('id' => $id)
        );
    }


            echo json_encode('Data is Updated Successfully');

        // Don't forget to exit
        wp_die();
    }




// Add an action to handle the AJAX request
add_action('wp_ajax_update_a_question_to_database', 'update_a_question_to_database');
add_action('wp_ajax_nopriv_update_a_question_to_database', 'update_a_question_to_database'); // Handle non-logged in users as well



/*================================================
* Reseting the database
* ================================================*/

function reset_the_database()
{

    global $wpdb;
    $table_name = $wpdb->prefix . 'quiz_question_data';

    // Clear existing data
    $wpdb->query("TRUNCATE TABLE $table_name");

    // Populate or update the table
    for ($id = 1; $id <= 70; $id++) {
        $question = "Question text $id ?";
        $existing_question = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $id");

        if ($existing_question) {
            // Update existing question
            $wpdb->update(
                $table_name,
                array('question' => $question),
                array('id' => $id)
            );
        } else {
            // Insert new question
            $wpdb->insert(
                $table_name,
                array(
                    'id' => $id,
                    'question' => $question
                )
            );
        }
    }

    // Send response
    wp_send_json_success('Quiz questions seeded successfully.');



        // Don't forget to exit
        wp_die();
    }




// Add an action to handle the AJAX request
add_action('wp_ajax_reset_the_database', 'reset_the_database');
add_action('wp_ajax_nopriv_reset_the_database', 'reset_the_database'); // Handle non-logged in users as well
