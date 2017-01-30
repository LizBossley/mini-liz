<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MiniLiz
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mini-liz' ); ?></a>
	
  		<nav class="mobile-nav">
			<button id="hideLeft" class="close">X</button>
			<?php wp_nav_menu( array( 'theme_location' => 'main', 'menu_id' => 'main-menu', 'menu_class' => 'main-nav' ) ); ?>
		</nav>

<div data-sticky-container>
	<header id="masthead" class="site-header sticky" role="banner" data-sticky>
		<div class="row header-row">
			<div class="mobile-top">
				<div class="row">
					<div class="small-6 medium-3 columns">
						<button id="showLeft" class="secondary hollow button">MENU</button>
					</div>
					<div class="medium-6 show-for-medium-only columns logo-mobile">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		            <img class="logo" src="https://placeholdit.imgix.net/~text?&w=150&h=90">  
		        </a>
					</div>
					<div class="small-12 show-for-small-only columns logo-mobile">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		            <img class="logo" src="https://placeholdit.imgix.net/~text?&w=150&h=90">  
		        </a>
					</div>
				</div>
			</div>
			<div class="large-12 medium-12 small-12 columns navigation">
			<div class="row collapse">
				<div class="site-branding header-logo small-2 columns">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		              <img class="logo" src="https://placeholdit.imgix.net/~text?&w=150&h=90">  
			        </a>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation small-10 columns" role="navigation">
					<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'mini-liz' ); ?></button> -->
					<div class="row">
						<div class="small-12 columns main-nav-flex flexbox-container">
							<?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_id' => 'main-menu', 'menu_class' => 'main-nav' ) ); ?>
						</div>
					</div>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->
</div>
