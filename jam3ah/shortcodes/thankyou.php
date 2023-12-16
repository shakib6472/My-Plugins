<?php

function jam3ah_thank_you_page_shortcode()
{

    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="thankyou-box d-flex justify-content-center align-items-center">
                    <div class="img-box d-flex justify-content-center align-items-center">
                        <img class="complete" src="https://i.imgur.com/gJSxPvN.png" alt="congratulations">
                        <img class="reloading" src="https://i.imgur.com/BsS5ZKY.png" alt="congratulations">
                    </div>
                    <div class="text-box text-center">
                        <h4 class="publish">Book Is being Publishing, Please Wait...</h4>
                        <h6 class="notice">Don't Leave the Page</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        section.page-header {
            display: none !important;
        }
    </style>
<?php
}
add_shortcode('thank_you_page', 'jam3ah_thank_you_page_shortcode');