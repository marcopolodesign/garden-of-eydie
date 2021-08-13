<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Garden_Of_Eydie
 */

get_header();
?>

<main id="main" data-barba="container" data-barba-namespace="recipe" class="recipe" bg-color="white">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<h1 class="ttu f0 tc pt5-ns ph6-ns"><?php the_title();?></h1>
			<img class="container mv4-ns" src=<?php the_post_thumbnail_url('full');?>>

			<div class="featured-text container-xl m-auto">
				<div class="main-font"><?php 
					$featured_text = get_field('featured_text');
					strip_tags($featured_text);
					echo $featured_text; ?>
				</div>
				<div class="recipe-aob flex mt4-ns">		
					<?php if (get_field('cooking_time')): ?>
					<div class="flex items-center mr5">
						<?php get_template_part('template-parts/content/time');?>
						<h2 class="main-font ml3 f3"><?php the_field('cooking_time');?> minutes cooking time</h2>
					</div>
					<?php endif;?>

					<?php if (get_field('ammout_of_servings')): ?>
					<div class="flex items-center">
						<?php get_template_part('template-parts/content/serves');?>
						<h2 class="main-font f3 ml3"><?php the_field('ammout_of_servings');?> Serves</h2>
					</div>
					<?php endif;?>
				</div>
			</div>

			<div class="recipe-content flex column-mobile justify-between relative container mv5">
				<div class="sticky relative-mobile w-20-ns" style="top: 150px; height: max-content">
					<div class="recipe-index pa4 flex flex-column items-center">
							<h1 class="tc ttu mb3 w-max">Index</h1>
							<?php if( have_rows('recipe_content') ): while( have_rows('recipe_content') ): the_row(); ?>

								<h2 class="tc main-font f3 mv2 has-after grey pointer"><?php the_sub_field('title');?></h2>

							<?php endwhile; endif;?>
					</div>
					<p class="grey tc mt2">Like this recipe? Share it!</p>
					<?php get_template_part('template-parts/social-sharer', get_post_type()); ?>

				</div>

				<div class="w-60-ns recipe-content">
					<?php if( have_rows('recipe_content') ): while( have_rows('recipe_content') ): the_row(); ?>

					<div class="recipe-section mt4">
						<div class="flex jic mission mb3">
							<h1 class="ttu pr4 w-max" style="border-bottom: none !important;"><?php the_sub_field('title');?></h1>
							<span></span>
						</div>
						<?php the_sub_field('content');?>
					</div>

					<?php endwhile; endif;?>

				</div>

			</div>

			<?php if (get_field('ideal_for')) : ?>
			<div class="container-xl pt6">
			<h1 class="pa3 bg-black tc ttu white grid-container f1">This recipe is ideal for:</h1>		
			<div class="flex column-mobile justify-center items-grow comm-footer ideal-for">
				<?php while ( have_rows('ideal_for') ) : the_row(); 
					$icon = get_sub_field('icon'); 
					if (!$icon) : $icon = '/wp-content/uploads/2021/07/Group.svg'; endif;
					
					$title = get_sub_field('title');
					if (!$title) : $title = get_the_title(); endif;
					
					$description = get_sub_field('text');
					if (!$description) : $description = "Discover more about Garden of Eydie in this section" ; endif;
					?>

					<div href=<?php the_permalink(); ?> class="no-deco black flex flex-column justify-center pv5 mh3 ph4">
						<img src=<?php echo $icon;?>>
						<h1 class="f2 mt3 tc"><?php echo $title; ?> </h1>
						<!-- <div class="measure-wide center tc">
							<?php echo $description;?>
						</div>
						 -->
					</div>

					<?php endwhile; ?>
			</div>
			</div> 
			<?php endif; ?>

			<div class="container posts-content mv6">
        <h2 class="post-content-title pa3 f2 w-max mb4 tc center ttu" style="background-color: <?php the_sub_field('title_background');?> ; color: <?php the_sub_field('title_color');?>">Related Recipes</h2>
      <div class="flex flex-wrap post-grid-container">
        <?php 
          $cat = get_sub_field('post_category_id');
          $postGrid = array(
              'post_type' => 'post',
              'posts_per_page' => 3,
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

			<a href='/recipes' class="f2 main-font has-after anchor center mt4" style="display: block">VIEW ALL</a>



    </div>

			<div class="dn">
				<?php	the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'garden-of-eydie' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'garden-of-eydie' ) . '</span> <span class="nav-title">%title</span>',
					)
				); ?>
			</div>
		
		
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
