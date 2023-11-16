<?php
/**
 * Doly Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Doly Blog
 */

if ( ! defined( 'DOLY_BLOG_VERSION' ) ) {
	$doly_blog_theme = wp_get_theme();
	define( 'DOLY_BLOG_VERSION', $doly_blog_theme->get( 'Version' ) );
}

/**
 * Enqueue scripts and styles.
 */
function doly_blog_scripts() {
    wp_enqueue_style( 'doly-blog-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','doly-default-block','doly-style'), '', 'all');
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all');
    wp_enqueue_style( 'doly-blog-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), DOLY_BLOG_VERSION, 'all');
    wp_enqueue_script( 'doly-blog-main-js', get_stylesheet_directory_uri() . '/assets/js/doly-blog-main.js',array('jquery','doly-script'), DOLY_BLOG_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'doly_blog_scripts' );