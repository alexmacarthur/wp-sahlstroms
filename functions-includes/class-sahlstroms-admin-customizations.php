<?php

class Sahlstroms_Admin_Customizations {

	public function __construct() {
		add_action('login_enqueue_scripts', array($this, 'admin_logo'));
		add_action('admin_menu', array($this, 'remove_menus'));
		add_action('admin_init', array($this, 'hide_editor'));
		add_action('admin_init', array($this, 'remove_dashboard_meta'));
		add_filter('show_admin_bar', '__return_false');
	}

	public function admin_logo() { ?>
	    <style type="text/css">
	        body.login div#login h1 a {
	            background-image: url('<?php echo get_template_directory_uri(); ?>/img/logo.svg')!important;
	            padding-bottom: 3px;
				width: 100%;
				background-size: contain;
				margin-bottom:0;
	        }
			#loginform #wp-submit{
				background: rgb(63, 63, 63);
				border-color: black;
				-webkit-box-shadow: inset 0 1px 0 rgba(203, 203, 203, 0.5),0 1px 0 rgba(0,0,0,.15);
				box-shadow: inset 0 1px 0 rgba(231, 231, 231, 0.5),0 1px 0 rgba(0,0,0,.15);
			}
			 .login input:focus{
				border-color: rgba(169, 169, 169, 0.6);
				-webkit-box-shadow: 0 0 2px rgba(205, 205, 205, 0.8);
				box-shadow: 0 0 2px rgba(226, 226, 226, 0.8);
			}
	    </style>
	<?php }

	public function hide_editor() {
		$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
		if( !isset( $post_id ) ) return;

		if(get_the_title($post_id) === 'Home'){
			remove_post_type_support('page', 'editor');
			remove_post_type_support('page', 'title');
		}
	}

	public function remove_dashboard_meta() {
        remove_meta_box( 'pageparentdiv', 'page', 'normal');
	}

	public function remove_menus(){
		remove_menu_page( 'edit.php' );
		remove_menu_page( 'edit-comments.php' );
	}
}