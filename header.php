<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>


<?php wp_head(); ?>
<?php 
$banner = get_field('banner');
if( is_singular( array('projects') ) ) {
	$parentId = get_page_id_by_template('page-projects');
	$banner = get_field('banner',$parentId);
}
$bodyClass = ($banner) ? 'hasbanner':'nobanner';
?>
</head>

<body <?php body_class($bodyClass); ?>>

<div id="page" class="site cf">
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper flexrow">
			<?php if( get_custom_logo() ) { ?>
	            <div class="logo">
	            	<?php the_custom_logo(); ?>
	            </div>
	        <?php } else { ?>
	            <h1 class="logo">
		            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </h1>
	        <?php } ?>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="sr"><?php esc_html_e( 'MENU', 'bellaworks' ); ?></span><span class="bar"></span></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container_class'=>'main-menu','link_before'=>'<span>','link_after'=>'</span>' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- wrapper -->
	</header><!-- #masthead -->

	<div id="waveSvg" style="display:none;"><svg class="wave" enable-background="new 0 0 89.67 9.21" version="1.1" viewBox="0 0 89.67 9.21" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path class="st0" d="m0.37 6.76s7.61-7.6 19.79-5.98c16.01 2.12 15.37 6.63 28.12 7.68 17 1.4 16.6-4.72 26.91-6.55 9.51-1.68 14.18 0.96 14.18 0.96"/>
	</svg></div>

	<?php get_template_part("template-parts/content","hero"); ?>

	<div id="content" class="site-content cf">
