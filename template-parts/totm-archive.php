<section class="totm-archives bg-main-color container pa5">
  <div class="flex jic totm-archive-header mb5">
    <h2 class="black ttu f2">Archives</h2>
    <div class="flex totm-years">
        <h2 class="black mr3 f3 has-after grey main-font pointer">2021</h2>
        <!-- <h2 class="black f3 has-after grey main-font pointer">2020</h2> -->
    </div>
  </div>

  <?php $postGrid = array(
          'post_type' => 'page',
          'meta_key' => '_wp_page_template',
          'meta_value' => 'totm.php',
          // 'meta_compare' => '',
      );

      $post_query = new WP_Query($postGrid);
      echo '<div class="flex flex-column">';
      if($post_query->have_posts() ) : while($post_query->have_posts() ) :
        $post_query->the_post(); ?>

        <a class="mb5 ttu flex flex-column black no-deco" href=<?php the_permalink();?>>
          <p class="grey main-font"><?php echo get_the_date("F Y");?></p>
          <h1 class="has-after main-font f0 mt1"><?php the_title();?></h1>
        </a>

      <?php endwhile; endif;
      echo '</div>';
  ?>
</section>
