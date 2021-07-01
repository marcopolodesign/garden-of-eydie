<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Garden_Of_Eydie
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-container'); ?>>
	<div class="relative post-img">
		<?php get_template_part('template-parts/thumbnail-bg');?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
