<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Garden_Of_Eydie
 */

get_header();
?>

<main id="main" data-barba="container" data-barba-namespace="recipe" class="recipe" bg-color="white">

		<?php
		while ( have_posts() ) :
			the_post(); ?>



  <?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();


