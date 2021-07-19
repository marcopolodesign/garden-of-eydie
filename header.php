<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Garden_Of_Eydie
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header flex jic fixed top-0 left-0 w-100 pv3 ph5 bg-white">
		<div class="left-header">
			<nav>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'header-left-menu',
						'container' => 'ul',
						'menu_class' => 'header-nav w-max ml-auto mr-0 flex jic list-none',
					) );
					?>
				</nav>
		</div>

		<a href="/">
			<?php get_template_part('template-parts/content/logo');?>
		</a>

		<div class="right-header flex jic">
			<div class="flex items-center">
				<p class="mr2">Search</p>
				<?php get_template_part('template-parts/content/search');?>
			</div>

			<p class="mh4">Menu</p>
			
			<div class="header-social flex items-center">
				<a href>
					<?php get_template_part('template-parts/content/pinterest');?>
				</a>
				<a class="mh3" href>
					<?php get_template_part('template-parts/content/youtube');?>
				</a>
				<a href>
					<?php get_template_part('template-parts/content/insta');?>
				</a>
			</div>
		</div>
	</header><!-- #masthead -->


	<div class="cursor desktop"></div>
	<div class="pre-load bg-main-color"></div>
	<div class="pre-load bg-white"></div>

	<div data-barba="wrapper">

