<?php
//about theme info
add_action( 'admin_menu', 'wedding_hall_gettingstarted' );
function wedding_hall_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'wedding-hall'), esc_html__('About Theme', 'wedding-hall'),'edit_theme_options', 'wedding_hall_guide', 'wedding_hall_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function wedding_hall_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'wedding_hall_admin_theme_style');

//guidline for about theme
function wedding_hall_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'wedding-hall' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Wedding Hall WordPress Theme', 'wedding-hall' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'wedding-hall' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'wedding-hall' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'wedding-hall' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'wedding-hall' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'wedding-hall' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'wedding-hall' ); ?> <a href="<?php echo esc_url( wedding_hall_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'wedding-hall' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'Wedding Hall is a responsive and beautifully crafted WP theme for party halls, wedding and banquet halls, and marriage venues. With a rich and sophisticated layout, you can portray a professional display of your beautiful marriage hall. It is responsive and thanks to that, you can find a wonderful display of all your business details on every screen. Minimal design is always going to focus and highlight the key content without allowing the attention of your audience to drift away from it. You can use this theme for free and utilize its user-friendly interface for crafting a finished website without having to bother about the technical aspects such as the coding stuff related to the theme. Social media options have been wonderfully utilized in this theme’s design to share pictures and blogs on various social media platforms to gain more popularity. A Bootstrap-based design allows you to easily customize thanks to the personalization options. There are SEO-friendly and optimized codes delivering a faster page load time. These are also secure and clean codes to allow the smooth functioning of your website. An incredible banner, team and other sections displayed, there is also a provision made for translation-ready making content available into Spanish, Chinese, Japanese, Russian, and many other languages.', 'wedding-hall')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Wedding Hall Theme', 'wedding-hall' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'wedding-hall'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( WEDDING_HALL_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'wedding-hall'); ?></a>
			<a href="<?php echo esc_url( WEDDING_HALL_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'wedding-hall'); ?></a>
			<a href="<?php echo esc_url( WEDDING_HALL_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'wedding-hall'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/wedding-hall.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'wedding-hall'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'wedding-hall'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'wedding-hall'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'wedding-hall'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'wedding-hall'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'wedding-hall'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'wedding-hall'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'wedding-hall'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'wedding-hall'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'wedding-hall'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'wedding-hall'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'wedding-hall'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'wedding-hall'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>