<?php

if ( !defined( 'WPINC' ) ) {
	die;
}

if( !class_exists( 'Sahlstroms' ) ) {
	class Sahlstroms {
		private static $instance;

		public static function generate_instance() {
			if ( !isset( self::$instance ) && ! ( self::$instance instanceof Sahlstroms ) ) {
				self::$instance = new Sahlstroms;
				self::$instance->includes();
				self::$instance->init = new Sahlstroms_Init();
			}
			return self::$instance;
		}

		private function includes() {
			require_once 'functions-includes/class-sahlstroms-miscellaneous.php';
			require_once 'functions-includes/class-sahlstroms-admin-customizations.php';
			require_once 'functions-includes/class-sahlstroms-media.php';
			require_once 'functions-includes/class-sahlstroms-custom-post-types.php';
			require_once 'functions-includes/class-sahlstroms-enqueue-scripts-styles.php';
			require_once 'functions-includes/class-sahlstroms-init.php';
			require_once 'functions-includes/template-functions.php';
		}
	}
}

function Sahlstroms_Run() {
	return Sahlstroms::generate_instance();
}

Sahlstroms_Run();