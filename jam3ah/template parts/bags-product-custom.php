<?php
wp_head();

get_header();


//Single Product Page designs 

?>
<!-- Add this within the <head> tag of your HTML file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<!-- Add this within the <head> tag of your HTML file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    canvas {
        /* Your existing CSS properties */
        height: 500px;
        width: 98%;
        border-radius: 8px;
        background-image: url('http://jam3ah.com/wp-content/uploads/2023/11/br.png');
        /* Adjust the background position */
        background-position: center center;
        /* You can try different positions */
        background-size: cover;
        /* Ensures the background image covers the entire canvas */
    }

    h1.product__title {
        font-size: 52px;
    }

    .pplr-swatch-element {
        display: block;
        height: 30px;
        width: 30px;
        border: 1px solid #60717b;
    }

    .pplrgcolor,
    .pplrgimage {
        float: left;
        width: 100%;
        margin-bottom: 5px;
        margin-top: 5px;
        z-index: 2;
    }

    .pplr-color-select .pplrgcolor .pplr-swatch-element {
        background-color: #efefef;
        background-position: center center !important;
        background-size: cover !important;
        background-repeat: no-repeat;
    }

    .pplr-swatch-main .pplr-swatch-element {
        float: left;
        -webkit-transform: translateZ(0);
        -webkit-font-smoothing: antialiased;
        margin: 0px 10px 10px 0;
        position: relative;
        z-index: 2;
        border-radius: 25px;
    }

    button.btn.btn-primary.btn-block {
        background: #2E3192;
    }

    button.btn.btn-primary.btn-block:hover {
        background: #2E3162;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="text-left back-text"> <i class="fas fa-arrow-left"></i> <span>Home</span><br>
                <div id="back-textback-text">
                    <canvas id="product_image_canvas"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-left">

                <div class="product__info-container product__info-container--sticky">
                    <h1 class="product__title">
                    The pouch - Design your own laptop bag
                        
                    </h1>
                </div>
                <div class="form">
                    <form action="">
                        <div class="d-flex justify-content-between flex-nowrap flex-row"><label for="input_text">Input
                                Text</label> <label for="max">Maximum 3 Character</label></div>

                        <input type="text" placeholder="JK" value="JK" id="canvastext" maxlength="3" class="canvastext">
                        <label for="outer_stipe_color">Outer Stripe Color</label>
                        <div class="pplrgcolor  pplr-swatch-main d-flex flex-wrap"><span
                                class="pplr-swatch-element pplrColor  color_image_display_circle " data-variant=""
                                data-color="#DFC5B0" data-type="1" style="background: #DFC5B0; z-index: 2;"
                                data-pplr_price="0" data-name="white-gold">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#97BDD5" data-type="1"
                                style="background: #97BDD5; z-index: 2;" data-pplr_price="0" data-name="White blue">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#4DC1BC" data-type="1"
                                style="background: #4DC1BC; z-index: 2;" data-pplr_price="0" data-name="Cyn">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#F5DD79" data-type="1"
                                style="background: #F5DD79; z-index: 2;" data-pplr_price="0" data-name="Yellow">
                                <div class="swtooltip before" style="display: none; bottom: 100%; top: auto;">Orange
                                </div>
                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#797A7C" data-type="1"
                                style="background: #797A7C; z-index: 2;" data-pplr_price="0" data-name="Chocolate">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#C9BCB5" data-type="1"
                                style="background: #C9BCB5; z-index: 2;" data-pplr_price="0" data-name="light grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#51656F" data-type="1"
                                style="background: #51656F; z-index: 2;" data-pplr_price="0" data-name="grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#62D9E4" data-type="1"
                                style="background: #62D9E4; z-index: 2;" data-pplr_price="0" data-name="Cymn">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#48538D" data-type="1"
                                style="background: #48538D; z-index: 2;" data-pplr_price="0" data-name="light purple">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#F3423C" data-type="1"
                                style="background: #F3423C; z-index: 2;" data-pplr_price="0" data-name="red">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#F38E6B" data-type="1"
                                style="background: #F38E6B; z-index: 2;" data-pplr_price="0" data-name="Orange">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#768A90" data-type="1"
                                style="background: #768A90; z-index: 2;" data-pplr_price="0" data-name="grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#3C506C" data-type="1"
                                style="background: #3C506C; z-index: 2;" data-pplr_price="0" data-name="light grey a">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#7E818D" data-type="1"
                                style="background: #7E818D; z-index: 2;" data-pplr_price="0" data-name="olive grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#A0696D" data-type="1"
                                style="background: #A0696D; z-index: 2;" data-pplr_price="0" data-name="dark beige">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#9C1E20" data-type="1"
                                style="background: #9C1E20; z-index: 2;" data-pplr_price="0" data-name="red black">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#6B948E" data-type="1"
                                style="background: #6B948E; z-index: 2;" data-pplr_price="0" data-name="light green">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#D5C8BA" data-type="1"
                                style="background: #D5C8BA; z-index: 2;" data-pplr_price="0" data-name="Violet">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#EEF3F3" data-type="1"
                                style="background: #EEF3F3; z-index: 2;" data-pplr_price="0" data-name="White">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#A1AAAE" data-type="1"
                                style="background: #A1AAAE; z-index: 2;" data-pplr_price="0" data-name="gery light">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#5D9CD8" data-type="1"
                                style="background: #5D9CD8; z-index: 2;" data-pplr_price="0" data-name="Royal Blue">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#DE3B63" data-type="1"
                                style="background: #DE3B63; z-index: 2;" data-pplr_price="0" data-name="lime pink">

                            </span><span class="pplr-swatch-element pplrColor selected color_image_display_circle "
                                data-variant="" data-color="#ffffff" data-type="1"
                                style="background: rgb(255, 255, 255); z-index: 2;" data-pplr_price="0"
                                data-name="white"> </span>
                            <span class="pplr-swatch-element pplrColor  color_image_display_circle " data-variant=""
                                data-color="#D57A4E" data-type="1" style="background: #D57A4E; z-index: 2;"
                                data-pplr_price="0" data-name=" Brown"> </span>
                            <span class="pplr-swatch-element pplrColor  color_image_display_circle " data-variant=""
                                data-color="#E6DCD0" data-type="1" style="background: #E6DCD0; z-index: 2;"
                                data-pplr_price="0" data-name=" light White"> </span>
                        </div>


                        <label for="outer_stipe_color">Innr Stripe Color & Text Color</label>
                        <div class="pplrgcolor  pplr-swatch-main d-flex flex-wrap"><span
                                class="pplr-swatch-element pplrColor  color_image_display_circle " data-variant=""
                                data-color="#DFC5B0" data-type="2" style="background: #DFC5B0; z-index: 2;"
                                data-pplr_price="0" data-name="white-gold">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#97BDD5" data-type="2"
                                style="background: #97BDD5; z-index: 2;" data-pplr_price="0" data-name="White blue">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#4DC1BC" data-type="2"
                                style="background: #4DC1BC; z-index: 2;" data-pplr_price="0" data-name="Cyn">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#F5DD79" data-type="2"
                                style="background: #F5DD79; z-index: 2;" data-pplr_price="0" data-name="Yellow">
                                <div class="swtooltip before" style="display: none; bottom: 100%; top: auto;">Orange
                                </div>
                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#797A7C" data-type="2"
                                style="background: #797A7C; z-index: 2;" data-pplr_price="0" data-name="Chocolate">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#C9BCB5" data-type="2"
                                style="background: #C9BCB5; z-index: 2;" data-pplr_price="0" data-name="light grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#51656F" data-type="2"
                                style="background: #51656F; z-index: 2;" data-pplr_price="0" data-name="grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#62D9E4" data-type="2"
                                style="background: #62D9E4; z-index: 2;" data-pplr_price="0" data-name="Cymn">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#48538D" data-type="2"
                                style="background: #48538D; z-index: 2;" data-pplr_price="0" data-name="light purple">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#F3423C" data-type="2"
                                style="background: #F3423C; z-index: 2;" data-pplr_price="0" data-name="red">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#F38E6B" data-type="2"
                                style="background: #F38E6B; z-index: 2;" data-pplr_price="0" data-name="Orange">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#768A90" data-type="2"
                                style="background: #768A90; z-index: 2;" data-pplr_price="0" data-name="grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#3C506C" data-type="2"
                                style="background: #3C506C; z-index: 2;" data-pplr_price="0" data-name="light grey a">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#7E818D" data-type="2"
                                style="background: #7E818D; z-index: 2;" data-pplr_price="0" data-name="olive grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#A0696D" data-type="2"
                                style="background: #A0696D; z-index: 2;" data-pplr_price="0" data-name="dark beige">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#9C1E20" data-type="2"
                                style="background: #9C1E20; z-index: 2;" data-pplr_price="0" data-name="red black">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#6B948E" data-type="2"
                                style="background: #6B948E; z-index: 2;" data-pplr_price="0" data-name="light green">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#D5C8BA" data-type="2"
                                style="background: #D5C8BA; z-index: 2;" data-pplr_price="0" data-name="Violet">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#EEF3F3" data-type="2"
                                style="background: #EEF3F3; z-index: 2;" data-pplr_price="0" data-name="White">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#A1AAAE" data-type="2"
                                style="background: #A1AAAE; z-index: 2;" data-pplr_price="0" data-name="gery light">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#5D9CD8" data-type="2"
                                style="background: #5D9CD8; z-index: 2;" data-pplr_price="0" data-name="Royal Blue">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#DE3B63" data-type="2"
                                style="background: #DE3B63; z-index: 2;" data-pplr_price="0" data-name="lime pink">

                            </span><span class="pplr-swatch-element pplrColor selected color_image_display_circle "
                                data-variant="" data-color="#ffffff" data-type="2"
                                style="background: rgb(255, 255, 255); z-index: 2;" data-pplr_price="0"
                                data-name="white">
                            </span>
                            <span class="pplr-swatch-element pplrColor  color_image_display_circle " data-variant=""
                                data-color="#D57A4E" data-type="2" style="background: #D57A4E; z-index: 2;"
                                data-pplr_price="0" data-name=" Brown"> </span>
                            <span class="pplr-swatch-element pplrColor  color_image_display_circle " data-variant=""
                                data-color="#E6DCD0" data-type="2" style="background: #E6DCD0; z-index: 2;"
                                data-pplr_price="0" data-name=" light White"> </span>

                        </div>
                        <label for="outer_stipe_color d-block">Center Color</label>
                        <div class="pplrgcolor  pplr-swatch-main d-flex flex-wrap"><span
                                class="pplr-swatch-element pplrColor  color_image_display_circle " data-variant=""
                                data-color="#DFC5B0" data-type="3" style="background: #DFC5B0; z-index: 2;"
                                data-pplr_price="0" data-name="white-gold">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#97BDD5" data-type="3"
                                style="background: #97BDD5; z-index: 2;" data-pplr_price="0" data-name="White blue">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#4DC1BC" data-type="3"
                                style="background: #4DC1BC; z-index: 2;" data-pplr_price="0" data-name="Cyn">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#F5DD79" data-type="3"
                                style="background: #F5DD79; z-index: 2;" data-pplr_price="0" data-name="Yellow">
                                <div class="swtooltip before" style="display: none; bottom: 100%; top: auto;">Orange
                                </div>
                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#797A7C" data-type="3"
                                style="background: #797A7C; z-index: 2;" data-pplr_price="0" data-name="Chocolate">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#C9BCB5" data-type="3"
                                style="background: #C9BCB5; z-index: 2;" data-pplr_price="0" data-name="light grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#51656F" data-type="3"
                                style="background: #51656F; z-index: 2;" data-pplr_price="0" data-name="grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#62D9E4" data-type="3"
                                style="background: #62D9E4; z-index: 2;" data-pplr_price="0" data-name="Cymn">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#48538D" data-type="3"
                                style="background: #48538D; z-index: 2;" data-pplr_price="0" data-name="light purple">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#F3423C" data-type="3"
                                style="background: #F3423C; z-index: 2;" data-pplr_price="0" data-name="red">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#F38E6B" data-type="3"
                                style="background: #F38E6B; z-index: 2;" data-pplr_price="0" data-name="Orange">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#768A90" data-type="3"
                                style="background: #768A90; z-index: 2;" data-pplr_price="0" data-name="grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#3C506C" data-type="3"
                                style="background: #3C506C; z-index: 2;" data-pplr_price="0" data-name="light grey a">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#7E818D" data-type="3"
                                style="background: #7E818D; z-index: 2;" data-pplr_price="0" data-name="olive grey">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#A0696D" data-type="3"
                                style="background: #A0696D; z-index: 2;" data-pplr_price="0" data-name="dark beige">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#9C1E20" data-type="3"
                                style="background: #9C1E20; z-index: 2;" data-pplr_price="0" data-name="red black">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#6B948E" data-type="3"
                                style="background: #6B948E; z-index: 2;" data-pplr_price="0" data-name="light green">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#D5C8BA" data-type="3"
                                style="background: #D5C8BA; z-index: 2;" data-pplr_price="0" data-name="Violet">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#EEF3F3" data-type="3"
                                style="background: #EEF3F3; z-index: 2;" data-pplr_price="0" data-name="White">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#A1AAAE" data-type="3"
                                style="background: #A1AAAE; z-index: 2;" data-pplr_price="0" data-name="gery light">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#5D9CD8" data-type="3"
                                style="background: #5D9CD8; z-index: 2;" data-pplr_price="0" data-name="Royal Blue">

                            </span><span class="pplr-swatch-element pplrColor  color_image_display_circle "
                                data-variant="" data-color="#DE3B63" data-type="3"
                                style="background: #DE3B63; z-index: 2;" data-pplr_price="0" data-name="lime pink">

                            </span><span class="pplr-swatch-element pplrColor selected color_image_display_circle "
                                data-variant="" data-color="#ffffff" data-type="3"
                                style="background: rgb(255, 255, 255); z-index: 2;" data-pplr_price="0"
                                data-name="white">


                            </span>
                            <span class="pplr-swatch-element pplrColor  color_image_display_circle " data-variant=""
                                data-color="#D57A4E" data-type="3" style="background: #D57A4E; z-index: 2;"
                                data-pplr_price="0" data-name=" Brown"> </span>
                            <span class="pplr-swatch-element pplrColor  color_image_display_circle " data-variant=""
                                data-color="#E6DCD0" data-type="3" style="background: #E6DCD0; z-index: 2;"
                                data-pplr_price="0" data-name=" light White"> </span>
                        </div>


                    </form>
                </div>
                <div class="alert alert-danger text-center" role="alert" style="display: none;" id="errorMessage">
                    Please fill out the required field(s).
                </div>
                <button type="button" class="btn btn-primary btn-block adding-cart" id="adding-cart">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart3" viewBox="0 0 16 16">
                        <path
                            d="M4 1a1 1 0 0 0-1 1v1h1.781l.309 1.174L5.878 6H2v1h3.414l3.225 7.94a1 1 0 0 0 .949.06l.106-.06L13.414 7H16V6h-2.878l-.414-2H4V2H3V1H2v1a1 1 0 0 0 1 1h1V2H4zm11.5 4a2 2 0 0 0-2 2 2 2 0 1 0 4 0 2 2 0 0 0-2-2zm-9 0a2 2 0 0 0-2 2 2 2 0 1 0 4 0 2 2 0 0 0-2-2z" />
                    </svg>
                    Add to Cart
                </button>

            </div>
        </div>
    </div>
</div>
</div>


<script>
    let pplrColor = 'blue';
    let textValue = $('#canvastext').val();
    let innercolor = null;
    let centercolor = null;
    let outercolor = null;
    const canvas = $('#product_image_canvas')[0];
    const ctx = canvas.getContext('2d');
    const colorButtons = $('.pplr-swatch-element');

    // Image URL
    const imageUrl = 'http://jam3ah.com/wp-content/uploads/2023/11/without-txt.png';

    // Function to set canvas background with the image and display colored rectangle
    function setBackgroundAndColorRect(outercolor, innercolor, centercolor, textValue) {
        const img = new Image();
        img.onload = function () {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            canvas.width = img.width; // Set canvas width to match the image width
            canvas.height = img.height; // Set canvas height to match the image height
            ctx.drawImage(img, 0, 0); // Draw the image at (0, 0) on the canvas

            canvas.style.backgroundImage = 'none';

            //Outerline 
            ctx.fillStyle = outercolor;
            ctx.fillRect(413, 221, 223, 162); // Change position and size as needed
            ctx.fillRect(413, 525, 223, 383); // Change position and size as needed

            //inner color
            ctx.fillStyle = innercolor;
            ctx.fillRect(450, 221, 149, 162); // Change position and size as needed
            ctx.fillRect(450, 525, 149, 383);
            //Center color
            ctx.fillStyle = centercolor;
            ctx.fillRect(487, 221, 75, 162); // Change position and size as needed
            ctx.fillRect(487, 525, 75, 383);


            ctx.font = 'bold 135px Arial';
            ctx.fillStyle = innercolor;
            const textWidth = ctx.measureText(textValue).width; // Get the width of the text
            const xp = (canvas.width - textWidth) / 2; // Calculate x-coordinate for centering
            const x = xp - 15;
            console.log('Text value' + textValue);
            ctx.fillText(textValue, x, 500);
        };
        img.src = imageUrl;
    }

    // Event listeners for button clicks
    colorButtons.each(function () {
        $(this).on('click', function () {
            if ('1' == $(this).attr('data-type')) {
                outercolor = $(this).attr('data-color');

                innercolor = innercolor !== null ? innercolor : '#3C506C';
                centercolor = centercolor !== null ? centercolor : '#BF2200';
                textValue = $('#canvastext').val();
                textValue = textValue !== '' ? textValue : 'JK';
                console.log('Text value' + textValue);
                setBackgroundAndColorRect(outercolor, innercolor, centercolor, textValue);
            }
            if ('2' == $(this).attr('data-type')) {
                innercolor = $(this).attr('data-color');

                outercolor = outercolor !== null ? outercolor : '#ffffff';
                centercolor = centercolor !== null ? centercolor : '#BF2200';
                textValue = $('#canvastext').val();
                textValue = textValue !== '' ? textValue : 'JK';
                console.log('Text value' + textValue);
                setBackgroundAndColorRect(outercolor, innercolor, centercolor, textValue);
            }
            if ('3' == $(this).attr('data-type')) {
                centercolor = $(this).attr('data-color');

                innercolor = innercolor !== null ? innercolor : '#3C506C';
                outercolor = outercolor !== null ? outercolor : '#ffffff';
                textValue = $('#canvastext').val();
                textValue = textValue !== '' ? textValue : 'JK';
                console.log('Text value' + textValue);
                setBackgroundAndColorRect(outercolor, innercolor, centercolor, textValue);
            }

        });
    });

    $('#canvastext').on('input', function () {
        outercolor = outercolor !== null ? outercolor : '#ffffff';
        innercolor = innercolor !== null ? innercolor : '#3C506C';
        centercolor = centercolor !== null ? centercolor : '#BF2200';
        textValue = $('#canvastext').val();
        textValue = textValue !== '' ? textValue : 'JK';
        console.log('Text value' + textValue);
        setBackgroundAndColorRect(outercolor, innercolor, centercolor, textValue);
    });

    $('button.adding-cart').on('click', function () {
        outercolor = outercolor !== null ? outercolor : '#ffffff';
        innercolor = innercolor !== null ? innercolor : '#3C506C';
        centercolor = centercolor !== null ? centercolor : '#BF2200';
        let textValue = $('#canvastext').val() || 'JK';
        const errorMessage = $('#errorMessage');

        if (outercolor !== '#0') {
            if (innercolor !== '#0') {
                if (centercolor !== '#0') {
                    if (textValue !== 'JK') {
                        errorMessage.hide();
                        $('button.adding-cart svg').addClass("rotating");
                        $('button.adding-cart').text(
                            "Adding to cart..."
                          );
                        // Function to convert canvas to an image
                        function canvasToImage(canvas) {
                            var img = new Image();
                            img.src = canvas.toDataURL("image/png");
                            return img;
                        }

                        // Function to send image data to WordPress backend via AJAX
                        function sendImageToWordPress(imageData) {
                            
                            
                            // AJAX request
                            $.ajax({
                                
                                url: '<?php echo admin_url('admin-ajax.php') ?>', // Replace with your WordPress AJAX endpoint
                                type: 'POST',
                                data: {
                                    action: 'customized_product_data',
                                    $image_data: imageData, // Access the image data sent from the frontend
                                    $product_id: 16036, //for test 15495 , Actual 16036
                                    $product_name: 'Pouch Bag | OuterCOlor: ' + outercolor +' | Inner & text: ' + innercolor + ' | centerColor: ' + centercolor + ' | Text: ' + textValue , 
                                    $product_price: 50
                                

                                },
                                success: function (response) {
                                   
                                window.location.href = '<?php echo wc_get_cart_url(); ?>';
                                 
                                    
                                },
                                error: function (xhr, status, error) {
                                    // Handle error
                                    console.error('Error:', error);
                                }
                            });
                        }

                        // Click event handler for the button
                        
                            var canvas = document.getElementById('product_image_canvas');
                            var canvasImage = canvasToImage(canvas);

                            // Call function to send image data to WordPress backend via AJAX
                            sendImageToWordPress(canvasImage.src);
                        

                    } else {
                        errorMessage.text('Please type at least 1 character.');
                        errorMessage.show();
                    }
                } else {
                    errorMessage.text('Please select Center color first.');
                    errorMessage.show();
                }
            } else {
                errorMessage.text('Please select Inner & Text color first.');
                errorMessage.show();
            }
        } else {
            errorMessage.text('Please select outer color first.');
            errorMessage.show();
        }
    });



</script>

<?php

get_footer();

wp_footer();



?>