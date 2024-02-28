<?php
class Elementor_form_finder extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'form-finder';
    }

    public function get_title()
    {
        return esc_html__('Form Finder', 'renuaddons');
    }

    public function get_icon()
    {
        return 'fas fa-water';
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
        return ['find', 'finder', 'form'];
    }

    protected function render()
    {
        $home_url = untrailingslashit(home_url());
        ?>
        
            <style>
                #custom-filter-form {
                    box-sizing: border-box;
                    border: 1px solid rgb(22, 95, 163);
                    border-radius: 13px;
                    padding: 20px;
                    margin: 30px 0 0 0;
                }
        
                #custom-filter-form h3 {
                    font-family: 'jost';
                    font-size: 21px;
                }
        
                #custom-filter-form .options label {
                    border: 1px solid rgb(235, 235, 235);
                    border-radius: 13px;
                    padding: 10px;
                    margin: 13px;
                    cursor: pointer;
                }
        
                #custom-filter-form .options label.border-selected {
                    border: 5px solid rgb(22, 95, 163);
                    box-shadow: 2px 2px 20px rgba(66, 206, 248, 0.678);
                }
        
                input[type="radio"]:checked {
                    border: 5px solid rgb(22, 95, 163);
                    box-shadow: 2px 2px 20px rgba(66, 206, 248, 0.678);
                }
        
                #custom-filter-form .options label input {
                    visibility: hidden;
                }
        
                #custom-filter-form .options label img {
                    width: 150px;
                }
        
                .error p {
                    color: red;
                }
            </style>

            <div class="container">
                <div class="row">
        
                    <div class="col-md-12">
                        <form id="custom-filter-form">
                            <!-- Question 1 -->
                            <div class="q1 q">
        
        
                                <div id="question1" class="question">
                                    <h3>Frage 1: Welche Oberfläche soll Ihre Haustür haben?</h3>
                                    <div class="options d-flex">
        
        
                                        <label class="form-check">
                                            <input type="radio" name="surface" class="form-check-input" value="lackiert">
                                            <img src="http://xn--eingangstren24-osb.de/wp-content/uploads/2024/02/3-fach-Isolierverglasung_neu.jpg"
                                                alt="Lackiert" class="img-fluid">
                                            Lackiert
                                        </label><br>
                                        <label class="form-check">
                                            <input type="radio" name="surface" class="form-check-input" value="holzdekore">
                                            <img src="http://xn--eingangstren24-osb.de/wp-content/uploads/2024/02/3-fach-Isolierverglasung_neu.jpg"
                                                alt="Holzdekore" class="img-fluid">
                                            Holzdekore
                                        </label><br>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="error">
                                    <p></p>
                                </div>
                                <div class="buttons d-flex justify-content-end">
                                    <div>
                                        <button type="button" id="firstnextBtn" class="btn btn-primary">Next</button>
        
                                    </div>
                                </div>
                            </div>
                            <!-- Question 2 -->
                            <div class="q2 q" style="display:none;">
                                <div id="question2" class="question">
                                    <h3>Frage 2: Möchten Sie ein Glaselement für Ihre Haustür?</h3>
                                    <div class="options d-flex">
                                        <label class="form-check">
                                            <input type="radio" name="glass" class="form-check-input" value="ja">
                                            <img src="http://xn--eingangstren24-osb.de/wp-content/uploads/2024/02/3-fach-Isolierverglasung_neu.jpg"
                                                alt="Ja, mit Glaselement" class="img-fluid">
                                            Ja, mit Glaselement
                                        </label><br>
                                        <label class="form-check">
                                            <input type="radio" name="glass" class="form-check-input" value="nein">
                                            <img src="http://xn--eingangstren24-osb.de/wp-content/uploads/2024/02/3-fach-Isolierverglasung_neu.jpg"
                                                alt="Nein, ohne Glaselement" class="img-fluid">
                                            Nein, ohne Glaselement
                                        </label><br>
                                    </div>
                                    <!-- Buttons -->
                                    <div class="error">
                                        <p></p>
                                    </div>
                                    <div class="buttons d-flex justify-content-between">
                                        <div>
                                            <button type="button" id="scondprebBtn" class="btn btn-secondary">Previous</button>
        
                                        </div>
                                        <div>
                                            <button type="button" id="secondnextBtn" class="btn btn-primary">Next</button>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Question 3 -->
                            <div class="q3 q" style="display:none;">
                                <div id="question3" class="question">
                                    <h3>Frage 3: Welches Glaselement bevorzugen Sie?</h3>
                                    <div class="options d-flex"> <label class="form-check">
                                            <input type="radio" name="glass_type" class="form-check-input" value="klarglas">
                                            <img src="http://xn--eingangstren24-osb.de/wp-content/uploads/2024/02/3-fach-Isolierverglasung_neu.jpg"
                                                alt="Klarglas" class="img-fluid">
                                            Klarglas
                                        </label><br>
                                        <label class="form-check">
                                            <input type="radio" name="glass_type" class="form-check-input"
                                                value="satinato-glas">
                                            <img src="http://xn--eingangstren24-osb.de/wp-content/uploads/2024/02/3-fach-Isolierverglasung_neu.jpg"
                                                alt="Satinatoglas (Milchglas)" class="img-fluid">
                                            Satinatoglas (Milchglas)
                                        </label><br>
                                        <label class="form-check">
                                            <input type="radio" name="glass_type" class="form-check-input" value="motivglas">
                                            <img src="http://xn--eingangstren24-osb.de/wp-content/uploads/2024/02/3-fach-Isolierverglasung_neu.jpg"
                                                alt="Motivglas (Kombination aus Klarglas & Satinatoglas)" class="img-fluid">
                                            Motivglas (Kombination aus Klarglas & Satinatoglas)
                                        </label><br>
                                    </div>
                                    <!-- Buttons -->
                                    <div class="error">
                                        <p></p>
                                    </div>
                                    <div class="buttons d-flex justify-content-between">
                                        <div>
                                            <button type="button" id="thirdprebBtn" class="btn btn-secondary">Previous</button>
        
                                        </div>
                                        <div>
                                            <button type="button" id="thirdnextBtn" class="btn btn-primary">Next</button>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
        
        
        
                            <!-- Question 4 -->
                            <div class="q4 q" style="display:none;">
                                <div id="question4" class="question">
                                    <h3>Frage 4: Welches Modell bevorzugen Sie?</h3>
                                    <div class="options d-flex flex-wrap">
                                        <label class="form-check"> <input type="radio" name="model" class="form-check-input"
                                                value="q1000"> Q1000 </label><br>
                                        <label class="form-check"> <input type="radio" name="model" class="form-check-input"
                                                value="q2000"> Q2000 </label><br>
                                        <label class="form-check"> <input type="radio" name="model" class="form-check-input"
                                                value="q3000"> Q3000 </label><br>
                                        <label class="form-check"> <input type="radio" name="model" class="form-check-input"
                                                value="q4000"> Q4000 </label><br>
                                        <label class="form-check"> <input type="radio" name="model" class="form-check-input"
                                                value="q5000"> Q5000 </label><br>
                                        <label class="form-check"> <input type="radio" name="model" class="form-check-input"
                                                value="q6000"> Q6000 </label><br>
                                        <label class="form-check"> <input type="radio" name="model" class="form-check-input"
                                                value="q7000"> Q7000 </label><br>
                                        <label class="form-check"> <input type="radio" name="model" class="form-check-input"
                                                value="q8000"> Q8000 </label><br>
        
                                    </div>
                                    <!-- Buttons -->
                                    <div class="error">
                                        <p></p>
                                    </div>
                                    <div class="buttons d-flex justify-content-between">
                                        <div>
                                            <button type="button" id="fourthprebBtn" class="btn btn-secondary">Previous</button>
        
                                        </div>
                                        <div>
                                            <button type="button" id="fourthnextBtn" class="btn btn-primary">Next</button>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
        
        
                            <!-- Question 5 -->
                            <div class="q5 q" style="display:none;">
                                <div id="question5" class="question">
                                    <h3>Frage 5: Welches Modell bevorzugen Sie?</h3>
                                    <div class="options d-flex">
                                        <label class="form-check"> <input type="radio" name="model_type"
                                                class="form-check-input" value="hh7270"> HH7270 </label><br>
                                        <label class="form-check"> <input type="radio" name="model_type"
                                                class="form-check-input" value="h1830"> H1830 </label><br>
                                        <label class="form-check"> <input type="radio" name="model_type"
                                                class="form-check-input" value="hv7270"> HV7270 </label><br>
                                    </div>
                                    <!-- Buttons -->
                                    <div class="error">
                                        <p></p>
                                    </div>
                                    <div class="buttons d-flex justify-content-between">
                                        <div>
                                            <button type="button" id="fifthprebBtn" class="btn btn-secondary">Previous</button>
        
                                        </div>
                                        <div>
                                            <button type="submit" id="fifthsubBtn" class="btn btn-success">Submit</button>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
        
        
        
                            <!-- Question 6 -->
                            <div class="q6 q" style="display:none;">
                                <div id="question6" class="question">
                                    <h3>Frage 6: Wählen Sie Ihre bevorzugte Außengrifflänge</h3>
                                    <div class="options d-flex">
                                        <label class="form-check"><input type="radio" name="griff" class="form-check-input"
                                                value="75-cm"> 75 cm</label><br>
                                        <label class="form-check"><input type="radio" name="griff" class="form-check-input"
                                                value="95-cm"> 95 cm</label><br>
                                        <label class="form-check"><input type="radio" name="griff" class="form-check-input"
                                                value="115-cm"> 115 cm</label><br>
                                        <label class="form-check"><input type="radio" name="griff" class="form-check-input"
                                                value="135-cm"> 135 cm</label><br>
                                        <label class="form-check"><input type="radio" name="griff" class="form-check-input"
                                                value="150-cm"> 150 cm</label><br>
                                        <label class="form-check"><input type="radio" name="griff" class="form-check-input"
                                                value="170-cm"> 170 cm</label><br>
        
                                    </div>
                                    <!-- Buttons -->
                                    <div class="error">
                                        <p></p>
                                    </div>
                                    <div class="buttons d-flex justify-content-between">
                                        <div>
                                            <button type="button" id="sixthprebBtn" class="btn btn-secondary">Previous</button>
        
                                        </div>
                                        <div>
                                            <button type="submit" id="sixthhsubBtn" class="btn btn-success">Submit</button>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="detailing">
                    <p>
        
                    </p>
                </div>
            </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script>
        
                jQuery(document).ready(function ($) {
        
                    $('input[type="radio"]').change(function (e) {
                        e.preventDefault();
                        $('input[type="radio"]').parent().removeClass('border-selected');
                        $(this).parent().addClass('border-selected');
                    });
        
                    // re Work Start From here
                    //Next Buttons
                    $('#firstnextBtn').click(function (e) {
                        e.preventDefault();
                        haveBorderRemain();
                        if (null != $('input[name="surface"]:checked').val()) {
                            $(".q").hide();
                            $(".q2").show();
                            $('.error p').text('');
                        } else {
                            $('.error p').text('Please select a Surface First');
                        }
                    });
                    $('#secondnextBtn').click(function (e) {
                        e.preventDefault();
                        haveBorderRemain();
                        if (null != $('input[name="glass"]:checked').val()) {
                            if ('ja' == $('input[name="glass"]:checked').val()) {
                                $(".q").hide();
                                $(".q3").show();
                                $('.error p').text('');
                            } else {
                                if ('lackiert' == $('input[name="surface"]:checked').val()) {
                                    $(".q").hide();
                                    $(".q4").show();
                                    $('.error p').text('');
                                } else {
                                    $(".q").hide();
                                    $(".q5").show();
                                    $('.error p').text('');
                                }
                            }
        
                        } else {
                            $('.error p').text('Please select a glass First');
                        }
        
        
                    });
                    $('#thirdnextBtn').click(function (e) {
                        e.preventDefault();
                        haveBorderRemain();
                        if (null != $('input[name="glass_type"]:checked').val()) {
        
                            if ('lackiert' == $('input[name="surface"]:checked').val()) {
                                $(".q").hide();
                                $(".q4").show();
                                $('.error p').text('');
                            } else {
                                $(".q").hide();
                                $(".q5").show();
                                $('.error p').text('');
                            }
        
                        } else {
                            $('.error p').text('Please select a glass Type First');
                        }
        
        
                    });
                    $('#fourthnextBtn').click(function (e) {
                        e.preventDefault();
                        haveBorderRemain();
                        if (null != $('input[name="model"]:checked').val()) {
        
                            $(".q").hide();
                            $(".q6").show();
                            $('.error p').text('');
        
                        } else {
                            $('.error p').text('Please select a model First');
                        }
        
        
                    });
                    $('#custom-filter-form').submit(function (e) {
                        if (null != $('input[name="model_type"]:checked').val() || null != $('input[name="griff"]:checked').val()) {
                            var surface = $('input[name="surface"]:checked').val();
                            var glass = $('input[name="glass"]:checked').val();
                            var glass_type = $('input[name="glass_type"]:checked').val();
                            var model = $('input[name="model"]:checked').val();
                            var model_type = $('input[name="model_type"]:checked').val();
                            var griff = $('input[name="griff"]:checked').val();
        
                            if ('lackiert' == surface) {
                                if ('ja' == glass) {
                                    var newURL = 'https://xn--eingangstren24-osb.de/produkt/' + model + '/?attribute_pa_glas=' + glass_type + '&attribute_pa_handle-length=' + griff;
                                    // Navigate to the URL
                                    window.location.href = newURL;
                                } else {
                                    var newURL = 'https://xn--eingangstren24-osb.de/produkt/' + model + '/?attribute_pa_handle-length=' + griff;
                                    // Navigate to the URL
                                    window.location.href = newURL;
                                }
                            } else {
                                if ('ja' == glass) {
                                    var newURL = 'https://xn--eingangstren24-osb.de/produkt/' + model_type + '/?attribute_pa_glas=' + glass_type;
                                    // Navigate to the URL
                                    window.location.href = newURL;
                                } else {
                                    var newURL = 'https://xn--eingangstren24-osb.de/produkt/' + model_type;
                                    // Navigate to the URL
                                    window.location.href = newURL;
                                }
                            }
                            //Link Structure https://xn--eingangstren24-osb.de/produkt/hv7270/?attribute_pa_glas=motivglas&attribute_pa_handle-length=35-cm
        
        
                        } else {
                            if ('lackiert' !== $('input[name="surface"]:checked').val()) {
                                $('.error p').text('Please select a model Type First');
                            } else {
                                $('.error p').text('Please select a Griff First');
                            }
                        }
                        e.preventDefault();
        
                    });
                    //Previous Buttons
                    $('#scondprebBtn').click(function (e) {
                        e.preventDefault();
                        haveBorderRemain();
                        $(".q").hide();
                        $(".q1").show();
                        $('.error p').text('');
                    });
                    $('#thirdprebBtn').click(function (e) {
                        e.preventDefault();
                        haveBorderRemain();
                        $(".q").hide();
                        $(".q2").show();
                        $('.error p').text('');
                    });
                    $('#fourthprebBtn').click(function (e) {
                        e.preventDefault();
                        haveBorderRemain();
                        if ('ja' == $('input[name="glass"]:checked').val()) {
                            $(".q").hide();
                            $(".q3").show();
                            $('.error p').text('');
                        } else {
                            $(".q").hide();
                            $(".q2").show();
                            $('.error p').text('');
                        }
                    });
                    $('#fifthprebBtn').click(function (e) {
                        e.preventDefault();
                        haveBorderRemain();
                        if ('ja' == $('input[name="glass"]:checked').val()) {
                            $(".q").hide();
                            $(".q3").show();
                            $('.error p').text('');
                        } else {
                            $(".q").hide();
                            $(".q2").show();
                            $('.error p').text('');
                        }
                    });
                    $('#sixthprebBtn').click(function (e) {
                        e.preventDefault();
                        haveBorderRemain();
                        $(".q").hide();
                        $(".q4").show();
                        $('.error p').text('');
                    });
        
                    function haveBorderRemain() {
                        $('input[type="radio"]:checked').parent().addClass('border-selected');
                    }
        
                });
        
        
            </script>
        <?php 
    }
}
