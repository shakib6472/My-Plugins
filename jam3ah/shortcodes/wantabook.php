<?php


function jam3ah_want_a_book_shortcode()
{
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

<div class="new-books-content">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="Headering-part ">
                    <h3> <?php echo ($en_language !== false) ? 'Want a new book' : 'تريد كتابا جديدا'; ?> </h3>
                </div>
                <div class="Form-part">
                    <form action="" method="post"  enctype="multipart/form-data" id="want-bookForm">
                        <label for="want-book-name"><?php echo ($en_language !== false) ? 'Book Name' : 'اسم الكتاب'; ?>
                            <span>*</span></label><br>
                        <input type="text" placeholder="Enter Book Name" name="book-name" class="want-book-name-box" required><br>
                        
                        <input type="hidden" class="want-lang-box" value="<?php echo ($en_language !== false) ? 'en' : 'ar'; ?>">
                        <label for="book-photo"><?php echo ($en_language !== false) ? 'Books Cover Image' : 'صورة غلاف الكتب'; ?> 
                            <span>*</span></label><br>
                        <input type="file" name="imageupload" id="wantimageupload" class="want-book-photo-box" accept="image/jpeg, image/png, image/jpg" title="Upload Book Photo" required><br>
                        <label for="book-Description"><?php echo ($en_language !== false) ? 'Book Description' : 'شرح الكتاب'; ?>
                            <span>*</span></label><br>
                        <textarea name="book-description" placeholder="Enter Book Description" class="want-book-description-box" required></textarea> <br>
                        <label for="book-wa"><?php echo ($en_language !== false) ? 'WhatsApp Link' : 'رابط الواتساب'; ?>
                            <span>*</span> <?php echo ($en_language !== false) ? '(it\'s auto filled, if you want you can change)' : '(يتم ملؤه تلقائيًا، إذا أردت يمكنك التغيير)'; ?> </label><br>
                        <input type="text" placeholder="Enter WhatsApp Link" name="wa-link" value="" class="book-wa-box" required><br>
                        <p><?php echo ($en_language !== false) ? 'Ex. +96500000000' : 'السابق. +96500000000'; ?></p>
                        <div class="want-submit-button">
                            <div class="want-book-submit book-submit "><?php echo ($en_language !== false) ? 'Ask for this book' : 'اطلب هذا الكتاب'; ?></div>
                        </div>
                        <div class="error text-center" style="display: none;">
                            <p></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
 }
add_shortcode('want_a_book', 'jam3ah_want_a_book_shortcode');
