<?php
class Elementor_s_checkout extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 's-checkout';
    }

    public function get_title()
    {
        return esc_html__('S Checkout', 's-checkout');
    }

    public function get_icon()
    {
        return 'eicon-slider-album';
    }
    protected function _register_controls()
    {

    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['post', 'slider'];
    }

    protected function render()
    {
        ?>

        <div id="app" class="wrapper">

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
            <header class="header">
                <div class="header__warning"> Warning: Due to extremely <b>high media demand</b>, there is <b>limited supply
                        of Active KETO Gummies as of <span class="date-container"></span></b>. Hurry! </div>
                <div class="container header__block row"> <img alt="" class="header__logo"
                        src="<?php echo plugins_url('img/logo.png', __FILE__); ?>" height="53" />
                    <div class="header__info">
                        <img alt="" src="<?php echo plugins_url('/img/canada.png', __FILE__); ?>" class="dynamicFlag" width="61"
                            height="40" />
                        <img alt="" src="<?php echo plugins_url('/img/usa.png', __FILE__); ?>" class="dynamicFlag" width="61"
                            height="40" />
                    </div>
                </div>
            </header>
            <div class="order">
                <div class="container clearfix">
                    <div class="left-box">
                        <div class="heading">
                            <div class="steps">
                                <div class="step"><span>Qualify Order</span></div>
                                <div class="step active"><span>Finish Order</span></div>
                                <div class="step b"><span>Summary</span></div>
                            </div>
                            <p style="margin-bottom:0">Special offer This Week Only</p>
                            <p> <img src="/img/hurrah icon.png" alt="" class="emo" /> Sale Up To 45% OFF! <img
                                    src="/img/hurrah icon.png" alt="" class="emo" /> </p>
                            <p class="current-text"> Current Availability: <span class="level row"> <span></span>
                                    <span></span> <span></span> <span></span> </span> LoW. &nbsp;Sell Out Risk: <b
                                    class="mark">High</b> </p>
                        </div>
                        <div class="content">

                            <div class="product active" data-quantity="3">
                                <div class="left-s">
                                    <h3>BUY 3 GET 3 FREE!</h3>
                                </div>
                                <div class="main">
                                    <div class="part left">
                                        <div class="package-item__status"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/marked-Correct.png"
                                                alt=""> </div>
                                        <div class="package-images">
                                            <img src="https://tryglponeactivate.com/wp-content/uploads/2024/09/3bottol.png"
                                                srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/3bottol.png 2x"
                                                alt="" class="bottles" />
                                        </div>
                                    </div>
                                    <div class="part middle">
                                        <div class="bonus-box">
                                            <div class="top">BONUS</div>
                                            <div class="bottom">
                                                <div class="pricing">
                                                    <div class="h-price">$230
                                                        <div class="redline">
                                                        </div>
                                                    </div>
                                                    <div class="free">Free</div>
                                                </div>
                                                <div class="images">
                                                    <img class="bottle"
                                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/3-in-a-row.png"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="part right">
                                        <div class="package-info">
                                            <div class="loses"> Retail Price: </div>
                                            <span class="package-info__price">
                                                <i class="price" style="font-style:normal">$38.33</i>
                                                <span>/per bottle*</span>
                                            </span>
                                            <div class="delivery d-flex">
                                                <img class="img1"
                                                    src="https://tryglponeactivate.com/wp-content/uploads/2024/09/delivery.png"
                                                    alt="">
                                                <img class="img2"
                                                    src="https://tryglponeactivate.com/wp-content/uploads/2024/09/delivery-ash.png"
                                                    alt="">
                                                <p class="mb-0">Free Shipping!</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Product 2 -->
                            <div class="product " data-quantity="2">
                                <div class="left-s">
                                    <h3>BUY 2 GET 1 FREE!</h3>
                                </div>
                                <div class="main">
                                    <div class="part left">
                                        <div class="package-item__status"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/marked-Correct.png"
                                                alt=""> </div>
                                        <div class="package-images">
                                            <img src="https://tryglponeactivate.com/wp-content/uploads/2024/09/double.png"
                                                srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/double.png 2x"
                                                alt="" class="bottles" />
                                        </div>
                                    </div>
                                    <div class="part middle">
                                        <div class="bonus-box">
                                            <div class="top">BONUS</div>
                                            <div class="bottom">
                                                <div class="pricing">
                                                    <div class="h-price">$124
                                                        <div class="redline">
                                                        </div>
                                                    </div>
                                                    <div class="free">Free</div>
                                                </div>
                                                <div class="images">
                                                    <img class="bottle"
                                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/single-bottole.png"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="part right">
                                        <div class="package-info">
                                            <div class="loses"> Retail Price: </div>
                                            <span class="package-info__price">
                                                <i class="price" style="font-style:normal">$41.33</i>
                                                <span>/per bottle*</span>
                                            </span>
                                            <div class="delivery d-flex">
                                                <img class="img1"
                                                    src="https://tryglponeactivate.com/wp-content/uploads/2024/09/delivery.png"
                                                    alt="">
                                                <img class="img2"
                                                    src="https://tryglponeactivate.com/wp-content/uploads/2024/09/delivery-ash.png"
                                                    alt="">
                                                <p class="mb-0">Free Shipping!</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Product 3 -->
                            <div class="product " data-quantity="1">
                                <div class="left-s">
                                    <h3>BUY 1 BOTTLE</h3>
                                </div>
                                <div class="main">
                                    <div class="part left">
                                        <div class="package-item__status"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/marked-Correct.png"
                                                alt=""> </div>
                                        <div class="package-images">
                                            <img src="https://tryglponeactivate.com/wp-content/uploads/2024/09/3bottol.png"
                                                srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/3bottol.png 2x"
                                                alt="" class="bottles" />
                                        </div>
                                    </div>
                                    <div class="part middle">

                                    </div>
                                    <div class="part right">
                                        <div class="package-info">
                                            <div class="loses"> Retail Price: </div>
                                            <span class="package-info__price">
                                                <i class="price" style="font-style:normal">$59</i>
                                                <span>/per bottle*</span>
                                            </span>
                                            <div class="delivery d-flex">
                                                <img class="img1"
                                                    src="https://tryglponeactivate.com/wp-content/uploads/2024/09/delivery.png"
                                                    alt="">
                                                <img class="img2"
                                                    src="https://tryglponeactivate.com/wp-content/uploads/2024/09/delivery-ash.png"
                                                    alt="">
                                                <p class="mb-0">Free Shipping!</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <div class="guarantee">
                                <div class="guarantee-content"> <img
                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/image-1.png" width="88"
                                        height="88" alt="" class="guarantee-icon" /> <span class="guarantee-text"><b>Money-Back
                                            Guarantee!</b>
                                        We're so confident that Active
                                        KETO Gummies will work for you that we are offering a 60-day Money-Back Guarantee!
                                        So, feel confident that you will get your result or your money back!</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-box">
                        <div class="form-box" id="order-form">

                            <div class="form-header"> FINAL STEP <br /> PAYMENT INFORMATION </div>
                            <div class="form-in show-3ds-popup">
                                <form class="form-popup" id="checkout">
                                    <div class="delivery-type"> <span class="delivery-title">Choose shipping method:</span>
                                        <div class="delivery-row delivery-expedited">
                                            <input checked="checked" type="radio" name="delivery" id="expedited-dna"  value="express" />
                                            <label for="expedited-dna" class="delivery-line">
                                                <span class="radio-box">
                                                    <span class="radio-fake"></span>
                                                    Expedited
                                                </span>
                                                <span class="delivery-date" id="expedited-date">
                                                    VIP Rush Delivery
                                                </span>
                                                <span class="delivery-price" id="expedited-price">$19.95</span>
                                            </label>
                                        </div>
                                        <div class="delivery-row delivery-standard">
                                            <input type="radio" name="delivery" id="standard" value="standard" />
                                            <label for="standard" class="delivery-line">
                                                <span class="radio-box">
                                                    <span class="radio-fake"></span>
                                                    Standard
                                                </span>
                                                <span class="delivery-date" id="standard-date"> Ships in 2-3 Days </span>
                                                <span class="delivery-price">$0.00</span>
                                            </label>
                                        </div>
                                    </div>
                                    <p>Your order will be processed <br />on our secure servers</p> <label
                                        for="payment_as_shipping" class="payment_as_shipping_label"> <input type="checkbox"
                                            name="payment_as_shipping" class="payment_as_shipping" id="payment_as_shipping"
                                            checked="checked" /> <span>Billing same as Shipping</span> </label>
                                    <div class="billing-form"> <span class="billing-title">Billing Info</span>
                                        <div class="phone-12 columns"> <label>First Name: </label> </div>
                                        <div class="form-holder"> <input type="text" id="billingFirstName" name="firstName"
                                                placeholder="First Name" class="form-control" required /> </div>
                                        <div class="phone-12 columns"> <label>Last Name: </label> </div>
                                        <div class="form-holder"> <input type="text" id="billingLastName" name="lastName"
                                                placeholder="Last Name" class="form-control" required /> </div>
                                        <div class="phone-12 columns"> <label>Country:</label> </div>
                                        <div id="billingCountry" class="form-holder"> <select name="country"
                                                class="form-control" id="id_country"></select> </div>
                                        <div class="phone-12 columns"> <label>State/Region:</label> </div>
                                        <div id="billingState" class="form-holder"> <select name="state" class="form-control"
                                                id="id_state"></select> </div>
                                        <div class="phone-12 columns"> <label>Address:</label> </div>
                                        <div id="billingAddress" class="form-holder"> <input type="text" name="address"
                                                placeholder="Address" class="form-control" required /> </div>
                                        <div class="phone-12 columns"> <label>City:</label> </div>
                                        <div id="billingCity" class="form-holder"> <input type="text" name="city"
                                                placeholder="City" class="form-control" required /> </div>
                                        <div class="phone-12 columns"> <label>Zip/Postal Code:</label> </div>
                                        <div id="billingZipCode" class="form-holder"> <input type="text" name="zipCode"
                                                placeholder="Zip/Postal Code" class="form-control" required="" /> </div>
                                        <span class="billing-title payment-title">Payment Info</span>
                                    </div>
                                    <ul class="form-cards">
                                        <li class="first-text">Accepted Cards:</li>
                                        <li><img src="https://tryglponeactivate.com/wp-content/uploads/2024/09/visa.png" alt="">
                                        </li>
                                        <li><img src="https://tryglponeactivate.com/wp-content/uploads/2024/09/master.png"
                                                alt=""></li>
                                    </ul>
                                    <div class="form-error-text" id="formError" style="display:none;margin-bottom:10px">
                                    </div>
                                    <!-- <div class="bg">
                                        <div class="form-holder card-container"> <label>Card Number:</label> <input
                                                class="form-control" id="cardnumber" maxlength="16" name="cardNumber"
                                                placeholder="•••• •••• •••• ••••" type="tel" /> </div>
                                        <div class="form-fields">
                                            <div class="form-block"> <label>Card Expiry Date:</label>
                                                <div class="form-holder"> <select class="form-control" id="cardExpMonth"
                                                        name="expMonth">
                                                        <option value="">Month</option>
                                                        <option value="01">1</option>
                                                        <option value="02">2</option>
                                                        <option value="03">3</option>
                                                        <option value="04">4</option>
                                                        <option value="05">5</option>
                                                        <option value="06">6</option>
                                                        <option value="07">7</option>
                                                        <option value="08">8</option>
                                                        <option value="09">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select> </div>
                                                <p class="sep">/</p>
                                                <div class="form-holder"> <select class="form-control right" id="cardExpYear"
                                                        name="expYear">
                                                        <option value="">Year</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                        <option value="2032">2032</option>
                                                        <option value="2033">2033</option>
                                                        <option value="2034">2034</option>
                                                        <option value="2035">2035</option>
                                                        <option value="2036">2036</option>
                                                        <option value="2037">2037</option>
                                                        <option value="2038">2038</option>
                                                    </select> </div>
                                            </div>
                                            <div class="form-holder cvv-container"> <label>CVV:</label> <input
                                                    class="form-control" id="cardcode" name="cvv" placeholder="•••"
                                                    type="tel" /> </div>
                                        </div>
                                    </div>  -->
                                    <div class="payment-methods">
                                        <div class="cod">
                                            <div class="delivery-type"> <span class="delivery-title">Choose Payment
                                                    method:</span>
                                                <div class="delivery-row delivery-expedited"> <input checked="checked"
                                                        type="radio" name="payment" id="pay-cod" /> <label for="pay-cod"
                                                        class="delivery-line"> <span class="radio-box">
                                                            <span class="radio-fake">
                                                            </span>
                                                            Cash On Delivery
                                                        </span>
                                                        </span> </label>
                                                </div>
                                                <div class="delivery-row delivery-standard"> <input type="radio" name="payment"
                                                        id="pay-card" /> <label for="pay-card" class="delivery-line"> <span
                                                            class="radio-box"> <span class="radio-fake"></span> Card Payment
                                                        </span>
                                                        <span class="delivery-date" id="standard-date">
                                                        </span> </label> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="submit-btn"> <span>RUSH MY ORDER NOW</span>
                                        <span>60-Day Satisfaction Guarantee</span> </button>
                                </form>
                            </div>
                        </div>

                        <div class="slider-block"> <span class="slider-title">REVIEWS FROM PEOPLE LIKE YOU!</span>
                            <div class="slider">
                                <div class="slide">
                                    <div class="slide-head clearfix"> <span class="slide-head__user"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/review.png" alt=""
                                                class="user-photo" width="54" height="52" /> </span>
                                        <div class="slide-head__content"> <span class="user-title">Even my wife noticed a
                                                difference</span>
                                            <ul class="stars">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul> <span class="user-name">Even my wife noticed a difference
                                        </div>
                                    </div>
                                    <div class="slide-text"> I can't express how happy I am since starting this supplement. I
                                        feel in control of my cravings, and my energy levels have never been better. It's
                                        amazing to see the changes in my body and how much more confident I feel. Thank you!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="popup-loading-wrapper" id="proc_popup" style="display:none">
                <div class="popup"> <img alt="" class="lock-image"
                        src="https://tryactiveketop.com/static/common/images/a42ef94e3b7c048526248b10dc7dec0b.png" />
                    <p>Please wait a moment</p>
                    <h3>Your Order is Now Being Processed</h3> <img alt="" class="loading-image"
                        src="https://tryactiveketop.com/static/common/images/66abd1ae20dbaf850feb0e0c3eab87b8.png" />
                </div>
            </section>
            <section class="custom-social-proof">
                <div class="custom-notification">
                    <div class="custom-notification-container">
                        <div class="custom-notification-image-wrapper"> <img
                                src="https://tryactiveketop.com/static/activeketo_gummies/intl-v1/desktop/images/8d9846a37b97ea988730472b9e68998e.png" />
                        </div>
                        <div class="custom-notification-content-wrapper">
                            <p class="custom-notification-content"> <span id="notify-customer">Eli H</span>. - <span
                                    id="notify-state">TX</span><br /> Purchased <strong><span
                                        id="notify-quantity">7</span></strong> Bottle(s) of Active KETO Gummies <small><span
                                        id="notify-ago">9 minutes ago</span></small> </p>
                        </div>
                    </div>
                    <div class="custom-close"></div>
                </div>
            </section>
        </div>
        <!-- #region -->
        <?php

    }
}