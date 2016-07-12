<form action="<?= admin_url('admin-ajax.php?action=email_action'); ?>" method="post" class="contactForm <?php if(is_front_page()): ?>home-page<?php endif; ?>" id="ajax-contact">

	<div class="form-field"><label>Name<span>*</span></label> <input type="text" id="name" name="name"></div>

	<div class="form-form-field"><label>Phone Number</label> <input type="text" id="phonenumber" name="phonenumber"></div>

	<div class="form-field"><label>Email Address<span>*</span></label> <input type="text" id="email" name="email"></div>

	<div class="form-field"><label>City, State</label> <input type="text" id="citystate" name="citystate"></div>

	<div class="form-field"><label>Message<span>*</span></label> <textarea name="message" id="message"></textarea></div>

	<input type="submit" name="submit" value="Submit">
</form>