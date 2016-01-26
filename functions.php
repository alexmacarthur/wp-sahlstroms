<?php

	/* removes tabs on left admin menu */
	add_action('admin_menu', 'remove_menus');
	function remove_menus(){
		remove_menu_page( 'edit.php' );
		remove_menu_page( 'edit-comments.php' );
		//remove_menu_page( 'themes.php' );
		//remove_menu_page('plugins.php');
		//remove_menu_page('tools.php');
	}

	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'home-images', 1300, 99999, false);
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
        remove_meta_box( 'pageparentdiv', 'page', 'normal');
	}

	add_action('init', 'register_menu');
	function register_menu() {
		register_nav_menu('primary-menu', __('Primary Menu'));
	}

	add_action( 'wp_enqueue_scripts', 'enqueue_my_scripts' );
	function enqueue_my_scripts(){

		wp_register_style('custom-style', get_template_directory_uri() . '/styles/style.css', array(), '1');

		// register jQuery with CDN
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '2.1.3', true);
		wp_register_script('slick', ('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.js'), array('jquery'), null, true);

		// register custom JavaScript
    wp_register_script( 'custom-script', get_template_directory_uri() . '/js/scripts.min.js', array('jquery', 'slick'), '1', true);

    // Enqueue my custom script, which depends on jQuery, which means jQuery is automatically loaded as well.
    wp_enqueue_script( 'custom-script' );
    wp_enqueue_style('custom-style');
	}


		/**
	 * Add automatic image sizes
	 */
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'post-feature-img', 770, 120, true ); //(cropped)
		add_image_size( 'member-img', 200, 200, false ); //(scaled)
		add_image_size( 'people-img', 360, 360, true ); //(cropped)
		add_image_size( 'people-featured-img', 150, 120, true ); //(cropped)
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

	add_action( 'admin_init', 'hide_editor' );
	function hide_editor() {
	  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	  if( !isset( $post_id ) ) return;

	  if(get_the_title($post_id) == 'Home'){
	    remove_post_type_support('page', 'editor');
	    remove_post_type_support('page', 'title');
	  }
	}

	add_action( 'init', 'create_post_type' );
  	function create_post_type() {

		register_post_type( 'team_member',
			array(
				'labels' => array(
					'name'               => _x( 'Team Members', 'post type general name' ),
					'singular_name'      => _x( 'Team Member', 'post type singular name' ),
					'add_new'            => _x( 'Add New', 'Team Member' ),
					'add_new_item'       => __( 'Add New Team Member' ),
					'edit_item'          => __( 'Edit Team Member' ),
					'new_item'           => __( 'New Team Member' ),
					'all_items'          => __( 'All Team Member' ),
					'view_item'          => __( 'View Team Member' ),
					'search_items'       => __( 'Search Team Members' ),
					'not_found'          => __( 'No team member found' ),
					'not_found_in_trash' => __( 'No team member found in the trash' ),
					'parent_item_colon'  => '',
					'menu_name'          => 'Team Members'
				),
					'public' => true,
					'has_archive' => true,
					'menu_position' => 5,
				'supports'      => array('')
			)
		);

    register_post_type( 'homeimage',
	    array(
	        'labels' => array(
	          'name' => __( 'Home Images' ),
	          'singular_name' => __( 'Home Images' ),
	          'edit_item' => __('Add a Home Image'),
	          'add_new_item' => __('Add a New Home Image')
	        ),
	          'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
	        'publicly_queriable' => true,  // you should be able to query it
	        'show_ui' => true,  // you should be able to edit it in wp-admin
	        'exclude_from_search' => true,  // you should exclude it from search results
	        'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
	        'has_archive' => false,  // it shouldn't have archive page
	        'rewrite' => false,  // it shouldn't have rewrite rules
	        'supports' => array('')
	      )
	    );
	}

	/* HOME SLIDER IMAGES ORGANIZATION */

	add_filter( 'manage_edit-homeimage_columns', 'set_custom_edit_homeimage_columns' );
	function set_custom_edit_homeimage_columns($columns) {
	  unset($columns['date']);
	  unset($columns['title']);

	  $columns['image_title']  = 'Image Title';

	  return $columns;
	}

	add_action( 'manage_homeimage_posts_custom_column' , 'custom_homeimage_column', 10, 2 );
	function custom_homeimage_column( $column, $post_id ) {
	  switch ( $column ) {

	      case 'image_title' :
	        $value = get_field( "image_title", $post_id );
	        echo '<a href="' . get_site_url() .'/wp-admin/post.php?post=' . $post_id . '&action=edit">' . $value . '</a>';
	          break;
	  }
	}

	add_filter( 'manage_edit-homeimage_sortable_columns', 'manage_sortable_columns_homeimage' );
	function manage_sortable_columns_homeimage( $sortable_columns ) {

	 $sortable_columns[ 'image_title' ] = 'image_title';

	 return $sortable_columns;

	}

	/* TEAM MEMBERS ORGANIZATION */

	add_filter( 'manage_edit-team_member_columns', 'set_custom_edit_team_member_columns' );
	function set_custom_edit_team_member_columns($columns) {
		unset($columns['date']);
		unset($columns['title']);

		$columns['team_member_first_name']  = 'First Name';
		$columns['team_member_last_name']  = 'First Name';

		return $columns;
	}

	add_action( 'manage_team_member_posts_custom_column' , 'custom_team_member_column', 10, 2 );
	function custom_team_member_column( $column, $post_id ) {
		switch ( $column ) {

				case 'team_member_first_name' :
					$value = get_field( "team_member_first_name", $post_id );
					echo '<a href="' . get_site_url() .'/wp-admin/post.php?post=' . $post_id . '&action=edit">' . $value . '</a>';
						break;

				case 'team_member_last_name' :
					$value = get_field( "team_member_last_name", $post_id );
					echo '<a href="' . get_site_url() .'/wp-admin/post.php?post=' . $post_id . '&action=edit">' . $value . '</a>';
						break;
		}
	}

	add_filter( 'manage_edit-team_member_sortable_columns', 'manage_sortable_columns_team_member' );
	function manage_sortable_columns_team_member( $sortable_columns ) {

	 $sortable_columns[ 'team_member_first_name' ] = 'team_member_first_name';
	 $sortable_columns[ 'team_member_last_name' ] = 'team_member_last_name';

	 return $sortable_columns;

	}

	add_theme_support( 'post-thumbnails' );
?>
