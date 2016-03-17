<?php

class Sahlstroms_Media {
	public function __construct() {
		add_theme_support('post-thumbnails');
		add_image_size('home-img', 1500, 600, true);
		add_image_size('home-images', 1300, 99999, false);
		add_filter('the_content', array($this, 'attachment_image_link_remove_filter'));
	}

	public function attachment_image_link_remove_filter( $content ) {
		$content = preg_replace( array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}', '{ wp-image-[0-9]*" /></a>}'), array('<img','" />'), $content ); 
		return $content; 
	}
}