<?php

class Sahlstroms_Init {
	public function __construct() {
		$enqueue_styles = new Sahlstroms_Enqueue_Scripts_Styles();
		$custom_post_types = new Sahlstroms_Custom_Post_Types();
		$media = new Sahlstroms_Media();
		$admin_customizations = new Sahlstroms_Admin_Customizations();
		$misc = new Sahlstroms_Miscellaneous();
	}
}