<?php

class Sahlstroms_Miscellaneous {

	public function __construct() {
		add_action('init', array($this, 'register_menu'));
	}

	public function register_menu() {
		register_nav_menu('primary-menu', __('Primary Menu'));
	}
}