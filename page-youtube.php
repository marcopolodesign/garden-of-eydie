<?php /* Template Name: Videos  */?>


<?php get_header();?>
<main id="main" data-barba="container" data-barba-namespace="youtube" class="youtube" bg-color="white">

      <section class="relative pb4">
         <?php get_template_part('template-parts/headers/title-center');?>

         <div class="absolute-cover z--1" style="background-image: url(<?php the_post_thumbnail_url();?>)"></div>

      </section>

      <section class="w-80-ns container-xs featured-video-5-container pv5 center">
      <div class="featured-template-5-video">
          <div class="new-home-video w-100 h-100 flex">
            <iframe width="100%" src="<?php the_field('featured_video');?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </section>

      <section class="mv5 mb6 flex justify-center flex-wrap container-xs template-5-videos">
          <h1 class="lsf-dark-pink center tc w-80 mv4"><?php the_field('videos_copy');?></h1>
          
          <?php
           if( have_rows('videos') ): while ( have_rows('videos') ) : the_row();

              if (get_sub_field('video_link')) : ?>
            <div class="w-third-ns ma3">
              <div class="new-home-video w-100 h-100 lsf-dark-pink-bg flex">
                <iframe width="100%" src="<?php the_sub_field('video_link'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>


       
              <?php endif; endwhile; endif;  wp_reset_postdata(); ?>
        </div>

      <a href="http://youtube.com/lovesweatfitness" target="_blank" class="tc center ttu lsf-pink fw7 f2 db relative"><?php the_field('follow_us_text');?></a>

      </section>
</main><!-- #main & End Barba Container-->


<?php
get_footer();
