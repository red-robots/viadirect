<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php $ga = get_field("google_analytics","option");
if($ga):
	echo $ga;
endif;?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
		<div class="mobile">
			<?php wp_nav_menu( array( 'theme_location' => 'mobile') ); ?>
		</div><!--.mobile-->
		<div class="row-1">
			<?php wp_nav_menu( array( 'theme_location' => 'header') ); 
			//todo insert form?>
			<?php $request_demo_text = get_field("request_demo_text","option");
			$request_demo_link = get_field("request_demo_link","option");
			if($request_demo_link&&$request_demo_text):?>
				<div class="button">
					<a href="<?php echo $request_demo_link;?>">
						<?php echo $request_demo_text;?>
					</a>
				</div><!--.button-->
			<?php endif;?>
		</div><!-- row-1 -->
		<div class="row-2">
			<?php if(is_home()) { ?>
	            <h1 class="logo col-1">
	            <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
	            </h1>
	        <?php } else { ?>
	            <div class="logo col-1">
	            <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
	            </div>
	        <?php } ?>

			<nav id="site-navigation" class="main-navigation col-2" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'acstarter' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			
		</div><!-- row-2 -->
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper">
