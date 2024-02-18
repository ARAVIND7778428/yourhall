<?php 

	$wedding_hall_custom_style = '';

	// Logo Size
	$wedding_hall_logo_top_margin = get_theme_mod('wedding_hall_logo_top_margin');
	$wedding_hall_logo_bottom_margin = get_theme_mod('wedding_hall_logo_bottom_margin');
	$wedding_hall_logo_left_margin = get_theme_mod('wedding_hall_logo_left_margin');
	$wedding_hall_logo_right_margin = get_theme_mod('wedding_hall_logo_right_margin');

	if( $wedding_hall_logo_top_margin != '' || $wedding_hall_logo_bottom_margin != '' || $wedding_hall_logo_left_margin != '' || $wedding_hall_logo_right_margin != ''){
		$wedding_hall_custom_style .=' .logo {';
			$wedding_hall_custom_style .=' margin-top: '.esc_attr($wedding_hall_logo_top_margin).'px; margin-bottom: '.esc_attr($wedding_hall_logo_bottom_margin).'px; margin-left: '.esc_attr($wedding_hall_logo_left_margin).'px; margin-right: '.esc_attr($wedding_hall_logo_right_margin).'px;';
		$wedding_hall_custom_style .=' }';
	}

	// Site Title Font Size
	$wedding_hall_site_title_font_size = get_theme_mod('wedding_hall_site_title_font_size');
	if( $wedding_hall_site_title_font_size != ''){
		$wedding_hall_custom_style .=' .logo h1.site-title, .logo p.site-title {';
			$wedding_hall_custom_style .=' font-size: '.esc_attr($wedding_hall_site_title_font_size).'px;';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_site_title_color = get_theme_mod('wedding_hall_site_title_color');
	if( $wedding_hall_site_title_color != ''){
		$wedding_hall_custom_style .=' .logo h1.site-title, .logo p.site-title {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_site_title_color).';';
		$wedding_hall_custom_style .=' }';
	}

	// Site Title Font Size
	$wedding_hall_site_tagline_font_size = get_theme_mod('wedding_hall_site_tagline_font_size');
	if( $wedding_hall_site_tagline_font_size != ''){
		$wedding_hall_custom_style .=' .logo p.site-description {';
			$wedding_hall_custom_style .=' font-size: '.esc_attr($wedding_hall_site_tagline_font_size).'px;';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_site_tagline_color = get_theme_mod('wedding_hall_site_tagline_color');
	if( $wedding_hall_site_tagline_color != ''){
		$wedding_hall_custom_style .=' .logo p.site-description {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_site_tagline_color).';';
		$wedding_hall_custom_style .=' }';
	}

	// Header Image
	$header_image_url = wedding_hall_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$wedding_hall_custom_style .=' #inner-pages-header {';
			$wedding_hall_custom_style .=' background-image: url('. esc_url( $header_image_url ).'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;';
		$wedding_hall_custom_style .=' }';
		$wedding_hall_custom_style .=' .header-overlay {';
			$wedding_hall_custom_style .=' position: absolute; width: 100%; height: 100%; 	top: 0; left: 0; background: #000; opacity: 0.3;';
		$wedding_hall_custom_style .=' }';
	} else {
		$wedding_hall_custom_style .=' #inner-pages-header {';
			$wedding_hall_custom_style .=' background: linear-gradient(0deg,#9a9797,#9a9797 80%) no-repeat; ';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_topicon_color = get_theme_mod('wedding_hall_topicon_color');
	if( $wedding_hall_topicon_color != ''){
		$wedding_hall_custom_style .=' .top-header a.mail i, .top-header a.phone i {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_topicon_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_toptext_color = get_theme_mod('wedding_hall_toptext_color');
	if( $wedding_hall_toptext_color != ''){
		$wedding_hall_custom_style .=' .top-header a.mail, .top-header a.phone {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_toptext_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_social_color = get_theme_mod('wedding_hall_social_color');
	if( $wedding_hall_social_color != ''){
		$wedding_hall_custom_style .=' .social-icons i {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_social_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_menu_color = get_theme_mod('wedding_hall_menu_color');
	if( $wedding_hall_menu_color != ''){
		$wedding_hall_custom_style .=' .nav-menu ul li a {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_menu_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_menuhvr_color = get_theme_mod('wedding_hall_menuhvr_color');
	if( $wedding_hall_menuhvr_color != ''){
		$wedding_hall_custom_style .=' .nav-menu ul li a:hover {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_menuhvr_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_menubg_color = get_theme_mod('wedding_hall_menubg_color');
	if( $wedding_hall_menubg_color != ''){
		$wedding_hall_custom_style .=' .menu-section {';
			$wedding_hall_custom_style .=' background-color: '.esc_attr($wedding_hall_menubg_color).';';
		$wedding_hall_custom_style .=' }';
	}

	//slider color
	$wedding_hall_slider_hide_show = get_theme_mod('wedding_hall_slider_hide_show',false);
	if( $wedding_hall_slider_hide_show == true){
		$wedding_hall_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$wedding_hall_custom_style .=' display:none;';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_slider_color = get_theme_mod('wedding_hall_slider_color');
	if( $wedding_hall_slider_color != ''){
		$wedding_hall_custom_style .=' #slider h2 a,#slider p,#slider a.read-btn {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_slider_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_slider_contentbg_color = get_theme_mod('wedding_hall_slider_contentbg_color');
	if( $wedding_hall_slider_contentbg_color != ''){
		$wedding_hall_custom_style .=' #slider .slider-bg {';
			$wedding_hall_custom_style .=' background: '.esc_attr($wedding_hall_slider_contentbg_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_slider_contentbdr_color = get_theme_mod('wedding_hall_slider_contentbdr_color');
	if( $wedding_hall_slider_contentbdr_color != ''){
		$wedding_hall_custom_style .=' #slider .carousel-caption {';
			$wedding_hall_custom_style .=' outline-color: '.esc_attr($wedding_hall_slider_contentbdr_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_sliderbtn_color = get_theme_mod('wedding_hall_sliderbtn_color');
	$wedding_hall_sliderbtnbg_color = get_theme_mod('wedding_hall_sliderbtnbg_color');
	if( $wedding_hall_sliderbtn_color != ''){
		$wedding_hall_custom_style .=' #slider a.read-btn {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_sliderbtn_color).'; background-color: '.esc_attr($wedding_hall_sliderbtnbg_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_sliderbtnhvr_color = get_theme_mod('wedding_hall_sliderbtnhvr_color');
	$wedding_hall_sliderbtnbghvr_color = get_theme_mod('wedding_hall_sliderbtnbghvr_color');
	if( $wedding_hall_sliderbtnhvr_color != ''){
		$wedding_hall_custom_style .=' #slider a.read-btn:hover, #slider a.read-btn:before {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_sliderbtnhvr_color).'; background-color: '.esc_attr($wedding_hall_sliderbtnbghvr_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_slider_np_color = get_theme_mod('wedding_hall_slider_np_color');
	if( $wedding_hall_slider_np_color != ''){
		$wedding_hall_custom_style .=' #slider .carousel-control-prev-icon i, #slider .carousel-control-next-icon i {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_slider_np_color).'; border-color: '.esc_attr($wedding_hall_slider_np_color).';';
		$wedding_hall_custom_style .=' }';
	}

	//moment color
	$wedding_hall_moment_section_title_color = get_theme_mod('wedding_hall_moment_section_title_color');
	if( $wedding_hall_moment_section_title_color != ''){
		$wedding_hall_custom_style .=' .moments-head h3{';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_moment_section_title_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_moment_section_text_color = get_theme_mod('wedding_hall_moment_section_text_color');
	if( $wedding_hall_moment_section_text_color != ''){
		$wedding_hall_custom_style .=' .moments-head p {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_moment_section_text_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_momentbdr_color = get_theme_mod('wedding_hall_momentbdr_color');
	if( $wedding_hall_momentbdr_color != ''){
		$wedding_hall_custom_style .=' .moments-box:before {';
			$wedding_hall_custom_style .=' border-color: '.esc_attr($wedding_hall_momentbdr_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_momenttitle_color = get_theme_mod('wedding_hall_momenttitle_color');
	if( $wedding_hall_momenttitle_color != ''){
		$wedding_hall_custom_style .=' .moments-content h4 a {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_momenttitle_color).';';
		$wedding_hall_custom_style .=' }';
	}

	// Copyright padding
	$wedding_hall_copyright_padding = get_theme_mod('wedding_hall_copyright_padding');
	if( $wedding_hall_copyright_padding != ''){
		$wedding_hall_custom_style .=' .site-info {';
			$wedding_hall_custom_style .=' padding-top: '.esc_attr($wedding_hall_copyright_padding).'px; padding-bottom: '.esc_attr($wedding_hall_copyright_padding).'px;';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_copyright_color = get_theme_mod('wedding_hall_copyright_color');
	if( $wedding_hall_copyright_color != ''){
		$wedding_hall_custom_style .=' .site-info p, .site-info a {';
			$wedding_hall_custom_style .=' color: '.esc_attr($wedding_hall_copyright_color).';';
		$wedding_hall_custom_style .=' }';
	}

	$wedding_hall_copyrightbg_color = get_theme_mod('wedding_hall_copyrightbg_color');
	if( $wedding_hall_copyrightbg_color != ''){
		$wedding_hall_custom_style .=' .copyright {';
			$wedding_hall_custom_style .=' background-color: '.esc_attr($wedding_hall_copyrightbg_color).';';
		$wedding_hall_custom_style .=' }';
	}