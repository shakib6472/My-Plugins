<?php
class Elementor_s_checkout_mob extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 's-checkout_mob';
    }

    public function get_title()
    {
        return esc_html__('SC MOB', 's-checkout');
    }

    public function get_icon()
    {
        return 'eicon-slider-album';
    }
    protected function _register_controls()
    {
        function s_checkout_enqueue_dss()
        {
            //js
            wp_enqueue_script('jquery');
            wp_enqueue_script('s-chec-stripe-script', 'https://js.stripe.com/v3/', array(), null, true);
        }

        add_action('wp_enqueue_scripts', 's_checkout_enqueue_dss');
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['SC', 'mob'];
    }

    protected function render()
    {
?>
        <div class="pre-loader">
            <div class="lds-spinner">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>

        <div class="height_for_whole" style="min-height: 150vh;">

            <div id="app" class="wrapper w-1">
                <div class="order">
                    <div class="container clearfix">
                        <div class="left-box">
                            <div class="heading">
                                <div class="steps">
                                    <div class="step active "><span>Qualify Order</span></div>
                                    <div class="step two">
                                        <span>Finish Order</span>
                                    </div>
                                    <div class="step three "><span>Summary</span></div>
                                </div>
                                <p style="margin-bottom: 0">Claim Your Active GLP-1ACTIV8 Package
                                    Today!</p>
                                <p>
                                    <img
                                        decoding="async"
                                        src="https://tryactiveketop.com/static/activeketo_gummies/ca-v1/desktop/images/890e691e2221ad00775d501341be47d4.png"
                                        alt=""
                                        class="emo" />
                                <p class="tenx">At 10x the Fat Burn, You Won't Believe it's All Natural!</p>
                                <img
                                    decoding="async"
                                    src="https://tryactiveketop.com/static/activeketo_gummies/ca-v1/desktop/images/890e691e2221ad00775d501341be47d4.png"
                                    alt=""
                                    class="emo" />
                                </p>


                                <div class="discount">
                                    <p>Your Discount Code</p>
                                    <p>Activated </p>
                                    <p>DA25171525</p>
                                </div>

                                <form action="" id="first_form">
                                    <div class="first-name">
                                        <label for="firstname">First Name :</label>
                                        <input type="text" name="firstname" id="firstname" placeholder="First Name">
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                    <div class="last-name">
                                        <label for="lastName">Last Name :</label>
                                        <input type="text" name="lastName" id="lastName" placeholder="Last Name">
                                        <i class="fa-regular fa-user"></i>
                                    </div>

                                    <div class="email">
                                        <label for="email">Email :</label>
                                        <input type="text" name="email" id="email" placeholder="email@email.com">
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>

                                    <div class="phone-number">
                                        <label for="phonenumber">Phone Number :</label>
                                        <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number ">
                                        <i class="fa-solid fa-mobile-screen-button"></i>
                                    </div>

                                    <div class="submit-btn">
                                        <input type="submit" name="submit" id="submit" class="first_step" value="QUALIFY FOR MY ORDER">
                                        <i class="fas fa-angle-double-right"></i>
                                        <hr>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page 2 -->

            <div id="app" class="wrapper w-2">
                <div class="order">
                    <div class="container clearfix">
                        <div class="left-box">
                            <div class="heading">
                                <div class="steps">
                                    <div class="step complate "><span>Qualify Order</span></div>
                                    <div class="step two active">
                                        <span>Finish Order</span>
                                    </div>
                                    <div class="step three "><span>Summary</span></div>
                                </div>

                                <div class="special-offer">
                                    <p>Special offer This Week Only</p>
                                    <div class="sale-up">
                                        <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/890e691e2221ad00775d501341be47d4.png.png" alt="">
                                        <p> Sale Up To 45% OFF! </p>
                                        <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/890e691e2221ad00775d501341be47d4.png.png" alt="">
                                    </div>
                                </div>
                                <div class="current-text">
                                    <p>Current Availability:</p>
                                    <span class="level row">
                                        <span></span> <span></span> <span></span>
                                        <span></span>
                                    </span>
                                    <span>
                                        <p>LoW. &nbsp;Sell Out Risk: <b class="mark">High</b></p>
                                    </span>
                                </div>

                                <div class="content">
                                    <div class="product product1 active" data-quantity="3">
                                        <div class="row">
                                            <div class="left-s">
                                                <h3>BUY 3 GET 3 FREE!</h3>
                                            </div>
                                            <div class="right-s">
                                                <span class="right-s__shipping"> Free Shipping</span>
                                            </div>
                                        </div>
                                        <div class="package-item">
                                            <div class="package-item__status">
                                                <span></span>
                                            </div>
                                            <div class="package-images row">
                                                <div class="package-images__items">
                                                    <img decoding="async" src="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_02-1.png" srcset="
                              https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_02-1.png 2x
                            " width="140" height="130" alt="" class="bottles">
                                                </div>
                                                <div class="package-images__items">
                                                    <div class="package-small-block">
                                                        <div class="free-green-ico"></div>
                                                        <div class="row package-small-block__bottles">
                                                            <img decoding="async" src="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_03.png" srcset="
                                  https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_03.png 2x
                                " alt="" width="120" height="80" class="bottles-sm">
                                                        </div>
                                                        <span class="value"><span class="save-price">$177.00</span> value</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="package-info">
                                                <div class="lose">
                                                    For Those Who Need <br>
                                                    to Lose 12+ Kilograms!
                                                </div>
                                                <span class="package-info__retail">
                                                    Retail: <span class="retail-price">$59</span>
                                                </span>
                                                <span class="package-info__price">
                                                    <i class="price" style="font-style: normal">$39.95</i><span>/per bottle*</span>
                                                </span>
                                                <span class="package-info__save">You Saved
                                                    <span class="save-price-hard">$177.00</span></span>
                                            </div>
                                        </div>
                                        <div class="checkout-check-icon-btn">
                                            <p class="checkout-text"> Guaranteed Safe & Secure Checkout </p>
                                            <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/Group-1000007532.png" alt="" class="checkout-img">
                                            <button class="button-div second_step" data-quantity="3">
                                                <p class="button-div-one">Grab My GLP-1ACTIV8</p>
                                                <p class="button-div-two">60-Day Satisfaction Guarantee</p>
                                                <i class="fas fa-angle-double-right"></i>
                                            </button>

                                        </div>

                                        <button class="button-div-select">
                                            <p class="button-div-one-select">SELECT THIS PACKAGE</p>
                                            <i class="fas fa-angle-double-right"></i>
                                        </button>
                                    </div>
                                    <div class="product product2 " data-quantity="2">
                                        <div class="row">
                                            <div class="left-s">
                                                <h3>BUY 2 GET 1 FREE!</h3>
                                            </div>
                                            <div class="right-s">
                                                <span class="right-s__shipping"> Free Shipping</span>
                                            </div>
                                        </div>
                                        <div class="package-item">
                                            <div class="package-item__status">
                                                <span></span>
                                            </div>
                                            <div class="package-images row">
                                                <div class="package-images__items">
                                                    <img loading="lazy" decoding="async" src="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_04.png" srcset="
                              https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_04.png 2x
                            " width="108" height="130" alt="" class="bottles">
                                                </div>
                                                <div class="package-images__items">
                                                    <div class="package-small-block">
                                                        <div class="free-green-ico"></div>
                                                        <div class="row package-small-block__bottles">
                                                            <img loading="lazy" decoding="async" src="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_01.png" srcset="
                                  https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_01.png 2x
                                " alt="" width="61" height="76" class="bottles-sm">
                                                        </div>
                                                        <span class="value"><span class="save-price">$59</span> value</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="package-info">
                                                <div class="lose">
                                                    For Those Who Need <br>
                                                    to Lose 7+ Kilograms!
                                                </div>
                                                <span class="package-info__retail">
                                                    Retail: <span class="retail-price">$59</span>
                                                </span>
                                                <span class="package-info__price">
                                                    <i class="price" style="font-style: normal">$49.95</i><span>/per bottle*</span>
                                                </span>
                                                <span class="package-info__save">You Saved <span class="save-price-hard">$59</span></span>
                                            </div>
                                        </div>
                                        <div class="checkout-check-icon-btn ">
                                            <p class="checkout-text"> Guaranteed Safe & Secure Checkout </p>
                                            <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/Group-1000007532.png" alt="" class="checkout-img">
                                            <button class="button-div second_step" data-quantity="2">
                                                <p class="button-div-one">Grab My GLP-1ACTIV8</p>
                                                <p class="button-div-two">60-Day Satisfaction Guarantee</p>
                                                <i class="fas fa-angle-double-right"></i>
                                            </button>

                                        </div>
                                        <button class="button-div-select">
                                            <p class="button-div-one-select">SELECT THIS PACKAGE</p>
                                            <i class="fas fa-angle-double-right"></i>
                                        </button>

                                    </div>
                                    <div class="product product3" data-quantity="1">
                                        <div class="row">
                                            <div class="left-s">
                                                <h3>BUY 1 BOTTLE</h3>
                                            </div>
                                            <div class="right-s">
                                                <span class="right-s__shipping"> Free Shipping</span>
                                            </div>
                                        </div>
                                        <div class="package-item">
                                            <div class="package-item__status">
                                                <span></span>
                                            </div>
                                            <div class="package-images row">
                                                <div class="package-images__items">
                                                    <img loading="lazy" decoding="async" src="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_01.png" srcset="
                              https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_01.png 2x
                            " width="72" height="130" alt="" class="bottles">
                                                </div>
                                                <div class="package-images__items"></div>
                                            </div>
                                            <div class="package-info">
                                                <div class="lose">
                                                    For Those Who Need <br>to Lose 3+ Kilograms!
                                                </div>
                                                <span class="package-info__retail"> Retail Price: </span>
                                                <span class="package-info__price">
                                                    <i class="price" style="font-style: normal">$59</i><span>/per bottle*</span>
                                                </span>
                                                <span class="package-info__save">You Saved <span class="save-price-hard">$0</span></span>
                                            </div>
                                        </div>

                                        <div class="checkout-check-icon-btn  ">
                                            <p class="checkout-text"> Guaranteed Safe & Secure Checkout </p>
                                            <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/Group-1000007532.png" alt="" class="checkout-img">
                                            <button class="button-div second_step" data-quantity="1">
                                                <p class="button-div-one">Grab My GLP-1ACTIV8</p>
                                                <p class="button-div-two">60-Day Satisfaction Guarantee</p>
                                                <i class="fas fa-angle-double-right"></i>
                                            </button>

                                        </div>
                                        <button class="button-div-select">
                                            <p class="button-div-one-select">SELECT THIS PACKAGE</p>
                                            <i class="fas fa-angle-double-right"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="slider-block">
                                    <span class="slider-title">REVIEWS FROM PEOPLE LIKE YOU!</span>
                                    <div class="slider reviwe-slide">
                                        <div class="slide">
                                            <div class="slide-head clearfix">
                                                <span class="slide-head__user">
                                                    <img
                                                        loading="lazy"
                                                        decoding="async"
                                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/1-scaled.jpg"
                                                        alt=""
                                                        class="user-photo"
                                                        width="54"
                                                        height="52" />
                                                </span>
                                                <div class="slide-head__content">
                                                    <span class="user-title">A Natural Alternative to Ozempic!
                                                    </span>
                                                    <ul class="stars">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <span class="user-name"> Sarah M. </span>
                                                    <span class="verif">Verified Customer</span>
                                                </div>
                                            </div>
                                            <div class="slide-text">
                                                I was considering Ozempic but wanted a natural option.
                                                GLP1-ACTIV8 reduced my cravings and kept me full, just like
                                                Ozempic, but without the side effects. Love it!
                                            </div>
                                        </div>
                                        <div class="slide">
                                            <div class="slide-head clearfix">
                                                <span class="slide-head__user">
                                                    <img
                                                        loading="lazy"
                                                        decoding="async"
                                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/3.jpg"
                                                        alt=""
                                                        class="user-photo"
                                                        width="54"
                                                        height="52" />
                                                </span>
                                                <div class="slide-head__content">
                                                    <span class="user-title">Just as Good as Ozempic! </span>
                                                    <ul class="stars">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <span class="user-name">Michael D. </span>
                                                    <span class="verif">Verified Customer</span>
                                                </div>
                                            </div>
                                            <div class="slide-text">
                                                GLP1-ACTIV8 has curbed my appetite and boosted my energy,
                                                just like Ozempic, but without needing a prescription. Super
                                                happy with the results!
                                            </div>
                                        </div>
                                        <div class="slide">
                                            <div class="slide-head clearfix">
                                                <span class="slide-head__user">
                                                    <img
                                                        loading="lazy"
                                                        decoding="async"
                                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/2-scaled.jpg"
                                                        alt=""
                                                        class="user-photo"
                                                        width="54"
                                                        height="52" />
                                                </span>
                                                <div class="slide-head__content">
                                                    <span class="user-title">No More Ozempic for Me! </span>
                                                    <ul class="stars">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <span class="user-name">Jessica L. </span>
                                                    <span class="verif">Verified Customer</span>
                                                </div>
                                            </div>
                                            <div class="slide-text">
                                                I wanted a natural way to boost GLP-1 without Ozempic.
                                                GLP1-ACTIV8 gives me the fullness and energy I need, minus
                                                the injections. It’s perfect!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page 3 -->
            <div id="app" class="wrapper w-3">
                <div class="order">
                    <div class="container clearfix">
                        <div class="left-box">
                            <div class="heading">

                                <div class="steps">
                                    <div class="step complate "><span>Qualify Order</span></div>
                                    <div class="step complate">
                                        <span>Finish Order</span>
                                    </div>
                                    <div class="step three active "><span>Summary</span></div>
                                </div>

                                <div class="heading-reserved-container">
                                    <h2 class="your-bottle">your bottle is reserved for the next</h2>
                                    <div class="watch">
                                        <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/Objects.png" alt="">
                                        <p>09:35 Minutes</p>
                                        <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/Objects.png" alt="">
                                    </div>
                                    <p class="sent-text">Where do we send it?</p>
                                </div>

                                <form action="" id="third_form">
                                    <div class="first-name">
                                        <label for="firstname">Address :</label>
                                        <input type="text" name="firstname" id="firstname" placeholder="Address">
                                        <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/Image.png" alt="" class="address-img">
                                    </div>
                                    <div class="last-name">
                                        <label for="lastName">Zip code or Postal Code :</label>
                                        <input type="text" name="lastName" id="lastName" placeholder="Zip code or Postal Code:">
                                        <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/9949040f58a9b0251d2494560497538b.svg-fill.png" alt="" class="zip-img">
                                    </div>

                                    <div class="email">
                                        <label for="email">City :</label>
                                        <input type="text" name="email" id="email" placeholder="City">
                                        <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/fc246daf9b1ba3391688cfd17fbb3457.svg-fill.png" alt="" class="city-img">
                                    </div>

                                    <div class="phone-number">
                                        <label for="phonenumber">State or Province :</label>
                                        <select name="phonenumber" id="phonenumber">
                                            <option value="Nunavut">Nunavut</option>
                                        </select>
                                        <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/Image-1.png" alt="" class="state-img">
                                    </div>

                                    <div class="submit-btn third_step">
                                        <input type="submit" name="submit" id="submit" value="Proceed to checkout">
                                        <i class="fas fa-angle-double-right"></i>
                                        <hr>
                                    </div>

                                </form>
                                <div class="free-shpping">
                                    <h2 class="fast-free-shipping-us">fast and free shipping in US/CA</h2>
                                    <img src="https://tryglponeactivate.com/wp-content/uploads/2024/10/united-states-postal-service-logo-1.png" alt="" class="fast-free-shipping-us-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page  4  -->
            <div id="app" class="wrapper w-4">
                <div class="order">
                    <div class="container clearfix">
                        <div class="left-box">
                            <div class="heading">

                                <div class="steps">
                                    <div class="step completed "><span>Qualify Order</span></div>
                                    <div class="step completed">
                                        <span>Finish Order</span>
                                    </div>
                                    <div class="step three active "><span>Summary</span></div>
                                </div>

                                <div class="heading-reserved-container">
                                    <h2 class="your-bottle">Final Step- Payment Information</h2>

                                </div>
                                <div class="form-in show-3ds-popup">
                                    <div class="delivery-type">
                                        <span class="delivery-title font-bold">Choose shipping method:</span>
                                        <div class="delivery-row delivery-expedited">
                                            <input checked="checked" type="radio" name="delivery" id="expedited-dna">
                                            <label for="expedited-dna" class="delivery-line">
                                                <span class="radio-box">
                                                    <span class="radio-fake"></span> Expedited
                                                </span>
                                                <span class="delivery-date" id="expedited-date">VIP Rush Delivery
                                                </span>
                                                <span class="delivery-price" id="expedited-price">$19.95</span>
                                            </label>
                                        </div>
                                        <div class="delivery-row delivery-standard">
                                            <input type="radio" name="delivery" id="standard">
                                            <label for="standard" class="delivery-line">
                                                <span class="radio-box">
                                                    <span class="radio-fake"></span> Standard
                                                </span>
                                                <span class="delivery-date" id="standard-date">
                                                    Ships in 2-3 Days
                                                </span>
                                                <span class="delivery-price">$00.00</span>
                                            </label>
                                        </div>
                                    </div>
                                    <p style="text-align: center" class="font-bold">
                                        Your order will be processed
                                        on our secure servers
                                    </p>
                                    <label for="payment_as_shipping" class="payment_as_shipping_label">
                                        <input type="checkbox" name="payment_as_shipping" class="payment_as_shipping" id="payment_as_shipping" checked="checked">
                                        <span class="font-bold">Billing same as Shipping</span>
                                    </label>

                                    <ul class="form-cards">
                                        <li class="first-text">Accepted Cards:</li>
                                        <li>
                                            <img decoding="async" src="https://tryglponeactivate.com/wp-content/uploads/2024/09/visa-1.png" alt="">
                                        </li>
                                        <li>
                                            <img decoding="async" src="https://tryglponeactivate.com/wp-content/uploads/2024/09/mastercard.png" alt="">
                                        </li>
                                    </ul>
                                    <div class="form-error-text" id="formError" style="display: none; margin-bottom: 20px"></div>

                                    <div class="position-relative">
                                        <div
                                            id="card-element-number"
                                            class="custom-card-element"></div>
                                        <img
                                            decoding="async"
                                            id="card-brand-icon"
                                            src="https://tryglponeactivate.com/wp-content/uploads/2024/09/cardplaceholder.png"
                                            style=""
                                            alt="Card Brand" />
                                    </div>
                                    <div class="d-flex">
                                        <div id="card-element-expiry" class="custom-card-element StripeElement StripeElement--empty">
                                            <div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe name="__privateStripeFrame6114" frameborder="0" allowtransparency="true" scrolling="no" role="presentation" allow="payment *" src="https://js.stripe.com/v3/elements-inner-card-5d95168d3f8220d69edc1e99a79150d2.html#wait=false&amp;mids[guid]=NA&amp;mids[muid]=7f431784-ff03-4782-ac88-dbf9a2a33a14e8d302&amp;mids[sid]=NA&amp;style[base][color]=%23000&amp;style[base][fontFamily]=Arial%2C+sans-serif&amp;style[base][fontSmoothing]=antialiased&amp;style[base][fontSize]=16px&amp;style[base][lineHeight]=24px&amp;style[base][::placeholder][color]=%23eda24&amp;style[invalid][color]=%23ff0000&amp;style[invalid][iconColor]=%23ff0000&amp;rtl=false&amp;componentName=cardExpiry&amp;keyMode=live&amp;apiKey=pk_live_51PwRkVFxD7iHjsUzo1EW4RPzig76yP9EqETFgRECjgCrCZX0ynIkyPcxEGWfgXTsKNJW4Kl6dBKXSUx0tY2ajtkt001YBYLDd5&amp;referrer=http%3A%2F%2F127.0.0.1%3A5500%2Findex.html&amp;controllerId=__privateStripeController6111" title="Secure expiration date input frame" style="border: 0px !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; transform: translate(0px) !important; color-scheme: light only !important; height: 24px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: -1px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div>
                                        </div>
                                        <div id="card-element-cvc" class="custom-card-element StripeElement StripeElement--empty">
                                            <div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe name="__privateStripeFrame6115" frameborder="0" allowtransparency="true" scrolling="no" role="presentation" allow="payment *" src="https://js.stripe.com/v3/elements-inner-card-5d95168d3f8220d69edc1e99a79150d2.html#wait=false&amp;mids[guid]=NA&amp;mids[muid]=7f431784-ff03-4782-ac88-dbf9a2a33a14e8d302&amp;mids[sid]=NA&amp;style[base][color]=%23000&amp;style[base][fontFamily]=Arial%2C+sans-serif&amp;style[base][fontSmoothing]=antialiased&amp;style[base][fontSize]=16px&amp;style[base][lineHeight]=24px&amp;style[base][::placeholder][color]=%23eda24&amp;style[invalid][color]=%23ff0000&amp;style[invalid][iconColor]=%23ff0000&amp;rtl=false&amp;componentName=cardCvc&amp;keyMode=live&amp;apiKey=pk_live_51PwRkVFxD7iHjsUzo1EW4RPzig76yP9EqETFgRECjgCrCZX0ynIkyPcxEGWfgXTsKNJW4Kl6dBKXSUx0tY2ajtkt001YBYLDd5&amp;referrer=http%3A%2F%2F127.0.0.1%3A5500%2Findex.html&amp;controllerId=__privateStripeController6111" title="Secure CVC input frame" style="border: 0px !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; transform: translate(0px) !important; color-scheme: light only !important; height: 24px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: -1px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div>
                                        </div>
                                    </div>

                                    <div id="card-errors" role="alert"></div>
                                    <!-- <button type="submit">Submit Payment</button> -->

                                    <div id="payment-message"></div>

                                    <button class="submit-btn">
                                        <span>RUSH MY ORDER NOW</span>
                                        <span>60-Day Satisfaction Guarantee</span>
                                    </button>
                                </div>
                            </div>

                            <div class="guarantee">
                                <div class="guarantee-content">
                                    <img loading="lazy" decoding="async" src="https://tryglponeactivate.com/wp-content/uploads/2024/10/18a363937175b1dd64562fcfbdfa9b6d.svg-fill.svg" width="88" height="88" alt="" class="guarantee-icon">
                                    <span class="guarantee-text"><b>Money-Back Guarantee!</b>We're so confident that
                                        GLP-1ACTIV8 Multi formula ingredients will work for you that
                                        we are offering a 60-day Money-Back Guarantee! So, feel
                                        confident that you will get your result or your money
                                        back!</span>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
