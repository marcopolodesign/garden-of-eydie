<?php 
get_header();?>

<main id="main" data-barba="container" data-barba-namespace="learn" class="learn" bg-color="white">

<section class="learn-kickoff pt4 container">
<h3 class='tc page-title-small ttu' style="color:<?php echo $mainColor;?>"><?php the_title();?></h3>

  <!-- <h1 class="f0 ttu tc">Learn by <span>Watching,</span> <span>Reading,</span> and <span>exploring</span></h1> -->
</section>

<?php  get_template_part('template-parts/reusable-content'); ?>

<section class="goe-articles container bg-main-color flex pa6">
  <div class="m-auto w-60-ns flex flex-column justify-center">
    <h1 class="white tc ttu f0">Recommended articles we're reading</h1>
    <p class="mt3 white tc">We’re constantly reading things to enrich our own journey towards a better, healthier life. Each week, we narrow down the ones we like the most.</p>
    <a href="/learn/recommended/" class="mt4 f2 white has-after ttu tc no-deco center main-font">Read Now</a>
  </div>
</section>




</main><!-- #main & End Barba Container-->


<?php
get_footer();
