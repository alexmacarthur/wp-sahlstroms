<?php
/*
 * Template Name: Contact Page
 * Description: Standard page, but it contains a contact form.
 */
?>

<?php get_header()?>

	<main>
		<div class="container page-container">

			<?php the_post(); ?>

			<div class="page-content contact-content user-managed-content">

				<div class="six columns contact-column">
					<div class="content">
						<?php the_content(); ?>
					</div>

					<div class="google-map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2855.185363193448!2d-95.57291540000001!3d44.3061397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x878afcda1d4ed36d%3A0xc240fb702a15a6c0!2s17858+Aspen+Ave%2C+Tracy%2C+MN+56175!5e0!3m2!1sen!2sus!4v1426951360610" width="400" height="300" frameborder="0" style="border:0"></iframe>
					</div>

				</div>

				<div class="six columns contact-column">

					<div class="form-messages form-messages-contact"></div>

					<form action="<?php echo get_template_directory_uri(); ?>/send.php" method="post" class="contactForm home-page" id="ajax-contact">

						<div class="form-field"><label>Name<span>*</span></label> <input type="text" id="name" name="name"></div>

						<div class="form-form-field"><label>Phone Number</label> <input type="text" id="phonenumber" name="phonenumber"></div>

						<div class="form-field"><label>Email Address<span>*</span></label> <input type="text" id="email" name="email"></div>

						<div class="form-field"><label>City, State</label> <input type="text" id="citystate" name="citystate"></div>

						<div class="form-field"><label>Message<span>*</span></label> <textarea name="message" id="message"></textarea></div>

						<input type="submit" name="submit" value="Submit">
					</form>

					<div class="form-messages mobile-only form-messages-contact"></div>
				</div>



			</div>

		</div>

	</main>

<?php get_footer()?>
