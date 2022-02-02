<section class="cat-header first-content ph5">
		<h1 id="cat-name" class="ttu tc f1"><?php single_cat_title();?></h1>

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
			$catPost = array(
					'post_type' => 'post',
					'posts_per_page' => 1,
					'order'=> 'DESC',
					'cat' => get_queried_object_id(),
					'paged'=> $paged,

			);
			$post_query = new WP_Query($catPost);
			if($post_query->have_posts() ) : while($post_query->have_posts() ) :
			$post_query->the_post(); 
			
				get_template_part('template-parts/featured-cat');
			
			wp_reset_postdata();		endwhile;	endif; 
		?>




	</section>

	<section class="mt6">
		<h1 class="ttu center tc mb4">LATEST POSTS</h1>
		<div class="container flex flex-wrap jic w-100">
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
			
			$lifestylePosts = array(
					'post_type' => 'post',
					'posts_per_page' => 9,
					'order'=> 'DESC',
					'cat'=> get_queried_object_id(),
								'paged'=> $paged,


			);
			$post_query = new WP_Query($lifestylePosts);
			if($post_query->have_posts() ) : while($post_query->have_posts() ) :
			$post_query->the_post(); 
			get_template_part( 'template-parts/post-query', get_post_type() );
		endwhile; 
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; wp_reset_postdata(); 	
		the_posts_pagination(array( 'mid_size' => 3, 'next_text'=> __('Next Page'), ));
	
		?>
		</div>

	</section>
