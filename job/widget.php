<?php
class Elementor_form_finder_skbhabihai_widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'car-calculator-form';
    }

    public function get_title()
    {
        return esc_html__('Car Calculator Form ', 'shakib-helper');
    }

    public function get_icon()
    {
        return 'far fa-waters';
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
        return [];
    }

    protected function render()
    {
        $home_url = untrailingslashit(home_url());
?>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'
        integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
    <script src='https://kit.fontawesome.com/46882cce5e.js' crossorigin='anonymous'></script>


    <div class="elementor-widget-container">
        <style>
            .select-max-height {
                max-height: 300px;
                overflow-y: auto;
            }

            .lacks-wrapper {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
            }

            .transport-wrapper {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
            }

            .popup {
                padding: 60px;
                border: 1px solid red;
            }

            .main {
                position: relative;
            }

            .popup-box {
                background-color: rgb(255, 255, 255);
                box-shadow: 10px 10px 100px 1000px rgba(0, 0, 0, 0.705);
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 60px;
            }

            input[type="text"] {

                margin: 5px;
                border-radius: 3px;
                border: 1px solid black;
            }
        </style>
        <div class="main">
            <div class="container mt-md-5" id="carculator-wrapper">
                <div class="row">
                    <div class="sec-title centered">
                        <div class="h2 text-center ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;"
                                    data-sider-select-id="6a9ba803-b298-4819-9b77-8579970bb116">Car calculator</font>
                            </font>
                        </div>
                        <div class="separater"></div>
                        <div class="text text-center">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Calculate the price for your car</font>
                            </font>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="region-wrapper">
                                <label for="region">Region</label> <br>
                                <select name="region" class="select-max-height select2-hidden-accessible" id="region"
                                    data-select2-id="region" tabindex="-1" aria-hidden="true">
                                    <option value="" disabled selected>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Region</font>
                                        </font>
                                    </option>
                                    <option value="31">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Botevgrad</font>
                                        </font>
                                    </option>
                                    <option value="45">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Burgas</font>
                                        </font>
                                    </option>
                                    <option value="57">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Varna</font>
                                        </font>
                                    </option>


                                </select>
                                <br>
                                <br>


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="h4">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Vehicle information</font>
                                </font>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 text-center">
                            <div class="brand-wrapper">
                                <label for="brand">Brand</label>
                                <select name="brand" class="" id="brand" aria-hidden="true">
                                    <option value="0" disabled selected>Brand</option>
                                    <option value="30" data-name="Alfa Romeo">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Alfa Romeo</font>
                                        </font>
                                    </option>
                                    <option value="40" data-name="Audi">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Audi</font>
                                        </font>
                                    </option>
                                    <option value="50" data-name="BMW">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">BMW</font>
                                        </font>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center">
                            <div class="model-wrapper">
                                <label for="model">Model</label><br>
                                <select name="model" id="model">
                                    <option value="" disabled selected>Model</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center">
                            <div class="modification-wrapper">
                                <label for="modification">Modification</label>
                                <select name="modification" class="select-max-height select2-hidden-accessible"
                                    id="modification" data-select2-id="modification" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="8" disabled selected>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Modification</font>
                                        </font>
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="lacks">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <div class="h4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Absences</font>
                                    </font>
                                </div>
                            </div>
                        </div>
                        <div class="lacks-wrapper">
                            <div class="col-xs-12">
                                <input type="checkbox" id="3" name="lacks" value="20">
                                <label for="3">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Battery is missing</font>
                                    </font>
                                </label>
                            </div>
                            <div class="col-xs-12 ">
                                <input type="checkbox" id="5" name="lacks" value="250">
                                <label for="5">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Missing Engine</font>
                                    </font>
                                </label>
                            </div>
                            <div class="col-xs-12">
                                <input type="checkbox" id="4" name="lacks" value="40">
                                <label for="4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Wheels are missing</font>
                                    </font>
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="transport">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <div class="h4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Transportation</font>
                                    </font>
                                </div>
                            </div>
                        </div>
                        <div class="transport-wrapper d-grid">
                            <div class="col-xs-12 ">
                                <input type="radio" id="transport-non" name="transport" value="60.00">
                                <label for="transport-non">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">I'll bring her to the place</font>
                                    </font>
                                </label>
                            </div>
                            <div class="col-xs-12 ">
                                <input type="radio" id="transport-yes" name="transport" checked="checked" value="0.00">
                                <label for="transport-yes">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Download by transport from Ekometal
                                        </font>
                                    </font>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <button class="carculator-button" id="give-me-price">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Give me a price</font>
                                </font>
                            </button>

                            <div class="text-danger error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container popup-box" style="display:none;">
                <div class="popup text-center">
                    <div class="total">Your Total Amount is</div>
                    <h6 class="amount">650 TAKA</h6>

                    <div class="detaiuls">
                        <h6>Save the Data</h6>
                        <div class="box d-flex "><label for="name">Name: </label><input type="text" name="name" id="username">
                        </div>
                        <div class="box d-flex "><label for="name">Email: </label><input type="text" name="email" id="useremail">
                        </div>
                        <br>
                        <button class="btn btn-success adding-to-database">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src='https://code.jquery.com/jquery-3.7.1.min.js'
        integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>
    </script>

    <script>
        $(document).ready(function () {

            function setModels(name, value) {
                $('#model').empty();
                //$('#modification').empty();
                $('#model').append('<option disabled selected> Model </option>');
                for (let i = 1; i <= 4; i++) {

                    $('#model').append($('<option>', {
                        value: value * i,
                        'data-name': name + ' Model ' + i,
                        text: name + ' Model ' + i
                    }));
                    // Concatenate name with the index i and push it to the array
                }
            }
            function setModifications(name, value) {
                $('#modification').empty();
                $('#modification').append('<option disabled selected> Modification </option>');
                for (let i = 1; i <= 4; i++) {

                    $('#modification').append($('<option>', {
                        value: value * i,
                        text: name + ' Modify ' + i
                    }));
                    // Concatenate name with the index i and push it to the array
                }
            }

            $('#brand').on('change', function () {
                var selectedValue = $(this).val();
                var selectedOption = $(this).find('option:selected');
                //var selectedText = $(this).data('name');
                console.log(selectedOption);
                var selectedText = selectedOption.data('name');
                console.log("Selected value: " + selectedValue);
                setModels(selectedText, 50);
            });

            $('#model').on('change', function () {
                var selectedValue = $(this).val();
                var selectedOption = $(this).find('option:selected');
                console.log(selectedOption);
                //var selectedText = $(this).data('name');
                var selectedText = selectedOption.data('name');
                console.log("Selected value: " + selectedValue);
                setModifications(selectedText, 20);
            });

            //Main Functions
            $('#give-me-price').click(function (e) {
                e.preventDefault();
                var region = $('#region').val();
                var brand = $('#brand').val();
                var model = $('#model').val();
                var modification = $('#modification').val();
                var BatteryValue = $('#3').prop('checked') ? $('#3').val() : 0;
                var wheelsValue = $('#4').prop('checked') ? $('#4').val() : 0;
                var engineValue = $('#5').prop('checked') ? $('#5').val() : 0;
                var transport = $('#transport-non').prop('checked') ? $('#transport-non').val() : 0;


                console.log("Brand: " + brand);
                console.log("Model: " + model);
                console.log("Modification: " + modification);
                console.log("Battery Value: " + BatteryValue);
                console.log("Wheels Value: " + wheelsValue);
                console.log("Engine Value: " + engineValue);
                console.log("Transport: " + transport);

                if (null !== region) {
                    if (null !== brand) {
                        if (null !== model) {
                            if (null !== modification) {
                                $('.error').text('');
                                // Convert variables to numbers if necessary
                                region = parseInt(region);
                                brand = parseInt(brand);
                                model = parseInt(model);
                                modification = parseInt(modification);
                                BatteryValue = parseInt(BatteryValue);
                                wheelsValue = parseInt(wheelsValue);
                                engineValue = parseInt(engineValue);
                                transport = parseInt(transport);
                                totalValue = brand + model + modification - BatteryValue - wheelsValue - engineValue + transport;
                                console.log(totalValue);

                                $('.amount').text(totalValue + ' Taka');
                                $('.popup-box').show();
                                //$('.popup-box').css('display','block');
                                //$(selector).css(propertyName, value);

                            } else {
                                $('.error').text('Please Select Modification First');
                            }

                        } else {
                            $('.error').text('Please Select Model First');
                        }
                    } else {
                        $('.error').text('Please Select Brand First');
                    }
                } else {
                    $('.error').text('Please Select Region First');
                }

            });

            $('.adding-to-database').click(function (e) {
                e.preventDefault();
                console.log('working');
                var region = $('#region').val();
                var brand = $('#brand').val();
                var model = $('#model').val();
                var modification = $('#modification').val();
                var BatteryValue = $('#3').prop('checked') ? $('#3').val() : 0;
                var wheelsValue = $('#4').prop('checked') ? $('#4').val() : 0;
                var engineValue = $('#5').prop('checked') ? $('#5').val() : 0;
                var transport = $('#transport-non').prop('checked') ? $('#transport-non').val() : 0;
                region = parseInt(region);
                brand = parseInt(brand);
                model = parseInt(model);
                modification = parseInt(modification);
                BatteryValue = parseInt(BatteryValue);
                wheelsValue = parseInt(wheelsValue);
                engineValue = parseInt(engineValue);
                transport = parseInt(transport);
                totalValue = brand + model + modification - BatteryValue - wheelsValue - engineValue + transport;
                console.log(totalValue);
                var username = $('#username').val();
                var useremail = $('#useremail').val();

                $(this).text('Submitting...')

                $.ajax({
                type: 'POST',
                url: '<?php echo admin_url('/admin-ajax.php'); ?>', // WordPress AJAX URL provided via wp_localize_script
                data: {
                action: 'add_new_data_from_user', // Action hook to handle the AJAX request in your functions.php
                useremail: useremail,
                username: username, 
                total: totalValue,
                region: region
                },
                success: function(response) {
                // Handle success response
                console.log(response);
                // Reload the window
                location.reload();
                },
                error: function(xhr, textStatus, errorThrown) {
                // Handle error
                console.error('Error:', errorThrown);
                }
                });



            });


        });


    </script>

<?php
    }
}
