<!DOCTYPE html>
<html style="margin-top:0!important;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<title><?php bloginfo('title')?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="/image/x-icon"/>
	
	<?php wp_head()?>

	<!-- Google Analytics -->
	<script>

</script>

</head>

<body class="no-js">

<nav>

	<div class="mobile-menu-toggle" id="mobile-menu-toggle">
		<?php get_template_part('img/inline', 'mobilemenu.svg'); ?>
	</div>

	<div class="mobile-nav-links">
		<div id="close-mobile-menu"><?php get_template_part('img/inline', 'close.svg'); ?></div>
		<ul>
			<li>Heating<a href="<?php echo get_site_url(); ?>/heating"></a></li>
			<li>Cooling<a href="<?php echo get_site_url(); ?>/cooling"></a></li>
			<li>Plumbing<a href="<?php echo get_site_url(); ?>/plumbing"></a></li>
			<li>Refrigeration<a href="<?php echo get_site_url(); ?>/refrigeration"></a></li>
			<li>Contact<a href="<?php echo get_site_url(); ?>/contact"></a></li>
		</ul>
	</div>

	<div class="nav-container">

		<div class="logo">
			<a href="<?php echo home_url(); ?>"></a>
		</div>

		<ul class="nav-links">
			<li>Heating<a href="<?php echo get_site_url(); ?>/heating"></a></li>
			<li>Cooling<a href="<?php echo get_site_url(); ?>/cooling"></a></li>
			<li>Plumbing<a href="<?php echo get_site_url(); ?>/plumbing"></a></li>
			<li>Refrigeration<a href="<?php echo get_site_url(); ?>/refrigeration"></a></li>
		</ul>
	</div>

</nav>

<?php if (is_front_page()): ?>

<div class="banner">
	<div class="text-container">
		<h1 class="banner-header">Nice to Heat You.</h1>
		<span>Serving our community since 1996.</span>
		<div class="link-container">
			<a href="tel:507-629-3734">507-629-3734</a>
			<a href="http://localhost/sahlstroms/contact">Contact Us</a>
		</div>
	</div>
</div>

<?php else : ?>

<div class="banner page-banner">
	<div class="text-container">
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="page-banner-background"></div>
</div>

<?php endif; ?>

<hr>