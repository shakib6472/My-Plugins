<?php
class Elementor_calculator2_form_build extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'calculator2-form';
    }

    public function get_title()
    {
        return esc_html__('Calculator 2 ', 'shakib-helper');
    }

    public function get_icon()
    {
        return 'far fa-water';
    }
    protected function _register_controls()
    {

        //left Image
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'shakib-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'left-image1',
            [
                'label' => esc_html__('Choose Left Side Image 1', 'shakib-helper'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'left-image2',
            [
                'label' => esc_html__('Choose Left Side Image 2', 'shakib-helper'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'left-image3',
            [
                'label' => esc_html__('Choose Left Side Image 3', 'shakib-helper'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'right-image',
            [
                'label' => esc_html__('Choose Right Side Image ', 'shakib-helper'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

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
        $settings = $this->get_settings_for_display();
        $lefturl1 = $settings['left-image1']['url'];
        $lefturl2 = $settings['left-image2']['url'];
        $lefturl3 = $settings['left-image3']['url'];
        $rightturls = $settings['right-image']['url'];
?>

        <div class="container">
            <div class="heading-area">
                <div class="radio-area">
                    <div id="fbuilder">
                        <div id="fbuilder_1" data-processed="1">
                            <div id="formheader_1">
                                <div class="fform" id="field">
                                    <h2>COST SAVING CALCULATOR</h2>
                                </div>
                            </div>
                            <div id="fieldlist_1 " class="top_aligned row d-flex flex-row flex-nowrap align-items-center justify-content-center">

                                <div class="pb0 pbreak" page="0">
                                    <div class="fields slider-desc boxname3_1 cff-radiobutton-field" id="field_1-0">
                                        <label><span class="slider-subtitle">12oz PAPER cup with</span></label>
                                        <div class="dfield">
                                            <div class="side_by_side"><label for="boxname3_1_rb0">
                                                    <input aria-label="1 Million" name="boxname3_1" id="boxname3_1_rb0" class="field group valid active" value="1" vt="1" type="radio" data-key="calculator2"> <span>PLASTIC lid</span></label></div>
                                            <div class="side_by_side"><label for="boxname3_1_rb1">
                                                    <input aria-label="10 Million" name="boxname3_1" id="boxname3_1_rb1" class="field group valid" value="2" vt="2" type="radio" data-key="calculator2"> <span>PAPER lid </span></label></div>
                                            <div class="side_by_side"><label for="boxname3_1_rb2">
                                                    <input aria-label="50 Million" name="boxname3_1" id="boxname3_1_rb2" class="field group valid" value="3" vt="3" type="radio" data-key="calculator2"> <span>BAGASSE lid</span></label></div>
                                            <div class="clearer"></div><span class="uh"></span>
                                        </div>
                                        <div class="clearer"></div>
                                    </div>
                                    <div class="gridbox">
                                        <div class="left position-relative">
                                            <div class="left-image">
                                                <img style="max-width: 200px; " src="<?php echo $lefturl1; ?>" alt="" class="left-image1">
                                                <img style="max-width: 200px; display:none" src="<?php echo $lefturl2; ?>" alt="" class="left-image2">
                                                <img style="max-width: 200px; display:none" src="<?php echo $lefturl3; ?>" alt="" class="left-image3">
                                            </div>
                                        </div>
                                        <div class="middle">

                                            <div class="fields numbers-sect boxname4_1 cff-calculated-field" id="field_1-1" style=""><label for="boxname4_1">COST SAVING</label>
                                                <div class="dfield"><input aria-label="PLASTIC lid (PE/PP/PS)" id="boxname4_1" name="boxname4_1" readonly="" class="codepeoplecalculatedfield field medium" type="text" value="25 TO 35%" autocomplete="new-password" dep="" notdep=""><span class="uh"></span></div>
                                                <div class="clearer"></div>
                                            </div>


                                        </div>
                                        <div class="right  position-relative">
                                            <div class="left-image">
                                                <img style="max-width: 200px;" src="<?php echo $rightturls; ?>" alt="" >
                                               
                                                <div class="third-line2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
