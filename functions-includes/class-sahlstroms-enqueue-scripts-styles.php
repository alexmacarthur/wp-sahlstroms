<?php

class Sahlstroms_Enqueue_Scripts_Styles {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_stuff') );
	}

	public function enqueue_stuff(){
		wp_register_style('custom-style', get_template_directory_uri() . '/styles/style.css', array(), '1');
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), null, true);
		wp_register_script('slick', ('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.js'), array('jquery'), null, true);
	    wp_register_script('custom-script', get_template_directory_uri() . '/js/scripts.min.js', array('jquery', 'slick'), null, true);
	    wp_enqueue_script('custom-script');
	    wp_enqueue_style('custom-style');
	}
}