<?php 
get_header();?>

<main id="main" data-barba="container" data-barba-namespace="learn" class="learn" bg-color="white">

<section class="learn-kickoff pt4 container">
<h3 class='tc page-title-small ttu' style="color:<?php echo $mainColor;?>"><?php the_title();?></h3>

  <!-- <h1 class="f0 ttu tc">Learn by <span>Watching,</span> <span>Reading,</span> and <span>exploring</span></h1> -->
</section>

<?php get_template_part('template-parts/reusable-content'); ?>





</main><!-- #main & End Barba Container-->


<?php
get_footer();
