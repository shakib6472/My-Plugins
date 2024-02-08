<?php
class Elementor_boikkotha_Slider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'book-slide';
    }

    public function get_title()
    {
        return esc_html__('Book Slide', 'boikotha');
    }

    public function get_icon()
    {
        return 'eicon-slider-album';
    }
    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'boikotha'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //end Control
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['book', 'slide'];
    }

    protected function render()
    {

        $settings = $this->get_settings();
?> <div class="container site-content">
            <div class="row">
                <main id="main" class="site-main col-sm-12 full-width">


                    <article id="post-7081" class="post-7081 page type-page status-publish hentry pmpro-has-access">
                        <div class="entry-content">
                            <div class="learnpress">
                                <div id="learn-press-profile" class="lp-user-profile current-user no-bio-user">


                                    <div class="lp-content-area">

                                        <aside id="profile-sidebar">
                                            <div class="wrapper-profile-header wrap-fullwidth">
                                                <div class="lp-content-area lp-profile-content-area">
                                                    <div class="lp-profile-left">
                                                        <div class="lp-user-profile-avatar">
                                                            <img decoding="async" fetchpriority="high" alt="User Avatar" src="//www.gravatar.com/avatar/dbc4d8e2c75d2069901e340fbf6e4f80?s=250&amp;r=g&amp;d=mm" height="250" width="250">
                                                        </div>
                                                        <div class="lp-user-username-social">
                                                            <div class="lp-profile-username">
                                                                Seller Name </div>
                                                        </div>
                                                    </div><!-- <div class="lp-profile-right"> -->

                                                    <!-- </div> -->
                                                </div>
                                            </div>

                                            <div id="profile-nav">


                                                <ul class="lp-profile-nav-tabs">


                                                    <li class="courses active" data-content="my-parcels">
                                                        <a href="#" data-slug="#">
                                                            <i class="fa fa-box"></i> My Percels </a>
                                                    </li>
                                                    <li class="courses" data-content="add-a-new">
                                                        <a href="#" data-slug="#">
                                                            <i class="fa fa-folder-plus"></i>Add a New Parcel </a>


                                                    </li>

                                                    <li class="my-courses" data-content="track-parcel">
                                                        <a href="#" data-slug="#">
                                                            <i class="fa-brands fa-searchengin"></i> Track a Parcel </a>


                                                    </li>
                                                    <li class="my-courses" data-content="my-balance">
                                                        <a href="#" data-slug="#">
                                                            <i class="fas fa-bars"></i> My Balance </a>
                                                    </li>



                                                    <li class="logout" data-content="logout">
                                                        <a href="#" data-slug="#">
                                                            <i class="fa-solid fa-right-from-bracket"></i> Logout </a>
                                                    </li>

                                                </ul>


                                            </div>

                                        </aside>

                                        <article id="profile-content contents  " class="lp-profile-content my-parcels active">

                                            <div id="profile-content-courses">
                                                <div class="learn-press-subtab-content">
                                                    <div class="learn-press-profile-course__statistic">
                                                        <div id="dashboard-statistic">
                                                            <div class="dashboard-statistic__row">
                                                                <div class="statistic-box" title="Total Course">
                                                                    <p class="statistic-box__text">Total Parcel</p>
                                                                    <span class="statistic-box__number">05</span>
                                                                </div>
                                                                <div class="statistic-box" title="Published Course">
                                                                    <p class="statistic-box__text">Total Delivered </p>
                                                                    <span class="statistic-box__number">03</span>
                                                                </div>
                                                                <div class="statistic-box" title="Pending Course">
                                                                    <p class="statistic-box__text">Total Pending</p>
                                                                    <span class="statistic-box__number">02</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="learn-press-profile-course__tab">
                                                    <div class="lp-archive-courses">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class=" p-4 text-center">My Percels</h3>
                                                                <table class="table">
                                                                    <tr>
                                                                        <th width="20%" style="color:white">Parcel Track ID</th>
                                                                        <th width="40%" style="color:white">Addess</th>
                                                                        <th width="30%" style="color:white">Status</th>
                                                                        <th width="10%" style="color:white">Amount</th>
                                                                    </tr>
                                                                    <?php
                                                                    $current_user_id = get_current_user_id();
                                                                    $args = array(
                                                                        'post_type' => 'parcel', // Post-type key
                                                                        'posts_per_page' => -1, // -1 retrieves all posts
                                                                        'author'         => $current_user_id, // Filter by current user ID
                                                                    );

                                                                    $query = new WP_Query($args);

                                                                    if ($query->have_posts()) {
                                                                        while ($query->have_posts()) {
                                                                            $query->the_post();
                                                                            $post_id = get_the_ID();
                                                                            $post_title = get_the_title($post_id);
                                                                            $receivers_name = get_post_meta($post_id, 'receivers_name', true);
                                                                            $receiver_contact = get_post_meta($post_id, 'receiver_contact', true);
                                                                            $parcel_type = get_post_meta($post_id, 'parcel_type', true);
                                                                            $cod_amount = get_post_meta($post_id, 'cod_amount', true);
                                                                            $receiver_address = get_post_meta($post_id, 'receiver_address', true);
                                                                            $receiver_area = get_post_meta($post_id, 'receiver_area', true);
                                                                            $receiver_city = get_post_meta($post_id, 'receiver_city', true);
                                                                            $receiver_distric = get_post_meta($post_id, 'receiver_distric', true);
                                                                            $parcel_description = get_post_meta($post_id, 'parcel_description', true);
                                                                            $parcel_status = get_post_meta($post_id, 'parcel_status', true);
                                                                            // Your loop content goes here
                                                                    ?> 

                                                                            <tr data-post-id="<?php echo $post_id; ?>" class='parcels'>
                                                                                <td class="text-left justify-content-center  ali">#<?php echo $post_id; ?></td>
                                                                                <td class="text-left justify-content-center  ali"><?php echo $receiver_address . "," . $receiver_distric . "," . $receiver_city . "," . $receiver_area; ?></td>
                                                                                <td class="justify-content-center text-center">
                                                                                    <?php
                                                                                    if ($parcel_status == "pending") {
                                                                                        echo "<p class='btn btn-warning'>Pending</p>";
                                                                                    } else if ($parcel_status == "canceled") {
                                                                                        $cancel_note = get_post_meta($post_id, 'cancel_note', true);
                                                                                        echo "<p class='btn btn-danger'>Cenceled</p>";
                                                                                        echo "<p>" . $cancel_note ."</p>";
                                                                                    } else if ($parcel_status == "completed") {
                                                                                        echo "<p class='btn btn-success'>Completed</p>";
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                                <td class="justify-content-center text-center"><?php
                                                                                                                                if ($parcel_type == "COD") {
                                                                                                                                    echo $cod_amount;
                                                                                                                                } else {
                                                                                                                                    echo 'Paid Parcel';
                                                                                                                                }
                                                                                                                                ?></td>
                                                                            </tr>

                                                                    <?php
                                                                        }

                                                                        // Restore original post data
                                                                        wp_reset_postdata();
                                                                    } else {
                                                                        // No posts found
                                                                        echo 'No posts found';
                                                                    }

                                                                    ?>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article id="profile-content contents " class="lp-profile-content add-a-new">

                                            <div id="profile-content-courses">

                                                <style>
                                                    .entry-titel-type h6 {
                                                        border: 1px solid black;
                                                        padding: 15px 30px;
                                                        margin: 0;
                                                        background: white;
                                                        box-shadow: 1px 1px 5px 0px #4d5a4d9e;
                                                        border-radius: 5px;
                                                    }
                                                </style>
                                                <div class="learn-press-profile-course__tab">
                                                    <div class="lp-archive-courses">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="entry-options">
                                                                    <div class="d-flex align-items-center flex-wrap align-content-center justify-content-around ">
                                                                        <div class="entry-titel-type">
                                                                            <h6>Single Entry</h6>
                                                                        </div>
                                                                        <div class="entry-titel-type">
                                                                            <h6>Bulk Entry</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- New Parcel Content goes Here -->
                                                                <div class="form">
                                                                    <form class="parcel-form">

                                                                        <style>
                                                                            body {
                                                                                background-color: #f8f9fa;
                                                                            }

                                                                            .parcel-form {
                                                                                max-width: 800px;
                                                                                margin: 10px auto;
                                                                                padding: 20px;
                                                                                background-color: #fff;
                                                                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                                                                border-radius: 10px;
                                                                            }

                                                                            .form-group.cod {
                                                                                display: none;
                                                                            }

                                                                            select#payment-type,
                                                                            select#area,
                                                                            select#city,
                                                                            select#distric {

                                                                                padding: 4px;
                                                                            }
                                                                        </style>
                                                                        <div class="form-group">
                                                                            <label for="senderName">Reciever's Name</label>
                                                                            <input type="text" class="form-control" id="senderName" name="recivername" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="senderAddress">Receiver Contact</label>
                                                                                    <input type="text" class="form-control" id="senderAddress" name="rcvcontact" required>

                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="receiverAddress">Payment Type</label>
                                                                                    <select name="payment-type" id="payment-type">
                                                                                        <option value="">--Select a payment Type</option>
                                                                                        <option value="paid">paid</option>
                                                                                        <option value="COD">COD</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group cod">
                                                                            <label for="receiverAddress">COD Amount</label>
                                                                            <input type="text" class="form-control" id="cod-amount" name="cod-amount">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="receiverName">Receiver's Address</label>
                                                                                    <input type="text" class="form-control" id="receiverName" name="receiveraddress" required>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <label for="receiverName">Receiver's Area</label>

                                                                                    <select name="area" id="area">
                                                                                        <option value="">--Select a Area</option>
                                                                                        <option value="area 1">Area 1</option>
                                                                                        <option value="area 2">Area 2</option>
                                                                                        <option value="area 3">Area 3</option>
                                                                                        <option value="area 4">Area 4</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">


                                                                                <div class="col-md-6">
                                                                                    <label for="receiverName">Receiver's City</label>

                                                                                    <select name="city" id="city">
                                                                                        <option value="" Desabled>--Select a City</option>

                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="receiverName">Receiver's Distric</label>

                                                                                    <select name="distric" id="distric">
                                                                                        <option value="">--Select a Distric</option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="parcelDescription">Parcel Description</label>
                                                                            <textarea class="form-control" id="parcelDescription" name="parcelDescription" rows="3" required></textarea>
                                                                        </div>

                                                                        <button type="submit" class="btn btn-primary">Submit Parcel</button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article id="profile-content contents " class="lp-profile-content track-parcel">

                                            <div id="profile-content-courses">


                                                <div class="learn-press-profile-course__tab">
                                                    <div class="lp-archive-courses">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class=" p-4 text-center">Track Parcel</h3>
                                                                <form class="parcel-form">

                                                                    <div class="form-group">
                                                                        <label for="senderName">Enter Parcel ID</label>
                                                                        <input type="text" class="form-control" id="senderName" name="senderName" required>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Track The Parcel</button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article id="profile-content contents " class="lp-profile-content my-balance">

                                            <div id="profile-content-courses">


                                                <div class="learn-press-profile-course__tab">
                                                    <div class="lp-archive-courses">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class=" p-4 text-center">My Balance</h3>
                                                                <!-- My Balanece Content goes Here -->
                                                                <div class="learn-press-subtab-content">
                                                                    <div class="learn-press-profile-course__statistic">
                                                                        <div id="dashboard-statistic">
                                                                            <div class="dashboard-statistic__row">
                                                                                <div class="statistic-box" title="Total Course">
                                                                                    <p class="statistic-box__text">Available For Widthdraw</p>
                                                                                    <span class="statistic-box__number">15648 TK</span>
                                                                                </div>
                                                                                <div class="statistic-box" title="Published Course">
                                                                                    <p class="statistic-box__text">Pending Balance </p>
                                                                                    <span class="statistic-box__number">352 TK</span>
                                                                                </div>
                                                                                <div class="statistic-box" title="Pending Course">
                                                                                    <p class="statistic-box__text">Total Balance</p>
                                                                                    <span class="statistic-box__number">16000</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="buttons d-flex align-items-center justify-content-center pt-4">
                                                                    <button class="btn btn-success">Request For a withdraw</button>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article id="profile-content contents " class="lp-profile-content logout">

                                            <div id="profile-content-courses">


                                                <div class="learn-press-profile-course__tab">
                                                    <div class="lp-archive-courses">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h3 class=" p-4 text-center">Logout</h3>
                                                                <p>You are going to log out. Please confirm</p>
                                                                <div class="logout-frame d-flex align-items-center justify-content-center pt-4">
                                                                    <button class="btn btn-danger " style="margin-right: 10px;"> Yes</button>
                                                                    <button class="btn btn-success"> NO </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </article>
                </main>
            </div>


        </div>

<?php

    }
}
