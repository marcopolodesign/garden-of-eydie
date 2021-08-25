<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Garden_Of_Eydie
 */

get_header();
?>

<main id="main" data-barba="container" data-barba-namespace="archive" class="category" bg-color="white">


	<?php 
if (has_category('recipe')):
		get_template_part('template-parts/recipes-archive');
	else :
		get_template_part('template-parts/regular-archive');
	endif;
	?>


	</main><!-- #main -->

<?php
get_footer();
