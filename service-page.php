<?php
/*
 * Template Name: Service Page
 * Description: Standard page for HVAC services.
 */
?>

<?php get_header()?>

	<main>

        <div class="container page-container">

	        <?php the_post(); ?>
	        
			<div class="page-content">

				<div class="seven columns page-content-block page-text-content">
					<?php the_content(); ?>
					<div class="reference-block">
						<div class="seven columns">
							<h4>Need a Reference?</h4>
							<p>Ask and you shall receive.</p>
						</div>
						<div class="five columns">
							<?php
								// gets page link based on title so we don't have to deal with it when switching servers
								$page = get_page_by_title( 'Contact' );
								$pageID = $page -> ID;
							?>
							<a class="page-contact" href="<?php echo get_page_link($pageID); ?>">Contact Us</a>
						</div>
					</div>
				</div>

				<div class="five columns page-content-block page-image-content">

				<?php
					if (is_page('plumbing')){
					 	get_template_part('img/inline', 'plumber.svg');
					} elseif (is_page('refrigeration')){
						get_template_part('img/inline', 'cooling.svg');
					} elseif (is_page('cooling')){
						get_template_part('img/inline', 'cooling.svg');
					} elseif (is_page('heating')){
						get_template_part('img/inline', 'heating.svg');
					}
				?>						

				</div>
				
            </div><!-- .page-content -->
  	
        </div><!-- #container -->

        <div class="page-testimonial-bar">

        	<div class="container">

				<div class="four columns bubbles-part">
					<?php get_template_part('img/inline', 'bubbles.svg'); ?>
				</div>

				<div class="eight columns testimonial-part">
					<?php
						if (is_page('plumbing')){
						 	echo "<blockquote>Excellent service! We have used Sahlstrom's Heating Cooling for years now and have never been disappointed. <cite>- Vicki</cite></blockquote>
								";
						} elseif (is_page('refrigeration')){
							echo "<blockquote>Excellent service! We have used Sahlstrom's Heating Cooling for years now and have never been disappointed. <cite>- Vicki</cite></blockquote>
								";
						} elseif (is_page('cooling')){
							echo "<blockquote>Last summer our air conditioner wasn't working correctly and they had it fixed in no time. They were quick and friendly. <cite>- Kris</cite></blockquote>
								";
						} elseif (is_page('heating')){
							echo "<blockquote>Wonderful service & very personable. Definitely recommend Sahlstrom’s. <cite>- Randi</cite></blockquote>
								";
						}
					?>
				</div>

			</div>

		</div>
       
    </main>

<?php get_footer()?>