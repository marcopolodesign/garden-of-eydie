<?php get_header(); ?>

<main id="main" data-barba="container" data-barba-namespace="faq" class="faq no-mt" bg-color="white">

  <section class="relative pb4">
    <?php get_template_part('template-parts/headers/title-center');?>

    <div class="relative container pt3">
    <div class="featured-faq-container flex justify-between items-start">
      <?php if( have_rows('main_faq') ): while ( have_rows('main_faq') ) : the_row(); 
       $mainColor = get_field('main_color');
      ?>
        <div class="featured-faq tc ph4 pv5">
          <h2 class="main-font f2 mb2"><?php the_sub_field('question');?></h2>
          <?php the_sub_field('answer');?>
        </div>

      <?php endwhile; endif; ?>
      </div>
      <div class="flex mt3">
        <svg width="108" height="108" class="m-auto" viewBox="0 0 108 108" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="54" cy="54" r="54" fill="#FFD588"/>
          <path d="M64 62C60.3333 62.939 53 66.4537 53 73" stroke="black" stroke-width="2"/>
          <path d="M42 62C45.6667 62.939 53 66.4537 53 73" stroke="black" stroke-width="2"/>
          <path d="M53 73L53 36" stroke="black" stroke-width="2"/>
        </svg>
      </div>
    

    </div>
    <div class="absolute-cover z--1" style="background-image: url(<?php the_post_thumbnail_url();?>)"></div>
  </section>

  <section class="mv5 container">
      <div class="tc measure-wide center">
        <h2 class="f1 ttu">We're here to help</h2>
        <p>Read of complete collection of FAQ’s, and filter them by categories to make the searching easier. Can’t find your question? Send us an email</p>
      </div>

      <div class="faq-container flex relative justify-between items-start mt5">
        <?php get_template_part('template-parts/faq', get_post_type()); ?>
       </div>
  </section>

  <?php get_template_part('template-parts/connect-footer');?>
  
  
  <style>
    .featured-faq {
      border: 1px solid <?php echo $mainColor;?>;
    }

    .featured-faq * {
      color:<?php echo $mainColor;?>
    }
  </style>

</main><!-- #main & End Barba Container-->

<?php get_footer();?>
