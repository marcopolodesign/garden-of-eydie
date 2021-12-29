<?php 
  /* Template Name: Contact  */
get_header();
?>
<main id="main" class="contact" data-barba="container"  data-barba-namespace="contact mt0">
  <section class="flex row-reverse column-mobile container flex-wrap items-center contact-container bg-main-light">
          <div class="w-40 center m-auto log-in-container ph3 pt5">
              <!-- <h1 class="main-color"><?php the_title();?></h1> -->
              <div class="m-auto">
                <?php while ( have_posts() ) :the_post();
                the_content(); 
                endwhile;?>
              </div>
          </div>

          <div class="w-50 min-h-100-vh relative">
            <div class="absolute-cover" style="background-image: url(<?php the_post_thumbnail_url(26, 'full' ); ?>)">
            </div>
          </div>
        </section>

       <section class="mv6 pv5 bg-color-orange container">
        <h1 class="black tc mb4">We've might have already answered your question! Read our FAQ.</h1>
        <div class="featured-faq-container flex column-mobile justify-between items-start">
          <?php if( have_rows('main_faq',65) ): while ( have_rows('main_faq',65) ) : the_row(); 
          $mainColor = '#000';
          ?>
            <div class="featured-faq tc ph4 pv5">
              <h2 class="main-font f2 mb2"><?php the_sub_field('question');?></h2>
              <?php the_sub_field('answer');?>
            </div>

          <?php endwhile; endif; ?>
          </div>
          <a href="/faq" class="f2 main-font has-after anchor center" style="display: block; margin-top: 20px;">READ ALL</a>
        </div>
       </section>

    <style>
    .featured-faq {
      border: 1px solid <?php echo $mainColor;?>;
    }

    .featured-faq * {
      color:<?php echo $mainColor;?>
    }
  </style>

</main><!-- #main -->

<?php
get_footer();
