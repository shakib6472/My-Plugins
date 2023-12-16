

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
?>


<aside id="profile-sidebar">
    <div class="wrapper-profile-header wrap-fullwidth">
        <div class="lp-content-area lp-profile-content-area">
            <div class="lp-profile-left">
                <div class="lp-user-profile-avatar">
                    <img decoding="async" fetchpriority="high" alt="User Avatar" src="<?php echo $avatar; ?> "
                        height="250" width="250">
                </div>
                <div class="lp-user-username-social">
                    <div class="lp-profile-username">
                        <?php echo esc_html($current_user->display_name); ?>
                    </div>
                </div>
            </div><!-- <div class="lp-profile-right"> -->
            <!-- </div> -->
        </div>
    </div>

    <div id="profile-nav">
        <ul class="lp-profile-nav-tabs">


            <li class="courses active" data-content="books">
                <a href="#books" data-content="books">
                    <i class="fas fa-atlas"></i> <?php echo ($en_language !== false) ? 'Books' : 'كتب '; ?> </a>


            </li>
            <li class="courses" data-content="new-books">
                <a href="#" data-content="new-books">
                    <i class="fas fa-plus-square"></i> <?php echo ($en_language !== false) ? 'Add a New Book' : 'إضافة كتاب جديد '; ?>   </a>


            </li>

           
            
            <li class="my-profile" data-content="my-profile">
                <a href="#">
                    <i class="fas fa-user"></i> <?php echo ($en_language !== false) ? ' My Profile' : 'ملفي '; ?> </a>


            </li>
            <li class="user-manual" data-content="user-manual">
                <a href="#">
                    <i class="fas fa-bars"></i> <?php echo ($en_language !== false) ? 'User Manual' : 'دليل الاستخدام '; ?>  </a>


            </li>


            <li class="logout" data-content="logout">
                <a href="<?php echo wp_logout_url(); ?>">
                    <i class="fas fa-sign-out-alt"></i> <?php echo ($en_language !== false) ? 'Logout' : 'تسجيل خروج'; ?>  </a>

            </li>

        </ul>


    </div>

</aside>