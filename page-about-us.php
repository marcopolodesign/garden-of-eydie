<?php get_header(); ?>

<main id="main" data-barba="container" data-barba-namespace="faq" class="faq no-mt" bg-color="white">

<section class="relative pv4">
  <?php get_template_part('template-parts/headers/animated-header');?>

  <?php $hasImage = get_the_post_thumbnail_url(get_the_ID(), 'full');

  if ($hasImage) : ?>
    <div class="absolute-cover z--1" style="background-image: url(<?php the_post_thumbnail_url();?>)"></div>
  <?php endif; ?>
</section>

<div class="newsletter-container w-60-ns center overlap-top form-w-100">
  <?php get_template_part('template-parts/subscribe'); ?>
</div>



<?php get_template_part('template-parts/about-content');

get_template_part('template-parts/connect-footer');?>



</main><!-- #main & End Barba Container-->

<?php get_footer();?>

