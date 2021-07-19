<?php if( have_rows('reusable_content') ): while ( have_rows('reusable_content') ) : the_row(); 

if( get_row_layout() == 'grid' ):  ?>

<div class="flex column-mobile justify-center items-stretch comm-footer grid-container">

<?php while ( have_rows('grid_item') ) : the_row(); 
      $icon = get_sub_field('icon'); 
      if (!$icon) : $icon = '/wp-content/uploads/2021/07/Group.svg'; endif;
      
      $title = get_sub_field('title');
      if (!$title) : $title = get_the_title(); endif;
      
      $description = get_sub_field('text');
      if (!$description) : $description = "Discover more about Garden of Eydie in this section" ; endif;
      ?>

      <div href=<?php the_permalink(); ?> class="no-deco black flex flex-column justify-center pv5 mh3 ph4">
        <img src=<?php echo $icon;?>>
        <h1 class="f2 mv3 tc"><?php echo $title; ?> </h1>
        <div class="measure-wide center tc">
          <?php echo $description;?>
        </div>
        
      </div>

      <?php endwhile; ?>

      </div>



  <?php elseif (get_row_layout() == 'post_grid'): ?>
    <div class="container posts-content mv6">
        <h2 class="post-content-title pa3 f2 w-max mb4 tc center" style="background-color: <?php the_sub_field('title_background');?> ; color: <?php the_sub_field('title_color');?>"><?php the_sub_field('title');?></h2>
      <div class="flex flex-wrap post-grid-container">
        <?php 
          $cat = get_sub_field('post_category_id');
          $postGrid = array(
              'post_type' => 'post',
              'posts_per_page' => 8,
              'order'=> 'DESC',
              'cat' => $cat,
          );

          $post_query = new WP_Query($postGrid);
          if($post_query->have_posts() ) : while($post_query->have_posts() ) :
            $post_query->the_post(); 
            get_template_part( 'template-parts/post-query', get_post_type() );
          endwhile; 
          else :
            get_template_part( 'template-parts/content', 'none' );
          endif; wp_reset_postdata(); ?>
        </div>

    </div>


  <?php elseif (get_row_layout() == 'image_form'): ?>
    <div class="community-cta flex column-mobile container items-center">
      <div class="w-50-ns">
          <img src=<?php the_sub_field('image');?>>
      </div>
        <div class="w-60-ns newsletter-container form-w-100">
          <?php get_template_part('template-parts/subscribe');?>
        </div>
    </div>


  <?php elseif (get_row_layout() == 'text_image'): ?>
    <div class="flex column-mobile container jic pv5" style="background-color: <?php the_sub_field('bg_color');?>">
      <div class="w-40-ns">
        <?php the_sub_field('text');
        
        $link = get_sub_field('link');
          if ($link):
              $link_target =  $link['target'] ? $link['target'] : '_self'; ?>
              <a target=<?php echo esc_attr( $link_target ); ?> href=<?php echo esc_url($link['url']) ;?> class="db f5 fw6 mt4 mb4 no-deco white w-max pa3" style="background-color: <?php the_sub_field('link_background_color');?>"><?php echo esc_attr($link['title']) ;?></a>
            <?php endif;?>


      </div>
      <div class="w-50-ns">
        <img src=<?php the_sub_field('image');?>>
      </div>
    </div>

  <?php elseif (get_row_layout() == 'testimonials'): ?>
      <div class="pv5">
        <div class="container flex jic mb5">
          <h2 class="post-content-title pa3 f2 white w-max " style="background-color: <?php the_sub_field('title_background');?> ; color: <?php the_sub_field('title_color');?>"><?php the_sub_field('section_title');?></h2>
          <a class="f2 main-font has-after anchor">VIEW ALL</a>
        </div>

        <div class="testimonials-container container-left w-100 overflow-scroll">
            <div class="w-max flex">
            <?php while ( have_rows('testimonial') ) : the_row(); 
            $author = get_sub_field('author');
            ?>
              <div class="testimonial flex flex-column measure pr5-ns mr4">
                <?php get_template_part('template-parts/content/testimonial');?>
                <div class="testimonial-content mv3">
                  <?php the_sub_field('text');?> 
                </div>
                <h2 class="f2 main-color mt3"><?php echo $author;?></h2>
              </div>
            <?php endwhile;?>
            </div>
          </div>
      </div>



      <?php elseif (get_row_layout() == 'post_grid_scroll'): ?>
        <div class="posts-content-scroll mv6">
        <div class="container flex justify-between items-start mb5">
          <div class="flex flex-column">
            <h2 class="post-content-title pa3 f2 white w-max " style="background-color: <?php the_sub_field('title_background');?> ; color: <?php the_sub_field('title_color');?>"><?php the_sub_field('title');?></h2>
            <p class="grey mt3 measure lh1"><?php echo get_sub_field('explanatory_text');?></p>
          </div>
          
          <a class="f2 main-font has-after anchor">VIEW ALL</a>
        </div>
          <div class="post-grid-scroll-container container-left w-100 overflow-scroll">
            <div class="w-max flex">
            <?php 
              $cat = get_sub_field('post_category_id');
              $postGrid = array(
                  'post_type' => 'post',
                  'posts_per_page' => 8,
                  'order'=> 'DESC',
                  'cat' => $cat,
              );

              $post_query = new WP_Query($postGrid);
              if($post_query->have_posts() ) : while($post_query->have_posts() ) :
                $post_query->the_post(); 
                get_template_part( 'template-parts/post-query', get_post_type() );
              endwhile; 
              else :
                get_template_part( 'template-parts/content', 'none' );
              endif; wp_reset_postdata(); ?>
            </div>
          </div>

        </div>


  <?php elseif (get_row_layout() == 'image_form'): ?>
            <div class="community-cta flex column-mobile container items-center">
              <div class="w-50-ns">
                  <img src=<?php the_sub_field('image');?>>
              </div>
                <div class="w-60-ns newsletter-container form-w-100">
                  <?php get_template_part('template-parts/subscribe');?>
                </div>
            </div>


  <?php elseif (get_row_layout() == 'title_and_images_grid'): ?>
    <div class="container">
      <h2 class="post-content-title pa3 f1 tc mb3 tc center" style="background-color: <?php the_sub_field('title_background');?> ; color: <?php the_sub_field('title_color');?>"><?php the_sub_field('title');?></h2>

      <div class="grid-images flex">
        <?php while ( have_rows('grid_images') ) : the_row();?>
          <a class="db mh2">
            <img src=<?php the_sub_field('image');?>>
          </a>
          <?php endwhile;?>
      </div>
      <div class="tc measure-wide center mv3">
       <?php the_sub_field('explanatory_text');?>
      </div>

    <?php $link = get_sub_field('link');
      if ($link):
          $link_target =  $link['target'] ? $link['target'] : '_self'; ?>
          <a target=<?php echo esc_attr( $link_target ); ?> href=<?php echo esc_url($link['url']) ;?> class="db f5 fw6 mt4 mb4 no-deco bg-main-color center white w-max pa3" style="background-color: <?php the_sub_field('link_background_color');?>"><?php echo esc_attr($link['title']) ;?></a>
        <?php endif;?>



    </div>



<?php endif; endwhile; endif; ?>
