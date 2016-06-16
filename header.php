<!DOCTYPE html>
<html style="margin-top:0!important;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta name="description" content="Sahlstrom's Heating, Cooling, Plumbing, and Refrigeration located in Southwest Minnesota.">
    <meta name="keywords" content="HVAC, plumbing, heating, air conditioning, Southwest Minnesota">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/openGraph.jpg">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Sahlstrom's Heating, Cooling, Plumbing, and Refrigeration">
    <meta property="og:url" content="http://www.sahlstromsheating.com">
    <meta property="og:description" content="Sahlstrom's Heating, Cooling, Plumbing, and Refrigeration located in Southwest Minnesota.">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Sahlstrom's Heating, Cooling, Plumbing, and Refrigeration">
    <meta name="twitter:description" content="Sahlstrom's Heating, Cooling, Plumbing, and Refrigeration located in Southwest Minnesota.">
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/img/openGraph.jpg">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<link href='https://fonts.googleapis.com/css?family=Merriweather+Sans:400,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    
	<title><?php bloginfo('title')?></title>

	<script type="application/ld+json">
		{
		  	"@context": "http://schema.org",
		  	"@type": "LocalBusiness",
		  	"address": {
		    "@type": "PostalAddress",
		    "addressLocality": "Tracy",
		    "addressRegion": "MN",
		    "postalCode":"56175",
		    "streetAddress": "17858 Aspen Avenue"
	  	},
	  	"description": "Sahlstrom's Heating, Cooling, Plumbing, and Refrigeration located in Southwest Minnesota.",
	  	"name": "Sahlstrom's Heating and Refrigeration",
	  	"telephone": "507-629-3734",
	  	"geo": {
		    "@type": "GeoCoordinates",
		    "latitude": "44.3065071",
		    "longitude": "-95.5752504"
	 	}, 			
	  	"sameAs" : [ "https://www.facebook.com/Sahlstroms"]
		}
	</script>

	<?php wp_head()?>

</head>

<body id="body">

<nav>

	<div class="mobile-menu-toggle" id="mobile-menu-toggle">
		<?php get_template_part('img/inline', 'mobilemenu.svg'); ?>
	</div>

	<div class="mobile-nav-links" id="mobileNavLinks">
		<div id="close-mobile-menu"><?php get_template_part('img/inline', 'close.svg'); ?></div>
		<ul id="mobileNavLinksList">
			<?php $site_url = get_site_url(); ?>
			<li>Home<a href="<?php echo $site_url; ?>"></a></li>
			<li>About<a href="<?php echo $site_url; ?>/about"></a></li>
			<li>Our Team<a href="<?php echo $site_url; ?>/team"></a></li>
			<li>Heating Services<a href="<?php echo $site_url; ?>/heating"></a></li>
			<li>Cooling Services<a href="<?php echo $site_url; ?>/cooling"></a></li>
			<li>Plumbing Services<a href="<?php echo $site_url; ?>/plumbing"></a></li>
			<li>Refrigeration Services<a href="<?php echo $site_url; ?>/refrigeration"></a></li>
			<li>Contact<a href="<?php echo $site_url; ?>/contact"></a></li>
		</ul>
	</div>

	<div class="container nav-container">

		<div class="ribbon">
			<a href="/contact">
				<strong>Emergency</strong> Service Available!
			</a>
		</div>

		<div class="logo">
			<?php get_template_part('img/inline','logo.svg'); ?>
			<div style="clear:both;"></div>
		</div>

	</div>

	<div class="main-phone">

		<a href="<?php echo site_url(); ?>/contact">507-629-3734</a>
		<div class="background"></div>

	</div>

	<div class="mobile-only-es">
		<span id="eOnlyTrigger">
			Emergency Services Available
		</span>
	</div>

	<?php
			$defaults = array(
				'theme_location'  => 'primary-menu',
				'menu'            => '',
				'container'       => 'div',
				'container_class' => 'nav-links-holder',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul class="nav-links" id="navLinks">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
				);
			wp_nav_menu($defaults);
		?>

</nav>

<?php if (is_front_page()): ?>

<section class="banner">
	<div class="text-container">
		<h1 class="banner-header">Nice to Heat You.</h1>
		<span class="banner-span">Serving our community since 1996.</span>
		<div class="link-container">
			<a class="banner-link" href="tel:507-629-3734">507-629-3734</a>
			<a class="banner-link" href="<?php echo get_site_url(); ?>/contact">Contact Us</a>
		</div>
		<span class="find-fb"><a href="https://www.facebook.com/Sahlstroms">Find us on Facebook! <?php get_template_part('img/inline','facebook.svg'); ?></a></span>
	</div>
	<div class="home-slider" id="homeSlider">
		<?php
			$images = new WP_Query(array(
				'post_type' => 'homeimage',
			    'orderby'=>'rand',
			    'posts_per_page'   => -1
				));

			while ( $images->have_posts() ) : $images->the_post();
                $postID = $images->post->ID;
                $imageField = get_field('home_image', $postID);
                $imageURL = $imageField['sizes']['home-img'];
                ?>

        		<div>
					<img alt="<?php echo get_field('image_title', $postID); ?>" src="<?php echo $imageURL; ?>">
				</div>

			<?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
		?>

	</div>
	<div class="background"></div>
</section>

<?php else : ?>

<div class="banner page-banner">
	<div class="text-container">
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="page-banner-background"></div>
</div>

<?php endif; ?>

<hr>
