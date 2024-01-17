<?php
class Elementor_renu_tutorprofile extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'tutorprofile';
    }

    public function get_title()
    {
        return esc_html__('Renu Tutor Proile', 'renuaddons');
    }

    public function get_icon()
    {
        return 'dashicons-businessman';
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
         wp_enqueue_style( 'tutor-profile-styles', plugin_dir_url( __FILE__ ) . 'tutor-profile.css', [], '1.0.0', 'all' );
        // wp_enqueue_script( 'remal-product-grid-script', plugin_dir_url( __FILE__ ) . 'search-tutor.js', [ 'jquery' ], '1.0.0', true );
        // //end Control
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['tutor', 'ptofile'];
    }

    protected function render()
    {
        $post_title = get_the_title();

        // Get custom field value with a specific meta key
        $my_subjects = get_post_meta(get_the_ID(), 'my_subjects', true);
        $biography = get_post_meta(get_the_ID(), 'biography', true);
        $career_experience = get_post_meta(get_the_ID(), 'career_experience', true);
        $i_love_tutoring_because = get_post_meta(get_the_ID(), 'i_love_tutoring_because', true);
        $other_interests = get_post_meta(get_the_ID(), 'other_interests', true);
        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $post_url = get_permalink();

?> 
    <div class="container" id="tutor-search">
        <div class="row">
            <p class="postid"><?php echo get_the_ID(); ?></p>
            <div class="col-sm-12">
                <h1 class="tutor-name"><?php echo $post_title; ?></h1>
                <div class="connect-row">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?php echo $featured_image_url; ?>" class="img-responsive tutor-profile-img" alt="<?php echo $post_title; ?> | Tutor in  | 5319359">
                        </div>
                        <div class="col-md-8">
                            <div style="" id="Connect">
                                <div>
                                    <div class="row">
                                        <div class="col-md-12 connect-now">
    
                                            <h3>What do you want to work on?</h3>
                        
                                            <div id="question-row" class="row">
                                                <div class="col-md-12">
                                                    <textarea data-rule-required="true" data-msg-required="Please enter your question" placeholder="Type what you will want help with here." id="Question" name="Question" class="form-control"></textarea>
                                                </div>
                                            </div>
    
                                            <div id="GetTutorDiv" class="row">	
                                                <div style="text-align:right;" class="col-sm-5 col-md-offset-7">
                                                    <input type="button" id="connect-button" value="Schedule Session" class="btn btn-block btn-large btn-primary">
                                                </div>
                                            </div>
    
                                        </div>		
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <br>
    
                    <div class="row about-tutor">
                        <div class="col-md-4">
                            <h3>About <?php echo $post_title; ?></h3>
                            <h4 class="first">Subjects</h4>
                            <p class="my-subjects">
                            <?php echo $my_subjects; ?>
                            </p>
    
                                <h4>Biography</h4>
                                <p>
                                <?php echo $biography; ?>
                                </p>
    
    
                        
                                <h4>Career Experience</h4>
                                <p>
                                <?php echo $career_experience; ?>
                                </p>
    
                                <h4>I Love Tutoring Because</h4>
                                <p>
                                <?php echo $i_love_tutoring_because; ?>
                                </p>
    
                                <h4>Other Interests</h4>
                                <p>
                                <?php echo $other_interests; ?>
                                </p>
    
                            <br>
                        </div>
                
                        <div class="col-md-8">
                            <h3>Reviews <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-0.png">&nbsp;&nbsp;&nbsp;(311)</h3>
                            <hr>
                            <div id="reviews">
                            
    
                            <div id="review-container">
                                    <div style="" class="review ">
                                        <h4 class="first">Kersey</h4>
                                        <p>Technology - Adobe InDesign</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Dec 7, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Lifesaver, pure and simple. 
                                        </div>
                                    </div>
                                    <div style="" class="review ">
                                        <h4 class="">Kersey</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Dec 5, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Really helpful and patient! 
                                        </div>
                                    </div>
                                    <div style="" class="review ">
                                        <h4 class="">Christine</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Dec 3, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            drop in tutoring has been an absolute life saver for me this term!
                                        </div>
                                    </div>
                                    <div style="" class="review ">
                                        <h4 class="">Lorena</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Nov 28, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            My tutor was very patient and helpful!
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Christine</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Nov 19, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            absolutely wonderful at explaining tthings in a way that is easy to understand
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Gary</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Nov 7, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            This tutor was amazing and fast! Would love to work with them again in the future
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Vicktor</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Nov 4, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            The tutors i got were super kind even though i was asking for something outside of their area of expertise! I would love if support for Programs like Maya, Mudbox, and Blender were added though. They're super complex programs and many of the professors who teach them just dont have the avialability to help students directly when they come up aginst a wall! 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Elisha</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Oct 25, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            I'm so glad I finally tried it. Super helpful!
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Brittany</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Oct 15, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Excellent
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Kyle</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Oct 15, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Humera is nice and very helpful
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Kyle</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-4.png">
                                                </div>
                                            <div class="col-md-10">
                                                Oct 14, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            I have worked with this tutor before, they are friendly and helpful
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">MrsJackson</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Oct 6, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Humera is the BEST!
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Kyle</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Sep 24, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            I have a much better idea of what I am doing. I really appreciated the assistance
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Robin</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Sep 18, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            I had more questions as I kept going on the homework and she was able to answer them quicky and gave me some more pointers
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Robin</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Sep 18, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            The tutor I had was very helpful,answered all my questions and walked me through the it step by step. 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Joseph</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Sep 17, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            10's across the board!
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Joseph</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Sep 6, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Awesome tutor!
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Chelli</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Aug 27, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Humera was friendly, patient, helpful and knowledgeable. 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Kimberly</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Aug 10, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            humera is the best 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Alana</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Jul 22, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            She's amazing! 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Kimberly</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Jul 19, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Humera is the best.  She has helped me out tremendously.
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Jose</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Jul 17, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            she very good
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Edith</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Jun 22, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Amazing tutor! She was so patient and made sure I actually knew what I was doing in Adobe Photoshop!
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Brendan</h4>
                                        <p>Technology - Adobe InDesign</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Jun 10, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            The actual tutoring session went amazing, the only thing I would recommend would be to let us see our position inside the queue line while waiting to see a tutor.
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Malea</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                May 23, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Although we had an issue with the mic, we were able to still get the session done and i was able to understand what to do.
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Genae</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                May 21, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            what a wonderful and patient tutor. amazing service!!!! so glad she was there to help.
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Juliana</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                May 19, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            My tutor was amazing and so patient!! I can be really slow sometimes and having someone being so calm and patient with me was like the best feeling especially when it comes to doing school work! 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Tristan</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                May 15, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Humera was very helpful in helping me navigate photoshop. She provided a very great description of tools and their functions. I enjoyed working with her.
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Michael</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Apr 13, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Thank you so much Humera J, You have taught me so much this term! I'm so much more fluent in photoshop and illustrator that I was before we started working together! I look forward to working with you in my advanced imaging classes!
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Sheree</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-4.png">
                                                </div>
                                            <div class="col-md-10">
                                                Apr 12, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Humera was AWESOME!! Very Patient and Knowledgeable. I wish we had more time!! The sound was choppy but we got through it. 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Shannon</h4>
                                        <p>Technology - Adobe InDesign</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Apr 3, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Humera was very kind and helpful.
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Kathy</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Apr 3, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            would help to be able to share video screens, I'm having to do screen shots and send them
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Mckenna</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Apr 2, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            I really appreciate how it helped me understand my assignment. 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Michael</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Mar 31, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Thank you Humera! You were amazing as always!
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Adrian</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Mar 20, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            I like the tutoring I am getting.
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Marycruz</h4>
                                        <p>Technology - Adobe InDesign</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Mar 14, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Humera is always so helpfull . she is great and if she doesnt know the answer she always  make sure she find something that will help.  she is Amazing
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Brenda</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Mar 13, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            I hope there can be screen sharing to provide faster and more communitive help. The audio did not work as intended. 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Michael</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Mar 12, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Thank you so much! It was excellent to talk to you today!
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Marycruz</h4>
                                        <p>Technology - Adobe InDesign</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Mar 9, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            they need to have tutoring for 3D modeling
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Roxie</h4>
                                        <p>Technology - Adobe InDesign</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Feb 26, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            It would be worth it to be vocal. 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Roxie</h4>
                                        <p>Technology - Adobe InDesign</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Feb 26, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            I am more of a hands-on person, so this service is great for those moments when that is all you need.
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Roxie</h4>
                                        <p>Technology - Adobe InDesign</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Feb 26, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            This service is wonderful. I love the hands-on training that allows for one-on-one time and can be interactive. 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Alba</h4>
                                        <p>Technology - Adobe InDesign</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Feb 18, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Humera was very helpful. 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Wesley</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-4.png">
                                                </div>
                                            <div class="col-md-10">
                                                Feb 7, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            I needed assistance with Adobe Animate but was informed by the two separate tutors that Adobe Animate is not an option. The second tutor gave me a couple of YouTube links to watch to see if they help me. In course GRA 211, the majority of the class assignments uses Adobe Animate. I feel that it would be beneficial if there are tutors that have experience using this program as well as other Adobe programs.
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Marycruz</h4>
                                        <p>Technology - Adobe InDesign</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Feb 4, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            HUmera is always amazing, she helps  and if she doesnt know she finds ways to help and looks for resorces
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Paul</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Jan 23, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            I had so many little questions about photoshop that YouTube was not able to answer. The tutor really helped with everything and I am confident making these changes again! Thank you!
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Debra</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Jan 22, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Wonderful session. Learned so much more here than in the resources.
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Jaih-lan</h4>
                                        <p>Technology - Adobe Photoshop</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Jan 11, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            n/a
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Marycruz</h4>
                                        <p>Technology - Adobe InDesign</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-5.png">
                                                </div>
                                            <div class="col-md-10">
                                                Jan 10, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Humera is AMAZING. she took her time to explain an assignment in a different software that she was using and still was able to help me. 
                                        </div>
                                    </div>
                                    <div style="display:none;" class="review more">
                                        <h4 class="">Liz</h4>
                                        <p>Technology - Adobe Illustrator</p>
                                        <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://princetonreview.com/Content/Images/TutorSearch/stars-4.png">
                                                </div>
                                            <div class="col-md-10">
                                                Jan 8, 2023
                                            </div>
                                        </div>
                                        <div class="review-text">
                                            Humera was AMAZING! Thank you so much for your patience and help today!
                                        </div>
                                    </div>
    
                            </div>
    
                            <div class="view-all-container"><a href="#" id="view-all-reviews">View All</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div> 

<!-- JavaScript script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Js Loaded');
        // Add a click event listener to the button
        document.getElementById('connect-button').addEventListener('click', function() {
            // Get the text content of the h1 element
            var tutorName = document.querySelector('.tutor-name').innerText;
            var mySubjects = document.querySelector('.my-subjects').innerText;
            var question = document.querySelector('#Question').value;
            
            // Store the tutor name in local storage
            localStorage.setItem('tutorName', tutorName);
            localStorage.setItem('mySubjects', mySubjects);
            localStorage.setItem('question', question);

            // Redirect to another URL // Localhost
           // window.location.href = 'http://localhost/renu-academic/test/'; // Replace with your desired URL
            //Main URL
            window.location.href = 'https://natkeneducation.com/book-the-tutor'; // Replace with your desired URL

            // You can also console log or alert the stored name and the redirection
            console.log('Tutor Name Stored: ' + tutorName);
            console.log('Redirecting to another URL...');
        });
    });
</script>

 <?php 
    }
}