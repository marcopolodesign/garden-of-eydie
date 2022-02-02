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
		<meta property="og:site_name" content="gardenofeydie.com" />

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>

	<script src="/includes/CustomEase.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header flex jic fixed top-0 left-0 w-100 pv3 ph5 bg-white no-print">
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
				<div class="absolute top-0 left-0 w-100 min-h-100-vh o-0 pointers-none sub-menu-bg"></div>
		</div>

		<a href="/">
			<?php get_template_part('template-parts/content/logo');?>
		</a>

		<div class="right-header flex jic">
			<div class="flex items-center search-trigger pointer">
				<p class="mr2">Search</p>
				<?php get_template_part('template-parts/content/search');?>
			</div>

		<div class="menu-trigger pointer flex flex-column">
			<span></span>
			<span></span>
			<span></span>
		</div>

			
			<div class="header-social flex items-center">
				<?php if( have_rows('header_social', 341) ): while( have_rows('header_social', 341) ): the_row(); 	
				$network = get_sub_field('icon');
				?>

				<a href=<?php the_sub_field('link');?> class="mh2 flex">
				<?php

					if ($network == "Pinterest"): 
						get_template_part('template-parts/content/pinterest');
					elseif ($network == "Twitter") :
						get_template_part('template-parts/content/twitter');
					elseif ($network == "Instagram") :
						get_template_part('template-parts/content/insta');
					elseif ($network == "Youtube") :
						get_template_part('template-parts/content/youtube');
					elseif ($network == "Facebook") : ?>
						<svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.39703 17.997V9.80105H9.16203L9.57303 6.59205H6.39703V4.54805C6.39703 3.62205 6.65503 2.98805 7.98403 2.98805H9.66803V0.127047C8.84867 0.0392382 8.02508 -0.00316009 7.20103 4.70959e-05C4.75703 4.70959e-05 3.07903 1.49205 3.07903 4.23105V6.58605H0.332031V9.79505H3.08503V17.997H6.39703Z" fill="black"/>
</svg>

		<?php 			else : endif;?>
				</a>

				<?php endwhile; endif;?>

			</div>
		</div>
	</header><!-- #masthead -->


	<?php 
	get_template_part('template-parts/menu'); 
get_template_part('template-parts/search');
	?>


	<!-- <div class="cursor desktop"></div> -->
	<div class="pre-load bg-main-color"></div>
	<div class="pre-load bg-white"></div>

	<div data-barba="wrapper">

