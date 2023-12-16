<?php
wp_head();
get_header();
if (has_post_thumbnail()) {
    // Get the ID of the featured image
    $thumbnail_id = get_post_thumbnail_id();

    // Get the URL of the featured image
    $image_url = wp_get_attachment_image_src($thumbnail_id, 'full');

    // $image_url is an array containing the URL at index 0
    if ($image_url) {
        $image_url = $image_url[0]; // Retrieve the URL from the array
    }
}
$post_id = get_the_ID();
?>

<div id="__next" style=" min-height: 800px; ">
    <div id="terrigen-page" class="page">
        <div id="page-wrapper" class="page__body">
            <div id="page-content" class="page__contents character-on-screen-profile-page">
                <section id="masthead-1"
                    class="page__component page__component--character-on-screen-profile page__component--masthead section__color__light firstComponent">
                    <div class="masthead default subnav full dark  "><svg class="powerSlashShadow" width="100%"
                            height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <filter id="powerSlashShadow__filter">
                                <feDropShadow dx="0" dy=".5" stdDeviation="1"></feDropShadow>
                            </filter>
                            <polygon class="powerSlashShadow__dropshadow" points="2,0 2,98 98,95 98,0"></polygon>
                        </svg>
                        <div class="masthead__wrapper">
                            <div class="masthead__background__wrapper">
                                <figure class="img__wrapper masthead__background">
                                    <div class="built__background built__background--multi  use-vars"
                                        style="background-image:url(&#x27; <?php echo $image_url; ?> &#x27;)">
                                    </div>
                                </figure>
                            </div>
                            <div class="masthead__hero">
                                <div class="masthead__main">
                                    <div class="masthead__container masthead__container_playing-false ">
                                        <h1><span class="masthead__eyebrow"></span><span class="masthead__headline">
                                                <?php the_title(); ?>
                                            </span></h1>
                                        <div class="masthead__copy">
                                            <?php
                                            if ('' != get_post_meta(get_the_ID(), 'description', true)) {
                                                $bio = get_post_meta(get_the_ID(), 'description', true);
                                            } else {
                                                $bio = 'No Biography Found For This Character';
                                            }
                                            echo esc_html($bio); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav aria-label="all about Spider-Man" class="masthead__tabs">
                            <ul class="masthead__tabs-wrapper">
                                <li class="masthead__tabs__li"><a class="masthead__tabs__link 
                                        masthead__tabs__link--active
                          " href="" data-content="charecter"><span class="masthead__tabs__link-text">Character
                                            Details</span></a></li>
                                <li class="masthead__tabs__li"><a class="masthead__tabs__link" href=""
                                        data-content="comic"><span class="masthead__tabs__link-text">Comics</span></a>
                                </li>
                                <li class="masthead__tabs__li"><a class="masthead__tabs__link
                          " href="" data-content="series"><span class="masthead__tabs__link-text">Series</span></a>
                                </li>
                                <li class="masthead__tabs__li"><a class="masthead__tabs__link
                          " href="" data-content="stories"><span class="masthead__tabs__link-text">Stories</span></a>
                                </li>
                                <li class="masthead__tabs__li"><a class="masthead__tabs__link
                          " href="" data-content="events"><span class="masthead__tabs__link-text">Events</span></a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </section>
                <div class="section-holder">
                    <!-- Charechter Section -->
                    <section>
                        <div class="container details-sec charecter show">
                            <div class="row align-content-center align-items-top ">
                                <div class="col-md-6">
                                    <img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>">
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <div class="childs">
                                        <h4>Character Name</h4>
                                        <p>
                                            <?php the_title(); ?>
                                        </p>
                                    </div>
                                    <div class="childs">
                                        <h4>Biography</h4>
                                        <p>
                                            <?php
                                            if ('' != get_post_meta(get_the_ID(), 'description', true)) {
                                                $bio = get_post_meta(get_the_ID(), 'description', true);
                                            } else {
                                                $bio = 'No Biography Found For This Character';
                                            }
                                            echo esc_html($bio); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Comic Section -->
                    <section>
                        <div class="container details-sec comic">
                            <div class="mainbox">
                                <div class="container containers">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h1>
                                                <?php the_title(); ?>

                                            </h1>
                                            <h5>All Comic OF
                                                <?php the_title(); ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="container archives">
                                    <div class="d-flex flex-wrap">
                                        <?php
                                        $args = array(
                                            'post_type' => 'marvel_characters',
                                            'category_name' => 'comic',
                                            'post_parent' => $post_id,
                                            'posts_per_page' => -1, // Set the number of posts to display, -1 for all
                                        );

                                        $posts = new WP_Query($args);

                                        if ($posts->have_posts()) {
                                            while ($posts->have_posts()) {
                                                $posts->the_post(); ?>
                                                <div class="col-md-3 text-center">
                                                    <div>
                                                        <?php // Display thumbnail
                                                                if (has_post_thumbnail()) {
                                                                    the_post_thumbnail('full', ['class' => '', 'alt' => get_the_title()]); // You can change the thumbnail size if needed
                                                                } else {
                                                                    echo '<img src="https://marvellegends.co.uk/wp-content/uploads/2023/12/image_not_available.jpg" alt="">';
                                                                }
                                                                // Display post title
                                                                echo '<h3><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h3>';
                                                                ?>

                                                    </div>
                                                </div>
                                                <?php

                                            }
                                        } else {
                                            echo 'No posts found.';
                                        }

                                        wp_reset_postdata(); // Reset the query
                                        ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Series Section -->
                    <section>
                        <div class="container details-sec series">
                            <div class="mainbox">
                                <div class="container containers">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h1>
                                                <?php the_title(); ?>

                                            </h1>
                                            <h5>All Series OF
                                                <?php the_title(); ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="container archives">
                                    <div class="d-flex flex-wrap">
                                        <?php
                                        $args = array(
                                            'post_type' => 'marvel_characters',
                                            'category_name' => 'series',
                                            'post_parent' => $post_id,
                                            'posts_per_page' => -1, // Set the number of posts to display, -1 for all
                                        );

                                        $posts = new WP_Query($args);

                                        if ($posts->have_posts()) {
                                            while ($posts->have_posts()) {
                                                $posts->the_post(); ?>
                                                <div class="col-md-3 text-center">
                                                    <div>
                                                        <?php // Display thumbnail
                                                                if (has_post_thumbnail()) {
                                                                    the_post_thumbnail('full', ['class' => '', 'alt' => get_the_title()]); // You can change the thumbnail size if needed
                                                                } else {
                                                                    echo '<img src="https://marvellegends.co.uk/wp-content/uploads/2023/12/image_not_available.jpg" alt="">';
                                                                }
                                                                // Display post title
                                                                echo '<h3><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h3>';
                                                                ?>

                                                    </div>
                                                </div>
                                                <?php

                                            }
                                        } else {
                                            echo 'No posts found.';
                                        }

                                        wp_reset_postdata(); // Reset the query
                                        ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Stories Section -->
                    <section>
                        <div class="container details-sec stories">
                            <div class="mainbox">
                                <div class="container containers">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h1>
                                                <?php the_title(); ?>

                                            </h1>
                                            <h5>All Stories OF
                                                <?php the_title(); ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="container archives">
                                    <div class="d-flex flex-wrap">
                                        <?php
                                        $args = array(
                                            'post_type' => 'marvel_characters',
                                            'category_name' => 'stories',
                                            'post_parent' => $post_id,
                                            'posts_per_page' => -1, // Set the number of posts to display, -1 for all
                                        );

                                        $posts = new WP_Query($args);

                                        if ($posts->have_posts()) {
                                            while ($posts->have_posts()) {
                                                $posts->the_post(); ?>
                                                <div class="col-md-3 text-center">
                                                    <div>
                                                        <?php // Display thumbnail
                                                                if (has_post_thumbnail()) {
                                                                    the_post_thumbnail('full', ['class' => '', 'alt' => get_the_title()]); // You can change the thumbnail size if needed
                                                                } else {
                                                                    echo '<img src="https://marvellegends.co.uk/wp-content/uploads/2023/12/image_not_available.jpg" alt="">';
                                                                }
                                                                // Display post title
                                                                echo '<h3><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h3>';
                                                                ?>

                                                    </div>
                                                </div>
                                                <?php

                                            }
                                        } else {
                                            echo 'No posts found.';
                                        }

                                        wp_reset_postdata(); // Reset the query
                                        ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Event Section -->
                    <section>
                        <div class="container details-sec events">
                            <div class="mainbox">
                                <div class="container containers">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h1>
                                                <?php the_title(); ?>

                                            </h1>
                                            <h5>All Events OF
                                                <?php the_title(); ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="container archives">
                                    <div class="d-flex flex-wrap">
                                        <?php
                                        $args = array(
                                            'post_type' => 'marvel_characters',
                                            'category_name' => 'event',
                                            'post_parent' => $post_id,
                                            'posts_per_page' => -1, // Set the number of posts to display, -1 for all
                                        );

                                        $posts = new WP_Query($args);

                                        if ($posts->have_posts()) {
                                            while ($posts->have_posts()) {
                                                $posts->the_post(); ?>
                                                <div class="col-md-3 text-center">
                                                    <div>
                                                        <?php // Display thumbnail
                                                                if (has_post_thumbnail()) {
                                                                    the_post_thumbnail('full', ['class' => '', 'alt' => get_the_title()]); // You can change the thumbnail size if needed
                                                                } else {
                                                                    echo '<img src="https://marvellegends.co.uk/wp-content/uploads/2023/12/image_not_available.jpg" alt="">';
                                                                }
                                                                // Display post title
                                                                echo '<h3><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h3>';
                                                                ?>

                                                    </div>
                                                </div>
                                                <?php

                                            }
                                        } else {
                                            echo 'No posts found.';
                                        }

                                        wp_reset_postdata(); // Reset the query
                                        ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</div>




<?php
wp_footer();
get_footer();
?>