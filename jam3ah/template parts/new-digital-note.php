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


<div class="new-digital-notes-content content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="Headering-part ">
                    <h3> <?php echo ($en_language !== false) ? ' Add a new Digital Note' : 'أضف ملاحظة رقمية جديدة'; ?></h3>
                </div>
                <div class="Form-part">
                    <form action="" method="post"  enctype="multipart/form-data" id="bookForm">
                        <label for="book-name"><?php echo ($en_language !== false) ? 'Digital Notes Name' : 'اسم الملاحظات الرقمية'; ?>
                            <span>*</span></label><br>
                        <input type="text" placeholder="Enter Book Name" name="book-name" class="book-name-box" required><br>
                        <input type="hidden" class="book-pt-box" value="digital-note"><br>
                        <label for="book-price"> <?php echo ($en_language !== false) ? 'Digital Notes Price' : 'سعر الملاحظات الرقمية'; ?> 
                            <span>*</span></label><br>
                        <input type="text" placeholder="Enter Books Price" name="book-price" class="book-price-box" required><br>
                        <label for="book-photo"><?php echo ($en_language !== false) ? 'Digital Notes Cover Image' : 'صورة غلاف الملاحظات الرقمية'; ?>
                            <span>*</span></label><br>
                        <input type="file" name="imageupload" id="imageupload" class="book-photo-box" accept="image/jpeg, image/png, image/jpg" title="Upload Book Photo" required><br>
                        <label for="book-Description"><?php echo ($en_language !== false) ? 'Digital Notes Description' : 'وصف الملاحظات الرقمية'; ?>
                            <span>*</span></label><br>
                        <textarea name="book-description" placeholder="Enter Book Description" class="book-description-box" required></textarea> <br>
                        <label for="book-wa"><?php echo ($en_language !== false) ? 'WhatsApp Link ' : 'رابط الواتساب'; ?>
                            <span>*</span></label><br>
                        <input type="text" placeholder="Enter WhatsApp Link" name="wa-link" class="book-wa-box" required><br>
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