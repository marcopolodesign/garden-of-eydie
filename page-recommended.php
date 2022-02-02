<?php 
get_header();?>

<main id="main" data-barba="container" data-barba-namespace="recommended" class="recommended goe-mt" bg-color="white">

  <section class="flex column-mobile mt0 items-start">
    <div class="w-40-ns sticky goe-sticky min-h-100 bg-main-color pv5">
      <h1 class="white tc ttu mt5 f1 ph5">Recommended Articles</h1>
      <p class="white tc measure center mt2">We’re constantly reading things to enrich our own journey towards a better, healthier life. Each week, we narrow down the ones we like the most.</p>

      <!-- <div class="mt5">
        <p class="white tc">Previous Editions:</p>
      </div> -->
    </div>

    <div class="recommended-content ph5 pv4 w-60-ns">
      <h1 class="f0 ttu pr5 lh1">What we're reading now</h1>


      <?php $reccommended = array(
          'post_type' => 'post',
          'cat' => 23,
          'post_per_page' => '1',
      );
      $post_query = new WP_Query($reccommended);
      if($post_query->have_posts() ) : while($post_query->have_posts() ) :
        $post_query->the_post(); ?>

        

        <div class="recommended-header mt5 flex jic">
          <div class="recommended-filters flex jic">
            <?php if( have_rows('categories') ): while ( have_rows('categories') ) : the_row(); ?>
           <h2 class="main-font pointer"><?php the_sub_field('category');?></h2>
            <?php endwhile; endif; ?>
          </div>
          <div class="verified-icon flex items-center overflow-hidden" style="opacity:0">
            <p class="f6 main-color mr2">Respected source!</p>
            <?php get_template_part('template-parts/content/verified');?>
          </div>
        </div>

        <?php if( have_rows('recommended_content') ): while ( have_rows('recommended_content') ) : the_row(); 
        
        
        if( get_row_layout() == 'category' ):  ?>  
            <h1 class="recommended-category bg-main-color white pa3 mt4">
              <?php the_sub_field('category');?>
            </h1>


        <?php elseif (get_row_layout() == 'recommended_sections'): ?>

          <div class="recommended-articles">
            <?php the_sub_field('recommended_section');  ?>
          </div>
        
        <?php elseif (get_row_layout() == 'own_article'): 

            $id = get_sub_field('own_article')[0];

            $postTitle = get_the_title($id);
            $image = get_the_post_thumbnail('full', $id); 
            
            echo $id[0];
            
            ?>

          <div class="recommended-own">
            <?php echo $postTitle;
                  echo $image;
            ?>
    
        <?php  
        endif; endwhile; endif; // end content post
      endwhile; endif; wp_reset_postdata(); // End query Loop
      ?>
    </div>
  </section>

</main><!-- #main & End Barba Container-->


<?php
get_footer();
