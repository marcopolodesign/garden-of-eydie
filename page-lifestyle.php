<?php get_header(); ?>

<main id="main" data-barba="container" data-barba-namespace="lifestyle" class="home" bg-color="white">

<div class="lifestyle-cover min-h-100 flex relative">
  <div class="flex flex-wrap items-center justify-center m-auto">

    <?php $lifestyle = array('child_of' => 2);
 
    $categories = get_categories($lifestyle); 
    foreach($categories as $category) : 

      $catID = $category -> term_id;
      $image = get_field('category_image', $category);
    
    ?>
        <a href="<?php get_category_link( $catID ); ?>" class="lifestyle-cat relative ma4" cat-name="<?php echo $category->name;?>" >
          <div class="absolute-cover" style="background-image: url(<?php echo $image;?>"></div>
        </a>
      <?php endforeach; ?>
  </div>
  <h1 class="black absolute-center z--1 tc ttu pointers-none">Lifestyle</h1>
</div>


<div class="newsletter-container w-70-ns center">
  <?php get_template_part('template-parts/subscribe'); ?>
</div>


<section class="lifestyle-posts  mv6">

  <h1 class="ttu center tc mb4">LATEST LiFESTYLE POSTS</h1>
  <div class="container flex flex-wrap jic w-100">
  <?php
    $lifestylePosts = array(
        'post_type' => 'post',
        'posts_per_page' => 9,
        'cat'=> 2,
        'order'=> 'DESC',
    );
    $post_query = new WP_Query($lifestylePosts);
    if($post_query->have_posts() ) : while($post_query->have_posts() ) :
    $post_query->the_post(); 
    get_template_part( 'template-parts/post-query', get_post_type() );
  endwhile; 
  else :
    get_template_part( 'template-parts/content', 'none' );
endif; wp_reset_postdata();
?>
</div>


</section>


</main><!-- #main & End Barba Container-->

<?php get_footer();?>
