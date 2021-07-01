<?php
/**
 * Template part for displaying featured posts in archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Garden_Of_Eydie
 */

?>


<div class="relative featured-cat-cover">
  <?php get_template_part('template-parts/thumbnail-bg');?>

  <a href=<?php the_permalink();?> class="featured-cat-content ph5 pv4 absolute  z-3 w-50-ns center center bottom-0 no-deco" style="background-color: <?php the_field('bg_color');?>">
    <h1 class="ttu f1 tc black no-deco"><?php the_title();?></h1>
    <p class="mt2 tc black no-deco"><?php echo wp_trim_words( get_the_content(), 21 , '...' ); ?></p>
  </a>


</div>



