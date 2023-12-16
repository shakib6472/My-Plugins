<?php
wp_head();
get_header();
?>

<div class="mainbox">
		<div class="container containers">
			<div class="row">
				<div class="col-md-6">
					<div class="container">
						<div class="row">
						<?php
// Check if the post has a featured image
if (has_post_thumbnail()) {
    // Display the featured image
    the_post_thumbnail('full', ['class' => '', 'alt' => get_the_title()]);
} else {
    // Fallback image URL
    $fallback_image_url = 'https://marvelapi.marvellegends.co.uk/wp-content/uploads/2023/11/535fecbbb9784-300x300.jpg';
    
    // Display the fallback image
    echo '<img src="' . esc_url($fallback_image_url) . '" class="your-image-class" alt="' . get_the_title() . '">';
}
?>

						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-bg">
						<div class="p-3">

							<h2 class="charecher-titel">
								<?php the_title(); ?>
							</h2>

							<div class="child-items">
								<h5 class="child-heading">Modified Date</h5>
								<p class="child-des">
									<?php echo esc_html(get_post_meta(get_the_ID(), 'modify_date', true)); ?>
								</p>
							</div>
							<?php if (in_category('character')) {
								// Display For Main Carecter Details ?>

								<div class="child-items">
									<div class="container">
										<div class="row">
											<div class="col-md-3">
												<div>
													<h5 class="child-heading"> <a href="<?php echo home_url().'/marvel_characters?post_id='. get_the_ID() .'&child=comic'; ?>"> Comics</a></h5>
													<p class="child-des">
														<?php echo esc_html(get_post_meta(get_the_ID(), 'comics_items', true)); ?>
													</p>
												</div>
											</div>
											<div class="col-md-3">
												<div>
													<h5 class="child-heading"> <a href="<?php echo home_url().'/marvel_characters?post_id='. get_the_ID() .'&child=series'; ?>">Series</a></h5>
													<p class="child-des">
														<?php echo esc_html(get_post_meta(get_the_ID(), 'series', true)); ?>
													</p>
												</div>
											</div>
											<div class="col-md-3">
												<div>
													<h5 class="child-heading"> <a href="<?php echo home_url().'/marvel_characters?post_id='. get_the_ID() .'&child=stories'; ?>"> Stories</a></h5>
													<p class="child-des">
														<?php echo esc_html(get_post_meta(get_the_ID(), 'stories', true)); ?>
													</p>
													<div>
													</div>

												</div>
											</div>
											<div class="col-md-3">
												<div>
													<h5 class="child-heading"> <a href="<?php echo home_url().'/marvel_characters?post_id='. get_the_ID() .'&child=event'; ?>"> Events</a></h5>
													<p class="child-des">
														<?php echo esc_html(get_post_meta(get_the_ID(), 'events', true)); ?>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="child-items">
								<h5 class="child-heading">Biography</h5>
								<p class="child-des">
										<?php 
										if('' != get_post_meta(get_the_ID(), 'description', true) ){
											$bio = get_post_meta(get_the_ID(), 'description', true);
										} else {
											$bio = 'No Biography Found For This Character';
										}
										echo esc_html($bio); ?>
									</p>
								</div>
							<?php }
							if (in_category('comic') || in_category('stories')|| in_category('series')) {
								// Display For Main Carecter Details ?>
								<div class="child-items">
									<h5 class="child-heading">Creator</h5>
									<p class="child-des">
									<?php 
										if('' != get_post_meta(get_the_ID(), 'comic_creator', true) ){
											$creatr = get_post_meta(get_the_ID(), 'comic_creator', true);
										} else {
											$creatr = 'No Creator Found';
										}
										echo esc_html($creatr); ?>
										
									</p>
								</div>
							<?php }
							if (in_category('comic')) {
								// Display For Main Carecter Details ?>
								<div class="child-items">
									<h5 class="child-heading">Comic Text</h5>
									<p class="child-des">
										<?php echo esc_html(get_post_meta(get_the_ID(), 'comic_text', true)); ?>
									</p>
								</div>
								<div class="child-items d-flex justify-content-between">
									<div>
										<h5 class="child-heading">Comic Print Price</h5>
										<p class="child-des">
											<?php echo esc_html(get_post_meta(get_the_ID(), 'comic_print_price', true)); ?>
										</p>
									</div>
									<div>
										<h5 class="child-heading">Comic Digital Purchase Price</h5>
										<p class="child-des">
											<?php echo esc_html(get_post_meta(get_the_ID(), 'comic_digital_purchase_price', true)); ?>
										</p>
									</div>
								<?php }
							if (in_category('series')) {
								// Display For Main Carecter Details ?>
								<div class="child-items">
								<h5 class="child-heading">Description</h5>
								<p class="child-des">
										<?php 
										if('' != get_post_meta(get_the_ID(), 'description', true) ){
											$des_series = get_post_meta(get_the_ID(), 'description', true);
										} else {
											$des_series = 'No Description Found For This Character';
										}
										echo esc_html($des_series); ?>
									</p>
								</div>
									<div class="child-items">
										<h5 class="child-heading">Series Start Year</h5>
										<p class="child-des">
											<?php echo esc_html(get_post_meta(get_the_ID(), 'startyear', true)); ?>
										</p>
									</div>
									<div class="child-items">
										<h5 class="child-heading">Series End Year</h5>
										<p class="child-des">
											<?php echo esc_html(get_post_meta(get_the_ID(), 'endyear', true)); ?>
										</p>
									</div>

								<?php } ?>


							</div>   
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

<?php
wp_footer();
get_footer();
?>