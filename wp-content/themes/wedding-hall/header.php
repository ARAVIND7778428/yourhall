<?php
/**
 * The header for our theme
 *
 * @subpackage Wedding Hall
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'wedding-hall' ); ?></a>

<div id="header">
	<div class="top-header py-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4 align-self-center">
					<div class="logo text-md-left text-center">
						<?php if ( has_custom_logo() ) : ?>
		            		<?php the_custom_logo(); ?>
			            <?php endif; ?>
		             	<?php if (get_theme_mod('wedding_hall_show_site_title',true)) {?>
		          			<?php $blog_info = get_bloginfo( 'name' ); ?>
			                <?php if ( ! empty( $blog_info ) ) : ?>
			                  	<?php if ( is_front_page() && is_home() ) : ?>
			                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			                  	<?php else : ?>
		                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		                  		<?php endif; ?>
			                <?php endif; ?>
			            <?php }?>
			            <?php if (get_theme_mod('wedding_hall_show_tagline',true)) {?>
			                <?php $description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) : ?>
			                  	<p class="site-description"><?php echo esc_html($description); ?></p>
		              		<?php endif; ?>
		          		<?php }?>
					</div>
				</div>
				<div class="offset-lg-3 col-lg-6 col-md-8 align-self-center text-md-right text-center mb-md-0 mb-3">
					<?php if(get_theme_mod('wedding_hall_email') != '') {?>
						<a href="mailto:<?php echo esc_attr(get_theme_mod('wedding_hall_email')) ?>" class="mail mr-md-3"><i class="fas fa-envelope mr-2"></i><?php echo esc_html(get_theme_mod('wedding_hall_email')) ?></a>
					<?php }?>
					<?php if(get_theme_mod('wedding_hall_phoneno') != '') {?>
						<a href="tel:<?php echo esc_attr(get_theme_mod('wedding_hall_phoneno')); ?>" class="phone"><i class="fas fa-phone mr-2"></i><?php echo esc_html(get_theme_mod('wedding_hall_phoneno')); ?></a>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="menu-section">
			<div class="row mx-md-0">
				<div class="col-lg-10 col-md-9 col-3 align-self-center">
					<div class="menu-bar">
						<div class="toggle-menu responsive-menu">
							<?php if(has_nav_menu('primary')){ ?>
				            	<button onclick="wedding_hall_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','wedding-hall'); ?></span></button>
				            <?php }?>
				        </div>
						<div id="sidelong-menu" class="nav sidenav">
			                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'wedding-hall' ); ?>">
			                  	<?php if(has_nav_menu('primary')){
				                    wp_nav_menu( array( 
										'theme_location' => 'primary',
										'container_class' => 'main-menu-navigation clearfix' ,
										'menu_class' => 'clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
				                    ) ); 
			                  	} ?>
			                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="wedding_hall_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','wedding-hall'); ?></span></a>
			                </nav>
			            </div>
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-9 align-self-center">
					<div class="social-icons text-right">
						<?php if(get_theme_mod('wedding_hall_facebook_url','')){ ?>
							<a href="<?php echo esc_url(get_theme_mod('wedding_hall_facebook_url','')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'wedding-hall'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('wedding_hall_twitter_url','')){ ?>
							<a href="<?php echo esc_url(get_theme_mod('wedding_hall_twitter_url','')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'wedding-hall'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('wedding_hall_youtube_url','')){ ?>
							<a href="<?php echo esc_url(get_theme_mod('wedding_hall_youtube_url','')); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php echo esc_html('Youtube', 'wedding-hall'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('wedding_hall_instagram_url','')){ ?>
							<a href="<?php echo esc_url(get_theme_mod('wedding_hall_instagram_url','')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'wedding-hall'); ?></span></a>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="header-overlay"></div>
	    <div class="header-content">
		    <div class="container"> 
		      	<h1><?php single_post_title(); ?></h1>
		      	<div class="theme-breadcrumb mt-4">
					<?php wedding_hall_breadcrumb();?>
				</div>
		    </div>
		</div>
	</div>
<?php } ?>