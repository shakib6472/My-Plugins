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




function jam3ah_edit_books_shortcode() {

$action = $_GET['action'] ?? '';

$post_id = $_GET['id'] ?? '' ;
$price = get_post_meta($post_id, 'books_price', true);
$whatsapp = get_post_meta($post_id, 'whatsapp_link', true);
$description = get_post_meta($post_id, 'book_description', true);
if( $post_id !== '') {
$post = get_post($post_id);
$post_type = $post->post_type;
}


if(is_user_logged_in() ) {
$current_author = get_current_user_id();
}
if(is_user_logged_in() ) {
if( $current_author == $post->post_author ) { ?>

<div class="new-books-content content active">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="Headering-part ">
                    <h3> <?php echo ($en_language !== false) ? 'Edit The' : 'تحرير'; ?>  <?php echo $post_type ?></h3>
                </div>
                <div class="Form-part">
                    <div class="loader">
                    <div class="inner-loader d-flex justify-content-center align-items-center ">
                        
                        <div class="rotating"> </div>
                        <h1 class="success-message"> <?php echo ($en_language !== false) ? 'Updated Successfuly' : 'تم التحديث بنجاح'; ?></h1>
                    </div>
                    </div>
                    <form action="" method="post">
                        <label for="book-name"><?php echo ucwords($post_type) ?><?php echo ($en_language !== false) ? 'Name' : 'اسم'; ?>
                            <span>*</span></label><br>
                        <input type="text" placeholder="Enter Book Name" name="book-name" class="book-name-box" required value="<?php echo $post->post_title ?>"><br>
                        <label for="book-price"><?php echo ucwords($post_type) ?> <?php echo ($en_language !== false) ? 'Price' : 'سعر'; ?>
                            <span>*</span></label><br>
                        <input type="text" placeholder="Enter Books Price" name="book-price" class="book-price-box" required value=" <?php echo $price ?> "><br>
                        <label for="book-Description"><?php echo ucwords($post_type) ?> <?php echo ($en_language !== false) ? 'Description' : 'وصف'; ?>
                            <span>*</span></label><br>
                        <textarea name="book-description" placeholder="Enter Book Description" class="book-description-box" required> <?php echo $description ?> </textarea> <br>
                        <label for="wa-link"><?php echo ($en_language !== false) ? 'WhatsApp Link' : 'رابط الواتساب'; ?>
                            <span>*</span></label><br>
                        <input type="text" placeholder="Enter WhatsApp Link" name="wa-link" class="book-wa-box" required value=" <?php echo $whatsapp ?> "><br>
                        <p><?php echo ($en_language !== false) ? 'Link example : https://wa.me/{number}' : 'مثال الرابط : https://wa.me/{number}'; ?></p>
                        <input type="submit" name="submit" value="<?php echo ($en_language !== false) ? 'Update' : 'تحديث'; ?> <?php echo ucwords($post_type) ?>" class="submit-button update-button">
                        <input type="hidden" value="<?php  echo $post_id; ?>" class="post-id">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    
} else{
    echo 'You are not the author';
}
} else{
    echo 'You are not Logged in';
}}
add_shortcode('edit_books','jam3ah_edit_books_shortcode');