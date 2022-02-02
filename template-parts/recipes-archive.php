<section class="flex justify-between column-mobile relative recipes-archive-container ph5">
  <div class="sticky sticky-top relative-m h-max w-30-ns">
    <?php if (!is_search()): ?>
    <p class="grey ttu"><span class="flex items-center"><a href="/recipes" class="has-after grey">Recipes > </a> <a class="has-after grey"><?php single_cat_title();?></a></span></p>

    <h1 class="mt3 f1 ttu"><?php single_cat_title();?></h1>
    <ul class="sub-categories-list flex flex-wrap mt4">
      <?php 
      wp_list_categories(
        array(
            'child_of' => get_queried_object_id(), // this will be ID of current category in a category archive
            'style' => 'db',
            'title_li' => 'archive-sub-cat', 
            "post_per_page" => -1,
        )
      ); ?>
    </ul>

    <div class="relative mt5 mb3 w-max">
      <select class="sub-list-select recipe-select">
        <option disabled><?php single_cat_title();?></option>
        <?php get_template_part('template-parts/recipe-options');?>
      </select>

      <a href="/recipes" class="absolute top-50 right-50" >
        <svg style="transform: translate(-50%, -50%)" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="11" cy="11" r="11" fill="black"/>
          <path d="M14.2356 8.41162L8.41211 14.2352" stroke="white"/>
          <path d="M8.41211 8.41182L14.2356 14.2354" stroke="white"/>
        </svg>
      </a>
    </div> 
    <?php else: ?>
    <p class="grey">You've searched for:</p>
    <h1 class="mt3 f1 ttu mb4"><?php echo get_search_query();?></h1>

    <?php endif;?>
   
    <?php get_template_part('template-parts/search-min'); ?>

  </div>

  <div class="recipes-archive-content flex flex-wrap jic w-60-ns mr-0">
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
	  

      $s = get_search_query();
			$lifestylePosts = array(
					'post_type' => 'post',
					'posts_per_page' => 9,
					'order'=> 'DESC',
          'cat' => get_queried_object_id(),
          "s"=> $s,
				'paged'=> $paged,
			); 

			$post_query = new WP_Query($lifestylePosts);
			if($post_query->have_posts() ) : while($post_query->have_posts() ) :
			$post_query->the_post(); 
			get_template_part( 'template-parts/post-query', get_post_type() );
		endwhile; 
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; wp_reset_postdata(); the_posts_pagination(array( 'mid_size' => 3, 'next_text'=> __('Next Page'), ));
	
		?>
  </div>
</section>
