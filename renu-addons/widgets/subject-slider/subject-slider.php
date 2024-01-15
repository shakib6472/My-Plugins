<?php
class Elementor_renu_subject_slider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'subject_slider';
    }

    public function get_title()
    {
        return esc_html__('Renu Subject Slider', 'renuaddons');
    }

    public function get_icon()
    {
        return 'eicon-slider-album';
    }
    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'renuaddons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        //Add the Status control.
        $this->add_control(
            'product_status',
            [
                'type' => \Elementor\Controls_Manager::SELECT,
                'label' => esc_html__('Product Status', 'renuaddons'),
                'options' => [
                    'publish' => esc_html__('Publish', 'renuaddons'),
                    'draft' => esc_html__('Draft', 'renuaddons'),
                    'private' => esc_html__('Private', 'renuaddons'),
                ],
                'default' => 'publish',
            ]
        );
        // Get product categories

        //adding css & js
        wp_enqueue_style('renu-subject-slider-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css', [], '5.2.1', 'all');
        wp_enqueue_style('renu-subject-slider-css', plugin_dir_url(__FILE__) . 'subject-slider.css', [], '1.0.0', 'all');
        wp_enqueue_style('renu-owl-carousel-subject-slider-css', plugin_dir_url(__FILE__) . 'owl.theme.default.min.css', [], '1.0.0', 'all');
        wp_enqueue_script('renu-bootstrap-bundle-subject-slider-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', [], '1.0.0', true);
        wp_enqueue_script('renu-owl-carousel-subject-slider-js', plugin_dir_url(__FILE__) . 'owl.carousel.min.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('renu--subject-slider-js', plugin_dir_url(__FILE__) . 'subject-slider.js', ['jquery'], '1.0.0', true);
        // //end Control
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['slider', 'tutor', 'subject'];
    }

    protected function render()
    {
        $home_url = untrailingslashit(home_url());
?>
        <style>
            label {
                width: calc(100% - 36px) !important;
            }

            label {
                padding: 0;
                vertical-align: middle;
                margin: 0;
                width: 100%;
                line-height: 1;
            }

            label,
            .is-menu.full-width-menu.is-first button.is-search-submit,
            .is-menu.sliding.is-first button.is-search-submit {
                display: inline-block !important;
            }

            .is-screen-reader-text {
                border: 0;
                clip: rect(1px, 1px, 1px, 1px);
                -webkit-clip-path: inset(50%);
                clip-path: inset(50%);
                color: #000;
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute !important;
                width: 1px;
                word-wrap: normal !important;
                word-break: normal;
            }

            input.is-search-input {
                border-right: 0 !important;
            }

            input.is-search-input {
                background: #fff;
                background-image: none !important;
                color: #333;
                padding: 0 12px;
                margin: 0;
                outline: 0 !important;
                font-size: 14px !important;
                height: 36px;
                min-height: 0;
                line-height: 1;
                border-radius: 0;
                border: 1px solid #ccc !important;
                font-family: arial;
                width: 100%;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-appearance: none;
                -webkit-border-radius: 0;
            }

            [type=search] {
                outline-offset: -2px;
                -webkit-appearance: none;
            }

            button.is-search-submit {
                background: 0 0;
                border: 0;
                box-shadow: none !important;
                opacity: 1;
                padding: 0 !important;
                margin: 0;
                line-height: 0;
                outline: 0;
                vertical-align: middle;
                width: 36px;
                height: 36px;
                background-color: #DCDCDC;
            }

            [type=button]:not(:disabled),
            [type=reset]:not(:disabled),
            [type=submit]:not(:disabled),
            button:not(:disabled) {
                cursor: pointer;
                margin: -7px 0 0 -5px;
            }

            [type=button]:not(:disabled),
            [type=submit]:not(:disabled),
            button:not(:disabled) {
                cursor: pointer;
            }

            [type=button]:not(:disabled),
            [type=reset]:not(:disabled),
            [type=submit]:not(:disabled),
            button:not(:disabled) {
                cursor: pointer;
            }

            .is-search-icon {
                width: 36px;
                padding-top: 6px !important;
            }

            .is-search-icon svg {
                width: 22px;
                display: inline;
            }

            [type=button],
            [type=submit],
            button {
                display: inline-block;
                font-weight: 400;
                color: #c36;
                text-align: center;
                white-space: nowrap;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                background-color: transparent;
                border: 1px solid #c36;
                padding: 0.5rem 1rem;
                font-size: 1rem;
                border-radius: 3px;
                transition: all .3s;
            }

            .search-page-redirect {
                display: inline-block;
            }
        </style>
        <div class="elementor-shortcode">

            <label for=""><span class="is-screen-reader-text">Search for:</span><input type="search" id="is-search-input-4497" name="s" value="" class="is-search-input" placeholder="Search here..." autocomplete="off"></label>
            <div class="search-page-redirect"> <button type="submit" class="is-search-submit"><span class="is-screen-reader-text">Search Button</span><span class="is-search-icon"><svg focusable="false" aria-label="Search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                        </svg></span></button>
            </div>

        </div>
        <div class="category">
            <div class="category-wrapper">
                <div class="container">
                    <div class="category-carousel">
                        <div class="owl-carousel owl-theme owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transition: all 0.25s ease 0s; width: 40591px; transform: translate3d(-355px, 0px, 0px);">
                                    <div class="owl-item" style="width: auto; margin-right: 10px;"><a class="link-item" href="#spanish" role="tab" tab-content="spanish-language-tutoring">
                                            <div class="item">
                                                <div class="box"><img src="https://www.princetonreview.com/cms-content/subject-spanish.png" alt="Homework Help Subject Spanish" style="opacity: 1;">
                                                    <h5 class="text-center">Spanish Language Tutoring</h5>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="owl-item" style="width: auto; margin-right: 10px;"><a class="link-item" href="#socialstudies" role="tab" tab-content="social-studies">
                                            <div class="item">
                                                <div class="box"><img src="https://www.princetonreview.com/cms-content/subject-socialstudies.png" alt="Homework Help Subject Social Studies" class="icon-off" style="opacity: 1;">
                                                    <h5 class="text-center">Social Studies</h5>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="owl-item " style="width: auto; margin-right: 10px;"><a class="link-item" href="#english" role="tab" tab-content="english">
                                            <div class="item">
                                                <div class="box"><img src="https://www.princetonreview.com/cms-content/subject-english.png" alt="Homework Help Subject English" style="opacity: 1;">
                                                    <h5 class="text-center">English</h5>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="owl-item " style="width: auto; margin-right: 10px;"><a class="link-item" href="#math" role="tab" tab-content="math">
                                            <div class="item">
                                                <div class="box"><img src="https://www.princetonreview.com/cms-content/subject-math.png" alt="Homework Help Subject Math" style="opacity: 1;">
                                                    <h5 class="text-center">Math</h5>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="owl-item" style="width: auto; margin-right: 10px;"><a class="link-item" href="#science" role="tab" tab-content="science">
                                            <div class="item">
                                                <div class="box"><img src="https://www.princetonreview.com/cms-content/subject-science.png" alt="Homework Help Subject Science" style="opacity: 1;">
                                                    <h5 class="text-center">Science</h5>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="owl-item" style="width: auto; margin-right: 10px;"><a class="link-item" href="#businesstech" role="tab" tab-content="technology">
                                            <div class="item">
                                                <div class="box"><img src="https://www.princetonreview.com/cms-content/subject-businesstech.png" alt="Homework Help Subject Business Tech" style="opacity: 1;">
                                                    <h5 class="text-center">Business & <br> Technology</h5>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="owl-item" style="width: auto; margin-right: 10px;"><a class="link-item" href="#foresignlang" role="tab" tab-content="foreign-language">
                                            <div class="item">
                                                <div class="box"><img src="https://www.princetonreview.com/cms-content/subject-foresignlang.png" alt="Homework Help Subject Foreign Languages" style="opacity: 1;">
                                                    <h5 class="text-center">Foreign Languages</h5>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="owl-item" style="width: auto; margin-right: 10px;"><a class="link-item" href="#internationalbacc" role="tab" tab-content="international-baccalaureate">
                                            <div class="item">
                                                <div class="box"><img src="https://www.princetonreview.com/cms-content/subject-internationalbacc.png" alt="Homework Help Subject International Baccalaureate" style="opacity: 1;">
                                                    <h5 class="text-center">International Baccalaureate <sup>© </sup></h5>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="owl-item" style="width: auto; margin-right: 10px;"><a class="link-item" href="#apsupport" role="tab" tab-content="ap-support">
                                            <div class="item">
                                                <div class="box"><img src="https://www.princetonreview.com/cms-content/subject-apsupport.png" alt="Homework Help Subject AP Support" style="opacity: 1;">
                                                    <h5 class="text-center">AP <sup>© </sup> Support</h5>
                                                </div>
                                            </div>
                                        </a></div>
                                </div>
                            </div>

                            <div class="owl-dots disabled"></div>
                        </div>
                        <div class="tab-content"><!-- SUBJECTS -->
                            <div role="tabpanel" class="tab-pane" id="science">
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=chemistry'; ?> ">
                                    <div class="subject"><span class="subject-name">Chemistry </span></div>
                                </a>
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=algebra'; ?> ">
                                    <div class="subject"><span class="subject-name">Physics <br class="visible-xs">
                                            Algebra-based </span></div>
                                </a>
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=physics:%20calculus-based'; ?> ">
                                    <div class="subject"><span class="subject-name">Physics <br class="visible-xs">
                                            Calculus-based </span></div>
                                </a>
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=biology'; ?> ">
                                    <div class="subject"><span class="subject-name">Biology </span></div>
                                </a>
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=earth%20science'; ?> ">
                                    <div class="subject"><span class="subject-name">Earth Science </span></div>
                                </a>
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=anatomy%20and%20physiology'; ?> ">
                                    <div class="subject"><span class="subject-name">Anatomy <br class="visible-xs"> &
                                            Physiology </span></div>
                                </a>
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=science%20(4-6th%20grades)'; ?> ">
                                    <div class="subject"><span class="subject-name">Elementary <br class="visible-xs">
                                            (Grades 4-8) </span></div>
                                </a>
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=organic%20chemistry'; ?> ">
                                    <div class="subject"><span class="subject-name">Organic Chemistry </span></div>
                                </a>
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=biology'; ?> ">
                                    <div class="subject"><span class="subject-name">Microbiology </span></div>
                                </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="ap-support">
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ap%20calculus%20ab'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> Calculus AB
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ap%20calculus%20bc'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> Calculus BC
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ap%20statistics'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> Statistics
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ap%20biology'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> Biology
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ap%20chemistry'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> Chemistry
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ap%20psychology'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> Intro <br>
                                            to Psychology </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ap%20physics%201'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> Physics
                                            <br> Algebra-based </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ap%20english%20language'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> English
                                            Language </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ap%20english%20literature'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> English
                                            Literature </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ap%20u.s.%20history'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> U.S.
                                            History </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search?searching=ap%20world%20history'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> World
                                            History </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search?searching=ap%20european%20history'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> European
                                            History </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search?searching=ap%20government%20and%20politics'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">AP <sup>© </sup> Government
                                            <br> and Politics </span></div>
                                </a>
                                <hr><a class="btn-subject text-center" href="#">Show More </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="spanish-language-tutoring">
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Math </span>
                                    </div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Math -
                                            Algebra </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Math -
                                            Calculus </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Espanol <br> Math -
                                            Calculus BC </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Math -
                                            Geometry </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Espanol <br> Math -
                                            Pre-Calculus </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Math -
                                            Statistics </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Math -
                                            Trigonometry </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Science
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Espanol <br> Anatomy and
                                            Physiology </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Biology
                                        </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Chemistry
                                        </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Earth
                                            Science </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Physics
                                        </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">En Español <br> Social
                                            Studies </span></div>
                                </a>
                                <hr><a class="btn-subject text-center" href="#">Show More </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="social-studies">
                                <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=u.s.%20history'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">U.S. History </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=world%20history'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">World History </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">European History </span>
                                    </div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Civics and Government
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=intro%20to%20psychology'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Intro to Psychology </span>
                                    </div>
                                </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="english"><a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=english%20(4-6th%20grades)'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">English <br> (4th-6th
                                            Grades) </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=english%20(7-8th%20grades)'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">English <br> (7th-8th
                                            Grades) </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=english%20(9-12th%20grades)'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">English <br> (9th-12th
                                            Grades) </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">College English </span>
                                    </div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=essay%20writing'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Essay Writing </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Async-ELL <br>Essay Review
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=essay%20writing%20(college%20level)'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Essay Writing <br> (College
                                            Level) </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=literature'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Literature </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=proofreading'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Proofreading </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=english%20esl%20(8th%20grade%20-%20college%20level)'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">ESL <br> (8th-12th Grades)
                                        </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">ESL <br> (College Level)
                                        </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search?searching=english%20reading%20comprehension'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Reading Comprehension <br>
                                            (3rd-8th Grades) </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search?searching=english%20reading%20comprehension'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Reading Comprehension <br>
                                            (9th - College Level) </span></div>
                                </a>
                                <hr><a class="btn-subject text-center" href="#">Show More </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="math"><a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=algebra'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Algebra I </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=algebra%20ii'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Algebra II </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Linear Algebra </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=geometry'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Geometry </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=trigonometry'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Trigonometry </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=pre-calculus'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Pre-Calculus </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=calculus%20ab'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Calculus AB </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=calculus%20bc'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Calculus BC </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Calculus <br> Multivariable
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=statistics'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Statistics </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search?searching=discrete%20math'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Discrete Math </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search?searching=finite%20math'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Finite Math </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search?searching=math%20(4-6th%20grades)'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Elementary <br> (Grades 4-6)
                                        </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search?searching=math%20(7-8th%20grades)'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Mid-Level <br> (Grades 7-8)
                                        </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Intermediate <br> Statistics
                                        </span></div>
                                </a>
                                <hr><a class="btn-subject text-center" href="#">Show More </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="technology"><a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=accounting'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Accounting </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=finance'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Finance </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=economics'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Economics </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Windows </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ms%20powerpoint'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Microsoft PowerPoint <sup>©
                                            </sup> </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ms%20excel'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Microsoft Excel <sup>©
                                            </sup> </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=ms%20word'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Microsoft Word <sup>© </sup>
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Computer Science: <br> C++
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Computer Science: <br> Java
                                        </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Computer Science: <br>
                                            Python </span></div>
                                </a></div>
                            <div role="tabpanel" class="tab-pane" id="foreign-language"><a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=spanish'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Spanish </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=german'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">German </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=french'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">French </span></div>
                                </a></div>
                            <div role="tabpanel" class="tab-pane" id="international-baccalaureate"><a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=biology'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Biology </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=world%20history'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">History </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search?searching=physics'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Physics </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Language A: <br> Language
                                            and Literature </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Language A: <br> Literature
                                            HL </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Language A: <br> Literature
                                            SL </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Mathematics HL: <br>
                                            Calculus </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Mathematics HL: <br>Discrete
                                            Math </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Mathematics HL: <br>
                                            Pre-Calculus </span></div>
                                </a> <a class="subject-link" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Mathematics HL: <br>
                                            Statistics </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Mathematics SL: <br>
                                            Calculus </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Mathematics SL: <br>
                                            Pre-Calculus </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Mathematics SL: <br>
                                            Statistics </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Psychology </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Chemistry </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Computer Science: <br> C++
                                        </span></div>
                                </a> <a class="subject-link subject-hidden" href="<?php echo $home_url . '/tutor-search'; ?> ">
                                    <div class="subject"><span class="subject-name text-center">Computer Science: <br> Java
                                        </span></div>
                                </a>
                                <hr><a class="btn-subject text-center" href="#">Show More </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
    document.addEventListener('DOMContentLoaded', function() {

        var searchButton = document.querySelector('.search-page-redirect');

        if (searchButton) {
            searchButton.addEventListener('click', function(e) {
                var searchedItem = document.querySelector('.is-search-input').value;
                //for Localhost
                //var newURL = 'http://localhost/renu-academic/tutor-search/?searching=' + searchedItem;
                //for For Original
                var newURL = 'https://natkeneducation.com/tutor-search/?searching=' + searchedItem;
   
                // Redirect to the new URL
                window.location.href = newURL;
            });
        }

    });
</script>


<?php

    }
}
