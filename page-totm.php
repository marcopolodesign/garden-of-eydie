<?php get_header(); ?>

<main id="main" data-barba="container" data-barba-namespace="totm" class="totm no-mt" bg-color="white">

<section class="relative pb4">
    <?php get_template_part('template-parts/headers/title-center');?>
      <div class="absolute-cover z--1" style="background-image: url(<?php the_post_thumbnail_url();?>)"></div>
  </section>


  <?php 
    get_template_part('template-parts/reusable-content');
    get_template_part('template-parts/connect-footer');
  ?>



</main><!-- #main & End Barba Container-->

<?php get_footer();?>

