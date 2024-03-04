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
        //First Step Controll
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Step 1 Controls', 'form-finder'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'step1_title',
            [
                'label' => esc_html__('Title', 'form-finder'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Frage 1: Welche Oberfläche soll Ihre Haustür haben?', 'form-finder'),
                'placeholder' => esc_html__('Type your title here', 'form-finder'),
            ]
        );

        $this->add_control(
            'first-image1',
            [
                'label' => esc_html__('Lackiert', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'first-image2',
            [
                'label' => esc_html__('Holzdekore', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->end_controls_section();


        //Second Steps Controls
        $this->start_controls_section(
            'content_section2',
            [
                'label' => esc_html__('Step 2 Image', 'form-finder'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'step2_title',
            [
                'label' => esc_html__('Title', 'form-finder'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Frage 2: Möchten Sie ein Glaselement für Ihre Haustür?', 'form-finder'),
                'placeholder' => esc_html__('Type your title here', 'form-finder'),
            ]
        );

        $this->add_control(
            '2nd-image1',
            [
                'label' => esc_html__('Ja, mit Glaselement', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            '2nd-image2',
            [
                'label' => esc_html__('Nein, ohne Glaselement', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
        //Third Steps Controls
        $this->start_controls_section(
            'content_section3',
            [
                'label' => esc_html__('Step 3 Controls', 'form-finder'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'step3_title',
            [
                'label' => esc_html__('Title', 'form-finder'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Frage 3: Welches Glaselement bevorzugen Sie?', 'form-finder'),
                'placeholder' => esc_html__('Type your title here', 'form-finder'),
            ]
        );

        $this->add_control(
            '3rd-image1',
            [
                'label' => esc_html__('Klarglas', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            '3rd-image2',
            [
                'label' => esc_html__('Satinatoglas (Milchglas)', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            '3rd-image3',
            [
                'label' => esc_html__('Motivglas', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
        //Fourth Steps Controls
        $this->start_controls_section(
            'content_section4',
            [
                'label' => esc_html__('Step 4 Controls', 'form-finder'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'step4_title',
            [
                'label' => esc_html__('Title', 'form-finder'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Frage 4: Welches Modell bevorzugen Sie?', 'form-finder'),
                'placeholder' => esc_html__('Type your title here', 'form-finder'),
            ]
        );

        $this->end_controls_section();
        //Fifth Steps Controls
        $this->start_controls_section(
            'content_section5',
            [
                'label' => esc_html__('Step 5 Controls', 'form-finder'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'step5_title',
            [
                'label' => esc_html__('Title', 'form-finder'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Frage 5: Welches Modell bevorzugen Sie?', 'form-finder'),
                'placeholder' => esc_html__('Type your title here', 'form-finder'),
            ]
        );

        $this->end_controls_section();

        //sixth Steps Controls
        $this->start_controls_section(
            'content_section6',
            [
                'label' => esc_html__('Step 6 Controls', 'form-finder'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'step6_title',
            [
                'label' => esc_html__('Title', 'form-finder'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Frage 6: Wählen Sie Ihre bevorzugte Außengrifflänge', 'form-finder'),
                'placeholder' => esc_html__('Type your title here', 'form-finder'),
            ]
        );
        $this->add_control(
            '6th-image1',
            [
                'label' => esc_html__('75 CM', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            '6th-image2',
            [
                'label' => esc_html__('95 CM', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            '6th-image3',
            [
                'label' => esc_html__('115 CM', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            '6th-image4',
            [
                'label' => esc_html__('135 CM', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            '6th-image5',
            [
                'label' => esc_html__('150 CM', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            '6th-image6',
            [
                'label' => esc_html__('170 CM', 'form-finder'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Card', 'form-finder'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Border & Shadow Color', 'form-finder'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' =>  'rgb(255 65 65)',
                'selectors' => [
                    '{{WRAPPER}} #custom-filter-form .options label.border-selected' => 'border: 5px solid {{VALUE}};
                    box-shadow: 2px 2px 20px {{VALUE}};',
                    '{{WRAPPER}} input[type="radio"]:checked ' => 'border: 5px solid {{VALUE}};
                    box-shadow: 2px 2px 20px {{VALUE}};',
                ],
                // #custom-filter-form .options label.border-selected {
                //     border: 5px solid rgb(255 65 65);
                //     box-shadow: 2px 2px 20px rgb(251 0 0 / 74%);
                // }
            ]
        );

        $this->end_controls_section();

        $this->end_controls_tab();

        $this->start_controls_section(
            'style_body_section',
            [
                'label' => esc_html__('Main Body', 'form-finder'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'body_color',
            [
                'label' => esc_html__('Border Color', 'form-finder'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' =>  'rgb(255 65 65)',
                'selectors' => [
                    '{{WRAPPER}} #custom-filter-form' => 'border: 1px solid {{VALUE}};
                    ',
                ],

            ]
        );



        $this->end_controls_tab();



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
        $settings = $this->get_settings_for_display();
        // Get image URLs
        $step1img1 =  $settings['first-image1']['url'];
        $step1img2 =  $settings['first-image2']['url'];
        $step2img1 =  $settings['2nd-image1']['url'];
        $step2img2 =  $settings['2nd-image2']['url'];
        $step3img1 =  $settings['3rd-image1']['url'];
        $step3img2 =  $settings['3rd-image2']['url'];
        $step3img3 =  $settings['3rd-image3']['url'];
        $step6img1 =  $settings['6th-image1']['url'];
        $step6img2 =  $settings['6th-image2']['url'];
        $step6img3 =  $settings['6th-image3']['url'];
        $step6img4 =  $settings['6th-image4']['url'];
        $step6img5 =  $settings['6th-image5']['url'];
        $step6img6 =  $settings['6th-image6']['url'];
        $step1title = $settings['step1_title'];
        $step2title = $settings['step2_title'];
        $step3title = $settings['step3_title'];
        $step4title = $settings['step4_title'];
        $step5title = $settings['step5_title'];
        $step6title = $settings['step6_title'];



?>

        <style>
            #custom-filter-form {
                box-sizing: border-box;
                border-radius: 13px;
                padding: 20px;
                margin: 30px 0 0 0;
            }

            #custom-filter-form h3 {
                font-family: "Ubuntu", Arial, Helvetica, sans-serif;
                font-size: 22px;
            }

            #custom-filter-form .options label {
                border: 1px solid rgb(235, 235, 235);
                border-radius: 13px;
                padding: 10px;
                margin: 13px;
                display: flex;
                cursor: pointer;
                flex-wrap: wrap;
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }




            #custom-filter-form .options label input {
                visibility: hidden;
            }

            #custom-filter-form .options label.opt-4 img {
                width: 100%;
                height: 180px;
                object-fit: cover;
            }


            .error p {
                color: red;
            }

            .opt-2 {
                width: 48%;
            }

            .opt-3 {
                width: 32%;
            }

            .opt-4 {
                width: 21.55%;
            }

        </style>

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <form id="custom-filter-form">
                        <!-- Question 1 -->
                        <div class="q1 q">


                            <div id="question1" class="question">

                                <h3><?php echo $step1title; ?></h3>
                                <div class="options d-flex flex-wrap g-2">


                                    <label class="form-check opt-4">
                                        <input type="radio" name="surface" class="form-check-input" value="lackiert">
                                        <img src="<?php echo $step1img1; ?>" alt="Lackiert" class="img-fluid">
                                        Lackiert
                                    </label><br>
                                    <label class="form-check opt-4">
                                        <input type="radio" name="surface" class="form-check-input" value="holzdekore">
                                        <img src="<?php echo $step1img2; ?>" alt="Holzdekore" class="img-fluid">
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
                                    <button type="button" id="firstnextBtn" class="btn btn-primary">weiter</button>

                                </div>
                            </div>
                        </div>
                        <!-- Question 2 -->
                        <div class="q2 q" style="display:none;">
                            <div id="question2" class="question">
                                <h3><?php echo $step2title; ?></h3>
                                <div class="options d-flex flex-wrap">
                                    <label class="form-check opt-4">
                                        <input type="radio" name="glass" class="form-check-input" value="ja">
                                        <img src="<?php echo $step2img1; ?>" alt="Ja, mit Glaselement" class="img-fluid">
                                        Ja, mit Glaselement
                                    </label><br>
                                    <label class="form-check opt-4">
                                        <input type="radio" name="glass" class="form-check-input" value="nein">
                                        <img src="<?php echo $step2img2; ?>" alt="Nein, ohne Glaselement" class="img-fluid">
                                        Nein, ohne Glaselement
                                    </label><br>
                                </div>
                                <!-- Buttons -->
                                <div class="error">
                                    <p></p>
                                </div>
                                <div class="buttons d-flex justify-content-between">
                                    <div>
                                        <button type="button" id="scondprebBtn" class="btn btn-secondary">vorherige </button>

                                    </div>
                                    <div>
                                        <button type="button" id="secondnextBtn" class="btn btn-primary">weiter</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="q3 q" style="display:none;">
                            <div id="question3" class="question">
                                <h3><?php echo $step3title; ?></h3>
                                <div class="options d-flex flex-wrap"> <label class="form-check opt-4">
                                        <input type="radio" name="glass_type" class="form-check-input" value="klarglas">
                                        <img src="<?php echo $step3img1; ?>" alt="Klarglas" class="img-fluid">
                                        Klarglas
                                    </label><br>
                                    <label class="form-check opt-4">
                                        <input type="radio" name="glass_type" class="form-check-input" value="satinato-glas">
                                        <img src="<?php echo $step3img2; ?>" alt="Satinatoglas (Milchglas)" class="img-fluid">
                                        Satinatoglas (Milchglas)
                                    </label><br>
                                    <label class="form-check opt-4">
                                        <input type="radio" name="glass_type" class="form-check-input" value="motivglas">
                                        <img src="<?php echo $step3img3; ?>" alt="Motivglas (Kombination aus Klarglas & Satinatoglas)" class="img-fluid">
                                        Motivglas (Kombination aus Klarglas & Satinatoglas)
                                    </label><br>
                                </div>
                                <!-- Buttons -->
                                <div class="error">
                                    <p></p>
                                </div>
                                <div class="buttons d-flex justify-content-between">
                                    <div>
                                        <button type="button" id="thirdprebBtn" class="btn btn-secondary">vorherige </button>

                                    </div>
                                    <div>
                                        <button type="button" id="thirdnextBtn" class="btn btn-primary">weiter</button>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Question 4 -->
                        <div class="q4 q" style="display:none;">
                            <div id="question4" class="question">
                                <h3><?php echo $step4title; ?></h3>
                                <div class="options d-flex flex-wrap">
                                    <label class="form-check"> <input type="radio" name="model" class="form-check-input" value="q1000"> Q1000 </label><br>
                                    <label class="form-check"> <input type="radio" name="model" class="form-check-input" value="q2000"> Q2000 </label><br>
                                    <label class="form-check"> <input type="radio" name="model" class="form-check-input" value="q3000"> Q3000 </label><br>
                                    <label class="form-check"> <input type="radio" name="model" class="form-check-input" value="q4000"> Q4000 </label><br>
                                    <label class="form-check"> <input type="radio" name="model" class="form-check-input" value="q5000"> Q5000 </label><br>
                                    <label class="form-check"> <input type="radio" name="model" class="form-check-input" value="q6000"> Q6000 </label><br>
                                    <label class="form-check"> <input type="radio" name="model" class="form-check-input" value="q7000"> Q7000 </label><br>
                                    <label class="form-check"> <input type="radio" name="model" class="form-check-input" value="q8000"> Q8000 </label><br>

                                </div>
                                <!-- Buttons -->
                                <div class="error">
                                    <p></p>
                                </div>
                                <div class="buttons d-flex justify-content-between">
                                    <div>
                                        <button type="button" id="fourthprebBtn" class="btn btn-secondary">vorherige </button>

                                    </div>
                                    <div>
                                        <button type="button" id="fourthnextBtn" class="btn btn-primary">weiter</button>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Question 5 -->
                        <div class="q5 q" style="display:none;">
                            <div id="question5" class="question">
                                <h3><?php echo $step5title; ?></h3>
                                <div class="options d-flex flex-wrap">
                                    <label class="form-check opt-3"> <input type="radio" name="model_type" class="form-check-input" value="hh7270"> HH7270 </label><br>
                                    <label class="form-check opt-3"> <input type="radio" name="model_type" class="form-check-input" value="h1830"> H1830 </label><br>
                                    <label class="form-check opt-3"> <input type="radio" name="model_type" class="form-check-input" value="hv7270"> HV7270 </label><br>
                                </div>
                                <!-- Buttons -->
                                <div class="error">
                                    <p></p>
                                </div>
                                <div class="buttons d-flex justify-content-between">
                                    <div>
                                        <button type="button" id="fifthprebBtn" class="btn btn-secondary">vorherige </button>

                                    </div>
                                    <div>
                                        <button type="submit" id="fifthsubBtn" class="btn btn-success">Einreichen</button>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Question 6 -->
                        <div class="q6 q" style="display:none;">
                            <div id="question6" class="question">
                                <h3><?php echo $step6title; ?></h3>
                                <div class="options d-flex flex-wrap">
                                    <label class="form-check opt-4">
                                        <input type="radio" name="griff" class="form-check-input" value="75-cm">
                                        <img src="<?php echo $step6img1; ?>" alt="Klarglas" class="img-fluid">
                                        75 cm
                                    </label>
                                    <label class="form-check opt-4">
                                        <input type="radio" name="griff" class="form-check-input" value="95-cm">
                                        <img src="<?php echo $step6img2; ?>" alt="Klarglas" class="img-fluid">
                                        95 cm
                                    </label>
                                    <label class="form-check opt-4">
                                        <input type="radio" name="griff" class="form-check-input" value="115-cm">
                                        <img src="<?php echo $step6img3; ?>" alt="Klarglas" class="img-fluid">
                                        115 cm
                                    </label>
                                    <label class="form-check opt-4">
                                        <input type="radio" name="griff" class="form-check-input" value="135-cm">
                                        <img src="<?php echo $step6img4; ?>" alt="Klarglas" class="img-fluid">
                                        135 cm
                                    </label>
                                    <label class="form-check opt-4">
                                        <input type="radio" name="griff" class="form-check-input" value="150-cm">
                                        <img src="<?php echo $step6img5; ?>" alt="Klarglas" class="img-fluid">
                                        150 cm
                                    </label>
                                    <label class="form-check opt-4">
                                        <input type="radio" name="griff" class="form-check-input" value="170-cm">
                                        <img src="<?php echo $step6img6; ?>" alt="Klarglas" class="img-fluid">
                                        170 cm
                                    </label>
                                </div>
                                <!-- Buttons -->
                                <div class="error">
                                    <p></p>
                                </div>
                                <div class="buttons d-flex justify-content-between">
                                    <div>
                                        <button type="button" id="sixthprebBtn" class="btn btn-secondary">vorherige </button>

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
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            jQuery(document).ready(function($) {

                $('input[type="radio"]').change(function(e) {
                    e.preventDefault();
                    $('input[type="radio"]').parent().removeClass('border-selected');
                    $(this).parent().addClass('border-selected');
                });

                // re Work Start From here
                //Next Buttons
                $('#firstnextBtn').click(function(e) {
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
                $('#secondnextBtn').click(function(e) {
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
                $('#thirdnextBtn').click(function(e) {
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
                $('#fourthnextBtn').click(function(e) {
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
                $('#custom-filter-form').submit(function(e) {
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
                $('#scondprebBtn').click(function(e) {
                    e.preventDefault();
                    haveBorderRemain();
                    $(".q").hide();
                    $(".q1").show();
                    $('.error p').text('');
                });
                $('#thirdprebBtn').click(function(e) {
                    e.preventDefault();
                    haveBorderRemain();
                    $(".q").hide();
                    $(".q2").show();
                    $('.error p').text('');
                });
                $('#fourthprebBtn').click(function(e) {
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
                $('#fifthprebBtn').click(function(e) {
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
                $('#sixthprebBtn').click(function(e) {
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
