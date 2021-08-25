<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Garden_Of_Eydie
 */

get_header();
?>

<main id="main" data-barba="container" data-barba-namespace="search" class="search" bg-color="white">

	<?php get_template_part('template-parts/recipes-archive'); ?>

</main><!-- #main -->

<?php
get_footer();
