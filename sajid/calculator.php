<?php
class Elementor_calculator_form_build extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'calculator-form';
    }

    public function get_title()
    {
        return esc_html__('Calculator Form ', 'shakib-helper');
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
				'label' => esc_html__( 'Content', 'shakib-helper' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'left-image',
			[
				'label' => esc_html__( 'Choose Left Side Image', 'shakib-helper' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'right-image',
			[
				'label' => esc_html__( 'Choose Right Side Image', 'shakib-helper' ),
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
        $lefturl = $settings['left-image']['url'];
        $rightturl = $settings['right-image']['url'];
?>

    <div class="container">
        <div class="heading-area">
            <div class="radio-area">
                <div id="fbuilder">
                    <div id="fbuilder_1" data-processed="1">
                        <div id="formheader_1">
                            <div class="fform" id="field">
                                <h2>PLASTIC IMPACT CALCULATOR</h2>
                            </div>
                        </div>
                        <div id="fieldlist_1 " class="top_aligned row d-flex flex-row flex-nowrap align-items-center justify-content-center">
                           
                            <div class="pb0 pbreak" page="0">
                                <div class="fields slider-desc fieldname3_1 cff-radiobutton-field" id="field_1-0">
                                    <label>QUANTITY CONSUMED<span class="slider-subtitle">(12oz / 360 ml cup
                                            size)</span></label>
                                    <div class="dfield">
                                        <div class="side_by_side"><label for="fieldname3_1_rb0">
                                            <input aria-label="1 Million" name="fieldname3_1" id="fieldname3_1_rb0"
                                                    class="field group valid active" value="1" vt="1" type="radio"  data-key="calculator1"
                                                    > <span>1
                                                    Million</span></label></div>
                                        <div class="side_by_side"><label for="fieldname3_1_rb1">
                                            <input aria-label="10 Million" name="fieldname3_1" id="fieldname3_1_rb1"
                                                    class="field group valid" value="10" vt="10" type="radio" data-key="calculator1"
                                                    > <span>10
                                                    Million</span></label></div>
                                        <div class="side_by_side"><label for="fieldname3_1_rb2">
                                            <input  aria-label="50 Million" name="fieldname3_1" id="fieldname3_1_rb2"
                                                    class="field group valid" value="50" vt="50" type="radio" data-key="calculator1"
                                                    > <span>50
                                                    Million</span></label></div>
                                        <div class="side_by_side"><label for="fieldname3_1_rb3">
                                            <input aria-label="100 Million" name="fieldname3_1" id="fieldname3_1_rb3"
                                                    class="field group valid" value="100" vt="100" type="radio" data-key="calculator1"
                                                    > <span>100
                                                    Million</span></label></div>
                                        <div class="side_by_side"><label for="fieldname3_1_rb4">
                                            <input aria-label="1 Billion" name="fieldname3_1" id="fieldname3_1_rb4"
                                                    class="field group valid" value="1000" vt="1000" type="radio" data-key="calculator1"
                                                    > <span>1
                                                    Billion</span></label></div>
                                        <div class="side_by_side"><label for="fieldname3_1_rb5">
                                            <input aria-label="10 Billion" name="fieldname3_1" id="fieldname3_1_rb5"
                                                    class="field group valid" value="10000" vt="10000" type="radio" data-key="calculator1"
                                                    > <span>10
                                                    Billion</span></label></div>
                                        <div class="clearer"></div><span class="uh"></span>
                                    </div>
                                    <div class="clearer"></div>
                                </div>
                                <div class="gridbox">
                                    <div class="left position-relative">
                                        <div class="left-image" >
                                            <img style = "max-width: 200px;" src="<?php echo $lefturl; ?>" alt="">
                                        </div>
                                        <div class="first-line"></div>
                                        <div class="second-line"></div>
                                    </div>
                                    <div class="middle">                               

                                    <div class="fields numbers-sect fieldname4_1 cff-calculated-field" id="field_1-1"
                                        style=""><label for="fieldname4_1">PLASTIC lid (PE/PP/PS)</label>
                                        <div class="dfield"><input aria-label="PLASTIC lid (PE/PP/PS)" id="fieldname4_1"
                                                name="fieldname4_1" readonly=""
                                                class="codepeoplecalculatedfield field medium" type="text" value="3,500 KG"
                                                autocomplete="new-password" dep="" notdep=""><span class="uh"></span></div>
                                        <div class="clearer"></div>
                                    </div>
                                    <div class="fields numbers-sect fieldname6_1 cff-calculated-field" id="field_1-2"
                                        style=""><label for="fieldname6_1">PLASTIC coated paper</label>
                                        <div class="dfield"><input aria-label="PLASTIC coated paper" id="fieldname6_1"
                                                name="fieldname6_1" readonly=""
                                                class="codepeoplecalculatedfield field medium" type="text" value="825 KG"
                                                autocomplete="new-password" dep="" notdep=""><span class="uh"></span></div>
                                        <div class="clearer"></div>
                                    </div>
                                    <div class="fields numbers-sect pink-box fieldname5_1 cff-calculated-field"
                                        id="field_1-3" style=""><label for="fieldname5_1">TOTAL PLASTIC SAVED</label>
                                        <div class="dfield"><input aria-label="TOTAL PLASTIC SAVED" id="fieldname5_1"
                                                name="fieldname5_1" readonly=""
                                                class="codepeoplecalculatedfield field medium" type="text" value="4,325 KG"
                                                autocomplete="new-password" dep="" notdep=""><span class="uh"></span></div>
                                        <div class="clearer"></div>
                                    </div></div>
                                    <div class="right  position-relative">
                                        <div class="left-image" >
                                            <img style = "max-width: 200px;" src="<?php echo $rightturl; ?>" alt="">
                                            <div class="third-line"></div>
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
