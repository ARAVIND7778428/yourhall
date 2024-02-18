<?php
/**
 * Custom header implementation
 */

function wedding_hall_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'wedding_hall_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1200,
		'height'             => 85,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'wedding_hall_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'wedding_hall_custom_header_setup' );

if ( ! function_exists( 'wedding_hall_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see wedding_hall_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'wedding_hall_header_style' );
function wedding_hall_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .menu-section {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'wedding-hall-basic-style', $custom_css );
	endif;
}
endif; // wedding_hall_header_style