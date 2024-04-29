<?php
class Elementor_custom_regi_form extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'custom-manual-refistration-form';
    }

    public function get_title()
    {
        return esc_html__('Registration Form ', 'boikotha');
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
        return ['registration', 'regi', 'form'];
    }

    protected function render()
    {

?>

        <style>
            .mt-2rem {
                margin-top: 2rem !important;
            }
            p.error {
                font-size: 21px;
                font-weight: bold;
            }
        </style>


        <script src='https://kit.fontawesome.com/46882cce5e.js' crossorigin='anonymous'></script>
        <section class="vh-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                        <form class="row g-3 needs-validation" novalidate>
                                            <div class="col-md-6 m-0">
                                                <label for="validationCustom01" class="form-label">First name</label>
                                                <input type="text" class="form-control" id="validationCustom01" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please Enter First Name
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-0">
                                                <label for="validationCustom02" class="form-label">Last name</label>
                                                <input type="text" class="form-control" id="validationCustom02" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please Enter last Name
                                                </div>
                                            </div>
                                            <div class="col-md-12 m-0">
                                                <label for="validationCustomUsername" class="form-label">Username</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                                    <div class="valid-feedback">
                                                        Looks Good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 m-0">
                                                <label for="validationCustomemail" class="form-label">Email</label>
                                                <div class="input-group has-validation">

                                                    <input type="email" class="form-control" id="validationCustomemail" aria-describedby="inputGroupPrepend" required>
                                                    <div class="valid-feedback">
                                                        Looks Good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please Enter Email.
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-12 m-0">
                                                <label for="validatpasseord" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="validatpasseord" required>
                                                <div class="valid-feedback">
                                                    Looks Good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please Enter a Secure Password.
                                                </div>
                                            </div>

                                            <div class="col-12 m-0">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                    <label class="form-check-label" for="invalidCheck">
                                                        Agree to terms and conditions
                                                    </label>
                                                    <div class="invalid-feedback">
                                                        You must agree before submitting.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Perfect!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-success" type="submit">Apply for Registration</button>
                                                <p class="error text-danger font-semibold"></p>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                        <img src="https://ajitaalem.com/wp-content/uploads/2024/04/draw1.webp" class="img-fluid" alt="Sample image">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <script>
            jQuery(document).ready(function($) {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = $('.needs-validation');

                // Loop over them and prevent submission
                forms.each(function() {
                    $(this).on('submit', function(event) {
                        if (!this.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();

                        } else {
                            // Everything is fine Now Work for Submit the form
                            event.preventDefault();
                            // Serialize the form data into an array of objects
                            var firstname = $('#validationCustom01').val();
                            var lastname = $('#validationCustom02').val();
                            var username = $('#validationCustomUsername').val();
                            var email = $('#validationCustomemail').val();
                            var password = $('#validatpasseord').val();

                            console.log(firstname);
                            console.log(lastname);
                            console.log(username);
                            console.log(email);
                            console.log(password);

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo admin_url('admin-ajax.php') ?>', // WordPress AJAX URL provided via wp_localize_script
                                data: {
                                    action: 'add_new_user_as_pending_user', // Action hook to handle the AJAX request in your functions.php
                                    firstname: firstname, // Pass form data to the backend
                                    lastname: lastname,
                                    username: username,
                                    email: email,
                                    password: password,
                                    security: '<?php echo wp_create_nonce("add_new_user_nonce"); ?>' // Nonce for security
                                },
                                dataType: 'json',
                                success: function(response) {
                                    // Handle success response
                                    console.log(response);
                                    $('p.error').text(response.data.message);
                                    console.log(response.success);
                                    if(response.success == true) { 
                                        window.location.href = 'https://wa.me/1234567890';
                                    }
                                    // Reload the window
                                    //location.reload();
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                    // Handle error
                                    console.error('Error:', errorThrown);
                                }
                            });


                        }
                        $(this).addClass('was-validated');

                    });
                });
            });
        </script>
<?php
    }
}
