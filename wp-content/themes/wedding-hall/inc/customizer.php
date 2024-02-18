<?php
/**
 * Wedding Hall: Customizer
 *
 * @subpackage Wedding Hall
 * @since 1.0
 */

use WPTRT\Customize\Section\Wedding_Hall_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Wedding_Hall_Button::class );

	$manager->add_section(
		new Wedding_Hall_Button( $manager, 'wedding_hall_pro', [
			'title'      => __( 'Wedding Hall Pro', 'wedding-hall' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'wedding-hall' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/wedding-hall-wordpress-theme/', 'wedding-hall')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'wedding-hall-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'wedding-hall-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function wedding_hall_customize_register( $wp_customize ) {

	$wp_customize->add_setting('wedding_hall_logo_margin',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('wedding_hall_logo_margin',array(
		'label' => __('Logo Margin','wedding-hall'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('wedding_hall_logo_top_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'wedding_hall_sanitize_float'
	));
	$wp_customize->add_control('wedding_hall_logo_top_margin',array(
		'type' => 'number',
		'description' => __('Top','wedding-hall'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('wedding_hall_logo_bottom_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'wedding_hall_sanitize_float'
	));
	$wp_customize->add_control('wedding_hall_logo_bottom_margin',array(
		'type' => 'number',
		'description' => __('Bottom','wedding-hall'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('wedding_hall_logo_left_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'wedding_hall_sanitize_float'
	));
	$wp_customize->add_control('wedding_hall_logo_left_margin',array(
		'type' => 'number',
		'description' => __('Left','wedding-hall'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('wedding_hall_logo_right_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'wedding_hall_sanitize_float'
 	));
 	$wp_customize->add_control('wedding_hall_logo_right_margin',array(
		'type' => 'number',
		'description' => __('Right','wedding-hall'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('wedding_hall_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'wedding_hall_sanitize_checkbox'
	));
	$wp_customize->add_control('wedding_hall_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','wedding-hall'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('wedding_hall_site_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'wedding_hall_sanitize_float'
	));
	$wp_customize->add_control('wedding_hall_site_title_font_size',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','wedding-hall'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('wedding_hall_site_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_site_title_color', array(
		'label' => __('Title Color', 'wedding-hall'),
		'section' => 'title_tagline',
	)));

	$wp_customize->add_setting('wedding_hall_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'wedding_hall_sanitize_checkbox'
	));
	$wp_customize->add_control('wedding_hall_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','wedding-hall'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('wedding_hall_site_tagline_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'wedding_hall_sanitize_float'
	));
	$wp_customize->add_control('wedding_hall_site_tagline_font_size',array(
		'type' => 'number',
		'label' => __('Site Tagline Font Size','wedding-hall'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('wedding_hall_site_tagline_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_site_tagline_color', array(
		'label' => __('Tagline Color', 'wedding-hall'),
		'section' => 'title_tagline',
	)));

	$wp_customize->add_panel( 'wedding_hall_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'wedding-hall' ),
		'description' => __( 'Description of what this panel does.', 'wedding-hall' ),
	) );

	$wp_customize->add_section( 'wedding_hall_theme_options_section', array(
    	'title'      => __( 'General Settings', 'wedding-hall' ),
		'priority'   => 30,
		'panel' => 'wedding_hall_panel_id'
	) );

	$wp_customize->add_setting('wedding_hall_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'wedding_hall_sanitize_choices'
	));
	$wp_customize->add_control('wedding_hall_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','wedding-hall'),
		'section' => 'wedding_hall_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','wedding-hall'),
		   'Right Sidebar' => __('Right Sidebar','wedding-hall'),
		   'One Column' => __('One Column','wedding-hall'),
		   'Three Columns' => __('Three Columns','wedding-hall'),
		   'Grid Layout' => __('Grid Layout','wedding-hall')
		),
	));

	$wp_customize->add_setting('wedding_hall_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'wedding_hall_sanitize_choices'
	));
	$wp_customize->add_control('wedding_hall_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','wedding-hall'),
        'section' => 'wedding_hall_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','wedding-hall'),
            'Right Sidebar' => __('Right Sidebar','wedding-hall'),
            'One Column' => __('One Column','wedding-hall')
        ),
	));

	$wp_customize->add_setting('wedding_hall_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'wedding_hall_sanitize_choices'
	));
	$wp_customize->add_control('wedding_hall_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','wedding-hall'),
        'section' => 'wedding_hall_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','wedding-hall'),
            'Right Sidebar' => __('Right Sidebar','wedding-hall'),
            'One Column' => __('One Column','wedding-hall')
        ),
	));

	$wp_customize->add_setting('wedding_hall_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'wedding_hall_sanitize_choices'
	));
	$wp_customize->add_control('wedding_hall_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','wedding-hall'),
        'section' => 'wedding_hall_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','wedding-hall'),
            'Right Sidebar' => __('Right Sidebar','wedding-hall'),
            'One Column' => __('One Column','wedding-hall'),
		   	'Three Columns' => __('Three Columns','wedding-hall'),
            'Grid Layout' => __('Grid Layout','wedding-hall')
        ),
	));

	//Header
	$wp_customize->add_section( 'wedding_hall_header_section' , array(
    	'title'    => __( 'Header', 'wedding-hall' ),
		'priority' => null,
		'panel' => 'wedding_hall_panel_id'
	) );

	$wp_customize->add_setting('wedding_hall_email',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('wedding_hall_email',array(
	   	'type' => 'text',
	   	'label' => __('Add Email Address','wedding-hall'),
	   	'section' => 'wedding_hall_header_section',
	));

	$wp_customize->add_setting('wedding_hall_phone_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('wedding_hall_phone_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Text','wedding-hall'),
	   	'section' => 'wedding_hall_header_section',
	));

	$wp_customize->add_setting('wedding_hall_phoneno',array(
    	'default' => '',
    	'sanitize_callback'	=> 'wedding_hall_sanitize_phone_number'
	));
	$wp_customize->add_control('wedding_hall_phoneno',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','wedding-hall'),
	   	'section' => 'wedding_hall_header_section',
	));

	$wp_customize->add_setting('wedding_hall_facebook_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('wedding_hall_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','wedding-hall'),
	   	'section' => 'wedding_hall_header_section',
	));

	$wp_customize->add_setting('wedding_hall_twitter_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('wedding_hall_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','wedding-hall'),
	   	'section' => 'wedding_hall_header_section',
	));

	$wp_customize->add_setting('wedding_hall_youtube_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('wedding_hall_youtube_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Youtube URL','wedding-hall'),
	   	'section' => 'wedding_hall_header_section',
	));

	$wp_customize->add_setting('wedding_hall_instagram_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('wedding_hall_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','wedding-hall'),
	   	'section' => 'wedding_hall_header_section',
	));

	$wp_customize->add_setting('wedding_hall_topicon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_topicon_color', array(
		'label' => __('Email & Phone Icon Color', 'wedding-hall'),
		'section' => 'wedding_hall_header_section',
	)));

	$wp_customize->add_setting('wedding_hall_toptext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_toptext_color', array(
		'label' => __('Email & Phone Text Color', 'wedding-hall'),
		'section' => 'wedding_hall_header_section',
	)));

	$wp_customize->add_setting('wedding_hall_social_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_social_color', array(
		'label' => __('Social Icon Color', 'wedding-hall'),
		'section' => 'wedding_hall_header_section',
	)));

	$wp_customize->add_setting('wedding_hall_menu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_menu_color', array(
		'label' => __('Menu Color', 'wedding-hall'),
		'section' => 'wedding_hall_header_section',
	)));

	$wp_customize->add_setting('wedding_hall_menuhvr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_menuhvr_color', array(
		'label' => __('Menu Hover Color', 'wedding-hall'),
		'section' => 'wedding_hall_header_section',
	)));

	$wp_customize->add_setting('wedding_hall_menubg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_menubg_color', array(
		'label' => __('Menu Bg Color', 'wedding-hall'),
		'section' => 'wedding_hall_header_section',
	)));


	//home page slider
	$wp_customize->add_section( 'wedding_hall_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'wedding-hall' ),
		'priority' => null,
		'panel' => 'wedding_hall_panel_id'
	) );

	$wp_customize->add_setting('wedding_hall_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'wedding_hall_sanitize_checkbox'
	));
	$wp_customize->add_control('wedding_hall_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','wedding-hall'),
	   	'section' => 'wedding_hall_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'wedding_hall_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'wedding_hall_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'wedding_hall_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'wedding-hall' ),
			'section' => 'wedding_hall_slider_section',
			'type' => 'dropdown-pages'
		));
	}
	$wp_customize->add_setting('wedding_hall_slider_color', array(
		'default' => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_slider_color', array(
		'label' => __('Text Color', 'wedding-hall'),
		'section' => 'wedding_hall_slider_section',
	)));

	$wp_customize->add_setting('wedding_hall_slider_contentbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_slider_contentbg_color', array(
		'label' => __('Slider Content Bg Color', 'wedding-hall'),
		'section' => 'wedding_hall_slider_section',
	)));

	$wp_customize->add_setting('wedding_hall_slider_contentbdr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_slider_contentbdr_color', array(
		'label' => __('Slider Content Border Color', 'wedding-hall'),
		'section' => 'wedding_hall_slider_section',
	)));

	$wp_customize->add_setting('wedding_hall_sliderbtn_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_sliderbtn_color', array(
		'label' => __('Button Text Color', 'wedding-hall'),
		'section' => 'wedding_hall_slider_section',
	)));

	$wp_customize->add_setting('wedding_hall_sliderbtnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_sliderbtnbg_color', array(
		'label' => __('Button Bg Color', 'wedding-hall'),
		'section' => 'wedding_hall_slider_section',
	)));

	$wp_customize->add_setting('wedding_hall_sliderbtnhvr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_sliderbtnhvr_color', array(
		'label' => __('Button Hover Text Color', 'wedding-hall'),
		'section' => 'wedding_hall_slider_section',
	)));

	$wp_customize->add_setting('wedding_hall_sliderbtnbghvr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_sliderbtnbghvr_color', array(
		'label' => __('Button Hover Bg Color', 'wedding-hall'),
		'section' => 'wedding_hall_slider_section',
	)));

	$wp_customize->add_setting('wedding_hall_slider_np_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_slider_np_color', array(
		'label' => __('Pre/Next Button Color', 'wedding-hall'),
		'section' => 'wedding_hall_slider_section',
	)));

	//Moments Section
	$wp_customize->add_section('wedding_hall_moments_section',array(
		'title'	=> __('Moments Section','wedding-hall'),
		'description'=> __('Note : This section will appear below the slider.','wedding-hall'),
		'panel' => 'wedding_hall_panel_id',
	));

    $wp_customize->add_setting('wedding_hall_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('wedding_hall_section_title',array(
		'label'	=> __('Section Title','wedding-hall'),
		'section' => 'wedding_hall_moments_section',
		'type' => 'text'
	));

	$wp_customize->add_setting('wedding_hall_moment_section_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_moment_section_title_color', array(
		'label' => __('Color', 'wedding-hall'),
		'section' => 'wedding_hall_moments_section',
	)));

    $wp_customize->add_setting('wedding_hall_section_text',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('wedding_hall_section_text',array(
		'label'	=> __('Section Text','wedding-hall'),
		'section' => 'wedding_hall_moments_section',
		'type' => 'text'
	));

	$wp_customize->add_setting('wedding_hall_moment_section_text_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_moment_section_text_color', array(
		'label' => __('Color', 'wedding-hall'),
		'section' => 'wedding_hall_moments_section',
	)));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('wedding_hall_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'wedding_hall_sanitize_choices',
	));
	$wp_customize->add_control('wedding_hall_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category To Display Post','wedding-hall'),
		'section' => 'wedding_hall_moments_section',
	));

	$wp_customize->add_setting('wedding_hall_momentbdr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_momentbdr_color', array(
		'label' => __('Border Color', 'wedding-hall'),
		'section' => 'wedding_hall_moments_section',
	)));

	$wp_customize->add_setting('wedding_hall_momenttitle_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_momenttitle_color', array(
		'label' => __('Title Color', 'wedding-hall'),
		'section' => 'wedding_hall_moments_section',
	)));

	//Footer
    $wp_customize->add_section( 'wedding_hall_footer', array(
    	'title'  => __( 'Footer Setting', 'wedding-hall' ),
		'priority' => null,
		'panel' => 'wedding_hall_panel_id'
	) );

	$wp_customize->add_setting('wedding_hall_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'wedding_hall_sanitize_checkbox'
    ));
    $wp_customize->add_control('wedding_hall_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','wedding-hall'),
       'section' => 'wedding_hall_footer'
    ));

    $wp_customize->add_setting('wedding_hall_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('wedding_hall_footer_copy',array(
		'label'	=> __('Copyright Text','wedding-hall'),
		'section' => 'wedding_hall_footer',
		'setting' => 'wedding_hall_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting('wedding_hall_copyright_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'wedding_hall_sanitize_float'
 	));
 	$wp_customize->add_control('wedding_hall_copyright_padding',array(
		'type' => 'number',
		'label' => __('Copyright Top Bottom Padding','wedding-hall'),
		'section' => 'wedding_hall_footer',
	));

	$wp_customize->add_setting('wedding_hall_copyright_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_copyright_color', array(
		'label' => __('Copyright Text Color', 'wedding-hall'),
		'section' => 'wedding_hall_footer',
	)));

	$wp_customize->add_setting('wedding_hall_copyrightbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wedding_hall_copyrightbg_color', array(
		'label' => __('Copyright Bg Color', 'wedding-hall'),
		'section' => 'wedding_hall_footer',
	)));

	$wp_customize->register_section_type( Wedding_Hall_Button::class );

	$wp_customize->add_section(
		new Wedding_Hall_Button( $wp_customize, 'wedding_hall_pro_link', [
			'title'      => __( 'Wedding Hall Pro', 'wedding-hall' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'wedding-hall' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/wedding-hall-wordpress-theme/', 'wedding-hall'),
			'panel' => 'wedding_hall_panel_id'
		] )
	);

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'wedding_hall_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'wedding_hall_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'wedding_hall_customize_register' );

function wedding_hall_customize_partial_blogname() {
	bloginfo( 'name' );
}

function wedding_hall_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function wedding_hall_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function wedding_hall_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}