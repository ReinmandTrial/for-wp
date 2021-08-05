<?php

if ( ! function_exists( 'commerce_setup' ) ) :

	function commerce_setup() {

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'footer-menu'   => 'Footer menu with categories',
				'footer-menu-2' => 'Footer menu with information'
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support( 'woocommerce' );

		if( function_exists('acf_add_options_page') ) {
	
			acf_add_options_page(array(
				'page_title' 	=> 'Theme General Settings',
				'menu_title'	=> 'Theme Settings',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
		}

		add_image_size( 'product', 390, 390, false );
		add_image_size( 'additional_cat_header', 290, 155, true );

	}
endif;
add_action( 'after_setup_theme', 'commerce_setup' );


/**
 * Enqueue scripts and styles.
 */
function commerce_scripts() {
	// css
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.min.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'commerce-style', get_stylesheet_uri() );

	// js
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', ['jquery'], true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', ['jquery'], true );
	wp_enqueue_script( 'commerce-script', get_template_directory_uri() . '/assets/js/main.js', ['jquery', 'slick'], true );

	wp_localize_script( 'jquery', 'site_data', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'commerce_scripts' );


// Functions
require get_template_directory() . '/inc/functions/get_taxonomy_hierarchy.php';
require get_template_directory() . '/inc/functions/wp_get_menu_array.php';

// Ajax
require get_template_directory() . '/inc/ajax/product_request.php';
require get_template_directory() . '/inc/ajax/cart.php';

// Woocommerce
require get_template_directory() . '/woocommerce/includes/wc-filters.php';

