<?php

class Sahlstroms_Miscellaneous {

	public function __construct() {
		add_action('init', array($this, 'register_menu'));
	}

	public function register_menu() {
		register_nav_menu('primary-menu', __('Primary Menu'));
	}

	public function my_acf_json_save_point($path) {
	    $path = get_stylesheet_directory() . '/acf-fields';
	    return $path; 
	}

	public function my_acf_json_load_point($paths) {
	    unset($paths[0]);
	    $paths[] = get_stylesheet_directory() . '/acf-fields';
	    return $paths;
	}
}