<?php 
// Get the current URL
$current_url = $_SERVER['REQUEST_URI'];

// Check if the URL contains "/en"
if (strpos($current_url, "/en") !== false) {
    // the Code for only English Language
 $en_language = true;
    
} else {
    // The URL does not contain "/en", so you can handle it differently
    // For example:
    $en_language = false ;

}
function jam3ah_sellar_dashbaord_shortcode($atts)
{

    $atts = shortcode_atts(array(
        'man' => 'seller'
    ), $atts, 'sellar_dashboard');
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        $user_id = get_current_user_id();

        $user_profile_photo = get_user_meta($user_id, '_tutor_profile_photo', true);
        if ($user_profile_photo) {

            $avatar = esc_url(wp_get_attachment_image_url($user_profile_photo));
        } else {
            $avatar =  '//www.gravatar.com/avatar/dbc4d8e2c75d2069901e340fbf6e4f80?s=250&amp;r=g&amp;d=mm';
        }

?>
        <div class="container site-content">
            <div class="row">
                <main id="main" class="site-main col-sm-12 full-width">


                    <article id="post-7081" class="post-7081 page type-page status-publish hentry pmpro-has-access">
                        <div class="entry-content">
                            <div class="learnpress">
                                <div id="learn-press-profile" class="lp-user-profile current-user no-bio-user">
                                    <div class="lp-content-area">
                                        <?php //Profile Sideber attach

                                        require_once(JAM3AHPATH . 'template parts/profile-sideber.php');

                                        ?>


                                        <article id="profile-content" class="lp-profile-content">

                                            <div id="profile-content-courses">

                                                <?php //Profile Sub - Content Attach 

                                                require_once(JAM3AHPATH . 'template parts/sub-content.php');

                                                ?>



                                                <!-- Starting the Contenct Area -->

                                                <div class="learn-press-profile-course__tab">
                                                    <?php //Books Content - Content Attach 
                                                    require_once(JAM3AHPATH . 'template parts/books-content.php');
                                                    //Add a New Books Content - Content Attach 
                                                    require_once(JAM3AHPATH . 'template parts/new-book-content.php');


                                                    //Digital Notes Content - Content Attach 
                                                    require_once(JAM3AHPATH . 'template parts/digital-note.php');


                                                    //Add a New BDigital Note Content - Content Attach 
                                                    require_once(JAM3AHPATH . 'template parts/new-digital-note.php');


                                                    //My Profile Area - Content Attach 
                                                    require_once(JAM3AHPATH . 'template parts/profile-content.php');

                                                    //User manual area- Content Attach 
                                                    require_once(JAM3AHPATH . 'template parts/user-manual.php');

                                                    ?>
                                                    <div class="edit-books-content content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="Headering-part ">
                                                                        <h3><?php echo ($en_language !== false) ? 'Edit The Books' : 'تحرير الكتب'; ?> </h3>
                                                                    </div>
                                                                    <div class="Form-part">
                                                                        <form action="" method="post">
                                                                            <label for="book-name"><?php echo ($en_language !== false) ? 'Book Name' : 'اسم الكتاب'; ?> 
                                                                                <span>*</span></label><br>
                                                                            <input type="text" placeholder="Enter Book Name" name="book-name" class="book-name-box" required><br>
                                                                            <label for="book-price"><?php echo ($en_language !== false) ? 'Books Price' : 'أسعار الكتب'; ?>  
                                                                                <span>*</span></label><br>
                                                                            <input type="text" placeholder="Enter Books Price" name="book-price" class="book-price-box" required><br>
                                                                            <label for="book-photo"> <?php echo ($en_language !== false) ? 'Books Cover Image' : 'صورة غلاف الكتب'; ?> 
                                                                                <span>*</span></label><br>
                                                                            <input type="file" name="book-photo" class="book-photo-box" accept="image/jpeg, image/png, image/jpg" title="Upload Book Photo" required><br>
                                                                            <label for="book-Description"> <?php echo ($en_language !== false) ? 'Book Description' : 'شرح الكتاب'; ?> 
                                                                                <span>*</span></label><br>
                                                                            <textarea name="book-description" placeholder="Enter Book Description" class="book-description-box" required></textarea> <br>
                                                                            <label for="Wa-link"><?php echo ($en_language !== false) ? 'WhatsApp Link' : 'رابط الواتساب'; ?>
                                                                                <span>*</span></label><br>
                                                                            <input type="text" placeholder="Enter WhatsApp Link" name="wa-link" class="book-wa-box" required><br>
                                                                            <p><?php echo ($en_language !== false) ? 'Link example : https://wa.me/{number}' : 'مثال الرابط : https://wa.me/{number}'; ?></p>
                                                                            <input type="submit" name="submit" value=" <?php echo ($en_language !== false) ? 'Procced to pay' : 'المضي قدما في الدفع'; ?> " class="submit-button">
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="edit-digital-notes-content content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="Headering-part ">
                                                                        <h3> <?php echo ($en_language !== false) ? ' Add a new book' : 'إضافة كتاب جديد'; ?></h3>
                                                                    </div>
                                                                    <div class="Form-part">
                                                                        <form action="" method="post">
                                                                            <label for="book-name"><?php echo ($en_language !== false) ? 'Book Name' : 'اسم الكتاب'; ?>
                                                                                <span>*</span></label><br>
                                                                            <input type="text" placeholder="Enter Book Name" name="book-name" class="book-name-box" required><br>
                                                                            <label for="book-price"><?php echo ($en_language !== false) ? 'Books Price' : 'أسعار الكتب'; ?> 
                                                                                <span>*</span></label><br>
                                                                            <input type="text" placeholder="Enter Books Price" name="book-price" class="book-price-box" required><br>
                                                                            <label for="book-photo"><?php echo ($en_language !== false) ? 'Books Cover Image' : 'صورة غلاف الكتب'; ?>
                                                                                <span>*</span></label><br>
                                                                            <input type="file" name="book-photo" class="book-photo-box" accept="image/jpeg, image/png, image/jpg" title="Upload Book Photo" required><br>
                                                                            <label for="book-Description"> <?php echo ($en_language !== false) ? 'Book Description' : 'شرح الكتاب'; ?> 
                                                                                <span>*</span></label><br>
                                                                            <textarea name="book-description" placeholder="Enter Book Description" class="book-description-box" required></textarea> <br>
                                                                            <label for="book-price"><?php echo ($en_language !== false) ? 'WhatsApp Link' : 'رابط الواتساب'; ?>
                                                                                <span>*</span></label><br>
                                                                            <input type="text" placeholder="Enter WhatsApp Link" name="wa-link" class="book-wa-box" required><br>
                                                                            <p><?php echo ($en_language !== false) ? 'Link example : https://wa.me/{number}' : 'مثال الرابط : https://wa.me/{number}'; ?></p>
                                                                            <input type="submit" name="submit" value="<?php echo ($en_language !== false) ? 'Procced to pay' : 'المضي قدما في الدفع'; ?>" class="submit-button">
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                </div>
                    </article>
            </div>
        </div>

        <style>
            .page-header {
                text-align: left;
                display: none;
            }
        </style>

    <?php
    } else { ?>
        <div class="container site-content">
            <div class="row">
                <main id="main" class="site-main col-sm-12 full-width">
                    <h1>
                        You are logged in, Please <a href="https://jam3ah.com/en/dashboard/">Login here!</a>
                    </h1>
                </main>

            </div>
        </div>
        <style>
            .page-header {
                text-align: left;
                display: none;
            }
        </style>
<?php
    }

};

add_shortcode("sellar_dashboard", "jam3ah_sellar_dashbaord_shortcode");
