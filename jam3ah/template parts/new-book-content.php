<?php $current_user_id = get_current_user_id(); ?>

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

<div class="new-books-content content">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="Headering-part ">
                    <h3>Add a new book</h3>
                </div>
                <div class="Form-part">
                    <form action="" method="post"  enctype="multipart/form-data" id="bookForm">
                        <label for="book-name"><?php echo ($en_language !== false) ? 'Book Name' : 'اسم الكتاب'; ?>
                            <span>*</span></label><br>
                        <input type="text" placeholder="Enter Book Name" name="book-name" class="book-name-box" required><br>
                        <input type="hidden" class="book-pt-box" value="book"><br>
                        <input type="hidden" class="lang-box" value="<?php echo ($en_language !== false) ? 'en' : 'ar'; ?>"><br>
                        <label for="book-price"><?php echo ($en_language !== false) ? 'Books Price' : 'أسعار الكتب'; ?> 
                            <span>*</span></label><br>
                        <input type="text" placeholder="Enter Books Price" name="book-price" class="book-price-box" required><br>
                        <label for="book-photo"><?php echo ($en_language !== false) ? 'Books Cover Image' : 'صورة غلاف الكتب'; ?> 
                            <span>*</span></label><br>
                        <input type="file" name="imageupload" id="imageupload" class="book-photo-box" accept="image/jpeg, image/png, image/jpg" title="Upload Book Photo" required><br>
                        <label for="book-Description"><?php echo ($en_language !== false) ? 'Book Description' : 'شرح الكتاب'; ?>
                            <span>*</span></label><br>
                        <textarea name="book-description" placeholder="Enter Book Description" class="book-description-box" required></textarea> <br>
                        <label for="book-wa"><?php echo ($en_language !== false) ? 'WhatsApp Link' : 'رابط الواتساب'; ?>
                            <span>*</span> <?php echo ($en_language !== false) ? '(it\'s auto filled, if you want you can change)' : '(يتم ملؤه تلقائيًا، إذا أردت يمكنك التغيير)'; ?> </label><br>
                        <input type="text" placeholder="Enter WhatsApp Link" name="wa-link" value="https://wa.me/<?php echo get_user_meta($current_user_id, 'mobile_number', true); ?>" class="book-wa-box" required><br>
                        <p><?php echo ($en_language !== false) ? 'Link example : https://wa.me/{number}' : 'مثال الرابط : https://wa.me/{number}'; ?></p>
                        <div class="submit-button">
                            <div class="book-submit"><?php echo ($en_language !== false) ? 'Procced to pay' : 'المضي قدما في الدفع'; ?></div>
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