<?php

class Sahlstroms_Custom_Post_Types {
	public function __construct() {
		add_action('init', array($this, 'create_post_types'));
		add_action( 'manage_homeimage_posts_custom_column' , array($this, 'custom_homeimage_column'), 10, 2);
		add_action( 'manage_team_member_posts_custom_column' , array($this, 'custom_team_member_column'), 10, 2);
		add_filter( 'manage_edit-homeimage_columns', array($this, 'set_custom_edit_homeimage_columns'));
		add_filter( 'manage_edit-homeimage_sortable_columns', array($this, 'manage_sortable_columns_homeimage'));
		add_filter( 'manage_edit-team_member_sortable_columns', array($this, 'manage_sortable_columns_team_member'));
		add_filter( 'manage_edit-team_member_columns', array($this, 'set_custom_edit_team_member_columns'));
	}

	public function create_post_types() {
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
		          'public' => false,  
		        'publicly_queriable' => true,  
		        'show_ui' => true, 
		        'exclude_from_search' => true,  
		        'show_in_nav_menus' => false,  
		        'has_archive' => false,  
		        'rewrite' => false,  
		        'supports' => array('')
		    )
		);
	}

	public function set_custom_edit_homeimage_columns($columns) {
	  	unset($columns['date']);
	  	unset($columns['title']);
	  	$columns['image_title']  = 'Image Title';
	  	return $columns;
	}
	
	public function custom_homeimage_column( $column, $post_id ) {
	  switch ( $column ) {
	      	case 'image_title' :
	        	$value = get_field( "image_title", $post_id );
		        echo '<a href="' . get_site_url() .'/wp-admin/post.php?post=' . $post_id . '&action=edit">' . $value . '</a>';
		        break;
	  }
	}

	public function manage_sortable_columns_homeimage( $sortable_columns ) {
	 	$sortable_columns[ 'image_title' ] = 'image_title';
	 	return $sortable_columns;
	}
	
	public function set_custom_edit_team_member_columns($columns) {
		unset($columns['date']);
		unset($columns['title']);
		$columns['team_member_first_name']  = 'First Name';
		$columns['team_member_last_name']  = 'First Name';
		return $columns;
	}
	
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
	
	function manage_sortable_columns_team_member( $sortable_columns ) {
	 	$sortable_columns[ 'team_member_first_name' ] = 'team_member_first_name';
	 	$sortable_columns[ 'team_member_last_name' ] = 'team_member_last_name';
	 	return $sortable_columns;
	}
}