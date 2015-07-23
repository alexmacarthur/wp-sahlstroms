<?php

	/* removes tabs on left admin menu */
	add_action('admin_menu', 'remove_menus');
	function remove_menus(){
		//remove_menu_page( 'edit.php' );   
		//remove_menu_page( 'edit-comments.php' ); 
		//remove_menu_page( 'themes.php' ); 
		//remove_menu_page('plugins.php');
		//remove_menu_page('tools.php');
	}

	// hide the admin bar on all pages
	add_filter('show_admin_bar', '__return_false');

	/* removes widgets on dashboard */
	add_action('admin_init', 'remove_dashboard_meta');
	function remove_dashboard_meta() {
        //remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_activity', 'dashboard', 'side' );
        //remove_meta_box( 'pageparentdiv', 'page', 'normal');
	}

	add_action( 'wp_enqueue_scripts', 'enqueue_my_scripts' );
	function enqueue_my_scripts(){

		wp_register_style('custom-style', get_template_directory_uri() . '/styles/style.css', array(), '1');

		// register jQuery with CDN
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '2.1.3', true);

		// register custom JavaScript
	    wp_register_script( 'custom-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1', true);

	    // Enqueue my custom script, which depends on jQuery, which means jQuery is automatically loaded as well. 
	    wp_enqueue_script( 'custom-script' );
	    wp_enqueue_style('custom-style');
	}

	/* custom logo on login screen */
	function my_login_logo() { ?>
	
	    <style type="text/css">
	        body.login div#login h1 a {
	            background-image: url('<?php echo get_template_directory_uri(); ?>/img/logo.png')!important;
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
	add_action( 'login_enqueue_scripts', 'my_login_logo' );








?>