<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Garden_Of_Eydie
 */

get_header();
?>

<main id="main" data-barba="container" data-barba-namespace="lifestyle" class="category" bg-color="white">

	<section class="cat-header first-content ph5">
		<h1 id="cat-name" class="ttu tc f1"><?php single_cat_title();?></h1>

		<?php
			$catPost = array(
					'post_type' => 'post',
					'posts_per_page' => 1,
					'order'=> 'DESC',
			);
			$post_query = new WP_Query($catPost);
			if($post_query->have_posts() ) : while($post_query->have_posts() ) :
			$post_query->the_post(); 
			
				get_template_part('template-parts/featured-cat');
			
			wp_reset_postdata();		endwhile; endif; 
		?>




	</section>

	<section class="mt6">
		<h1 class="ttu center tc mb4">LATEST POSTS</h1>
		<div class="container flex flex-wrap jic w-100">
		<?php
			$lifestylePosts = array(
					'post_type' => 'post',
					'posts_per_page' => 9,
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


	</main><!-- #main -->

<?php
get_footer();
