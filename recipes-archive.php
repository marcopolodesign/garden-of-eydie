<?php 
/** Template Name: TOTM */
get_header();
?>

<main id="main" data-barba="container" data-barba-namespace="recipes-archive" class="recipes-archive no-mt" bg-color="white">

<h1 class="tc lsf-dark-pink ttu mt4 pt2">All Recipes</h1>
		
    <div class="archive-post-container container mt2 mb5 flex justify-center flex-wrap">
    <?php
        $qobj = get_queried_object();
        $category = get_category( get_query_var( 'cat' ) );
        $cat_id = $category->cat_ID;

        if ( get_query_var('paged') ) {

          $paged = get_query_var('paged');
          
          } elseif ( get_query_var('page') ) {
          
          $paged = get_query_var('page');
          
          } else {
          
            $paged = 1;
          }

          $argArchive = array(
              'post_type' => 'post',
              'posts_per_page' => 15,
              'cat' => 11,
              'order'=> 'DESC',
              'paged'=> $paged,              
          );

          $post_query = new WP_Query($argArchive);
          if($post_query->have_posts() ) { while($post_query->have_posts() ) {
          $post_query->the_post(); 
      ?>

      <div class="home-blog relative w-30-ns ma3">
        <div class="home-blog-img relative overflow-hidden">
          <?php  get_template_part( 'template-parts/thumbnail-bg', get_post_type() ); ?>

          <a href="<?php the_permalink();?>" class="home-blog-overlay lsf-light-pink-bg absolute-cover flex no-deco">
            <h2 class="ttu tc m-auto fw7 lsf-dark-pink">Read Now</h2>
          </a>
        </div>

        <div class="home-blog-title">
          <h3 class="lsf-dark-pink f5 fw3 tc mt3"><?php the_title();?></h3>
        </div>
        
      
      </div>
      
      <?php wp_reset_postdata(); }the_posts_pagination(array( 'mid_size' => 3, 'next_text'=> __('Next Page'), ));} 

       ?>
    
    </div>


</main><!-- #main & End Barba Container-->

<?php get_footer();?>
