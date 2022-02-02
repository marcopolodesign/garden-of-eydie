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
    <div class="container posts-content title-holder mv6">
        <h2 class="post-content-title pa3 f2 w-max mb4 tc center" style="background-color: <?php the_sub_field('title_background');?> ; color: <?php the_sub_field('title_color');?>"><?php the_sub_field('title');?></h2>
      <div class="flex flex-wrap justify-center post-grid-container column-mobile">
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

    <?php $link = get_sub_field('link');
        if ($link):
          $link_target =  $link['target'] ? $link['target'] : '_self'; ?>
          <a target=<?php echo esc_attr( $link_target ); ?> href=<?php echo esc_url($link['url']) ;?> class="db f5 fw6 mt4 mb4 no-deco white w-max pa3" style="background-color: <?php the_sub_field('main_color');?>"><?php echo esc_attr($link['title']) ;?></a>
        <?php endif;?>

    </div>

    <?php elseif (get_row_layout() == 'post_grid_fixed'): 
        $color = get_sub_field('bg_color');
        $image= get_sub_field('background_image');
        $cat = get_sub_field('post_category_id');
        $reverse = get_sub_field('reverse');
        if ($reverse): $reverse = "row-reverse"; endif; 
        if ($cat): 
      ?>
          <div class="post-content categorized mv6 flex column-mobile justify-between <?php echo $reverse; ?>">
            <div class="sticky relative-m w-40-ns post-category-cover flex top-0">
                <div class="m-auto tc z-2 relative white post-content-cover">
                  <?php the_sub_field('category_info');?>
                </div>
                <div class="absolute-cover" style="background-image: url(<?php echo $image; ?>); background-color: <?php echo $color; ?>"></div>
            </div>

            <div class="flex flex-wrap justify-center post-grid-container column-mobile w-50-ns m-auto">
              <?php 
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
          <?php endif; ?>


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
        <div class="container title-holder flex jic mb5">
          <h2 class="post-content-title pa3 f2 white w-max " style="background-color: <?php the_sub_field('title_background');?> ; color: <?php the_sub_field('title_color');?>"><?php the_sub_field('section_title');?></h2>
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
          <div class="container title-holder flex justify-between items-start mb5">
            <div class="flex flex-column title-holder">
              <h2 class="post-content-title pa3 f2 white w-max " style="background-color: <?php the_sub_field('title_background');?> ; color: <?php the_sub_field('title_color');?>"><?php the_sub_field('title');?></h2>
              <p class="grey mt3 measure lh1"><?php echo get_sub_field('explanatory_text');?></p>
            </div>
            <?php 
            $cat = get_sub_field('post_category_id'); 
            $catLink = get_category_link($cat);
            ?>

            <a href=<?php echo esc_url($catLink); ?> class="f2 main-font has-after anchor">VIEW ALL</a>
          </div>
          <div class="post-grid-scroll-container container-left w-100 overflow-scroll">
            <div class="w-max flex">
            <?php 
              
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

      <?php elseif (get_row_layout() == 'covers'): ?>
      <div class="flex items-stretch learn-cats column-mobile mt5 container ">
          <?php while ( have_rows('categories') ) : the_row();?>
        <a href="<?php the_sub_field('link');?>" class="relative mh3 w-50-ns cover-cat">
            <div class="pa5 flex flex-column jic relative z-4">
              <h1 class="tc ttu f0"><?php the_sub_field('title');?></h1>
              <h2 class="tc"><?php the_sub_field('description');?></h2>
            </div>
            <div class="absolute-cover bg-color z-3" style="background-color: <?php the_sub_field('bg_color');?>"></div>
          <div class="absolute-cover" style="background-image: url(<?php the_sub_field('cover'); ?>); z-index: -1"></div>
        </a>
      <?php endwhile;?>
      </div>



      <?php elseif (get_row_layout() == 'featured_video'): ?>

        <div class="container title-holder flex justify-between items-center mv5">
          <div class="flex flex-column title-holder">
            <h2 class="post-content-title pa3 f2 white w-max " style="background-color: <?php the_sub_field('title_background');?> ; color: <?php the_sub_field('title_color');?>"><?php the_sub_field('title');?></h2>
            <!-- <p class="grey mt3 measure lh1"><?php echo get_sub_field('explanatory_text');?></p> -->
          </div>
          
          <a class="f2 main-font has-after anchor">VIEW ALL</a>
        </div>

        <div class="container featured-video-5-container center">
        <div class="featured-template-5-video">
            <div class="new-home-video w-100 h-100 flex">
              <iframe width="100%" src="<?php the_sub_field('featured_video');?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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

      <div class="grid-images flex column-mobile">
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
          <a target=<?php echo esc_attr( $link_target ); ?> href=<?php echo esc_url($link['url']) ;?> class="db f5 fw6 mt4 mb4 no-deco bg-main-color center white w-max pa3 w-100-m tc" style="background-color: <?php the_sub_field('link_background_color');?>"><?php echo esc_attr($link['title']) ;?></a>
        <?php endif;?>



    </div>

  <?php elseif (get_row_layout() == 'images_text_grid'): ?>
    <div class="container relative pv5 mb5">
      <div class="flex jic z-1">
        <div class="image-1 w-30-ns mb7-ns">
          <img src=<?php the_sub_field('first_image');?>> 
        </div>
        <div class="image-2 w-40-ns mt6-ns tty50 ">
          <img src=<?php the_sub_field('second_image');?>> 
        </div>
      </div>

      <div class="absolute-center z-4 w-70-ns text-centered-img">
        <h3 class='tc page-title-small ttu' style="color:<?php the_sub_field('color');?>"><?php the_sub_field('title');?></h3>
        <h1 class="f1 tc mv3 main-font lh1 ttu" style="color:<?php the_sub_field('color');?>"><?php echo get_sub_field('text');?></h1>

        <?php $link = get_sub_field('link');
        if ($link):
          $link_target =  $link['target'] ? $link['target'] : '_self'; ?>
          <a target=<?php echo esc_attr( $link_target ); ?> href=<?php echo esc_url($link['url']) ;?> class="db f5 fw6 mt4 mb4 no-deco white w-max pa3 center"  style="background-color: black"><?php echo esc_attr($link['title']) ;?></a>
        <?php endif;?>

      </div>
    <div class="absolute-cover bg-main-color multiply" style="background-color: <?php the_sub_field('bg_color');?>"></div>




    </div>

<?php endif; endwhile; endif; ?>
