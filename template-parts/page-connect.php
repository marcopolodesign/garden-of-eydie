<?php 
/* Template Name: Connect */
get_header(); 
$mainColor = get_field('main_color');
$moreSpacing = get_field('mt_true');
?>

<main id="main" data-barba="container" data-barba-namespace="connect" class="connect" bg-color="white">

<section class="flex jic column-mobile connect-container container">
  <div class="w-50-ns connect-img relative pa5 mt4">
      <div class="absolute-cover" style="background-image: url(<?php the_post_thumbnail_url('full');?>)"></div>
  </div>

  <div class="w-50-ns mt4">
    <?php 
      if ( have_posts() ) : while ( have_posts() ) :
				the_post(); the_content(); 
      endwhile; endif;  ?>
  </div>
</section>

</main><!-- #main & End Barba Container-->

<?php get_footer();?>

