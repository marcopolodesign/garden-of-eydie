<section class="container mt6">
  <h1 class="ttu measure-wide tc f0 mb5">Congrats on scrolling all this way! Here's other pages to visit.</h1>
  <div class="flex column-mobile justify-center items-stretch comm-footer">
  <?php
    $lifestylePosts = array(
        'post_type' => 'page',
        'posts_per_page' => 3,
        'order'=> 'DESC',
        'post_parent' => '110',
        'post__not_in' => array( $post->ID ),
    );
    $post_query = new WP_Query($lifestylePosts);
    if($post_query->have_posts() ) : while($post_query->have_posts() ) :
    $post_query->the_post(); 
    
      $icon = get_field('footer_icon');
      if (!$icon) : $icon = '/wp-content/uploads/2021/07/Group.svg'; endif;
      
      $title = get_field('footer_title');
      if (!$title) : $title = get_the_title(); endif;
      
      $description = get_field('footer_text');
      if (!$description) : $description = "Discover more about Garden of Eydie in this section" ; endif;
      ?>

      <a href=<?php the_permalink(); ?> class="no-deco black mt3 flex flex-column justify-center mt5 pb5 mh4">
        <img src=<?php echo $icon;?>>
        <h1 class="f2 mv2 tc"><?php echo $title; ?> </h1>
        <div class="measure-wide center tc">
          <?php echo $description;?>
        </div>
        
      </a>
    <?php endwhile; 
      else :
        get_template_part( 'template-parts/content', 'none' );
    endif; wp_reset_postdata();
    ?>

    
  </div>
</section>


<style> 

  .comm-footer {
    border-top: 1px solid #000;
    border-bottom: 1px solid #000;
  }

  .comm-footer a {
    flex: 1 1 0;
    width: 0;
  }

  .comm-footer a:nth-child(2) {
    border-left: 1px solid #000;
    border-right: 1px solid #000;
    padding-left: 30px;
    padding-right: 30px;
  }

  .comm-footer > div {
    flex-grow: 1;
  }
  .comm-footer img {
    height: 100px !important;
    width: auto !important;  
  }

  .comm-footer p {
    line-height: 1.5;
  }

  @media (max-width: 580px) {
    .comm-footer a {
    flex: unset;
    width: initial;
    margin: 15px 0px;
  }

  .comm-footer a:nth-child(2) {
    border-left: 0px solid #000;
    border-right: 0px solid #000;
    padding-left: 0px;
    padding-right: 0px;
  }


  }

 
</style>
