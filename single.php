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
			<img class="container mv4-ns no-print" src=<?php the_post_thumbnail_url('full');?>>

			<div class="featured-text container-xl m-auto">
				<div class="main-font no-print"><?php 
					$featured_text = get_field('featured_text');
					strip_tags($featured_text);
					echo $featured_text; ?>
				</div>
				<div class="recipe-aob flex column-mobile mt4-ns">		
					<?php if (get_field('cooking_time')): ?>
					<div class="flex items-center mr5">
						<?php get_template_part('template-parts/content/time');?>
						<h2 class="main-font ml3 f3"><?php the_field('cooking_time');?> minutes cooking time</h2>
					</div>
					<?php endif;?>

					<?php if (get_field('ammout_of_servings')): ?>
					<div class="flex items-center mr5">
						<?php get_template_part('template-parts/content/serves');?>
						<h2 class="main-font f3 ml3"><?php the_field('ammout_of_servings');?> Serves</h2>
					</div>
					<?php endif;

					if (has_category('recipe')): ?>
						<button onclick="window.print()" class="pointer mt4 print-button top  flex items-center no-print bg-main-color pa3">
							<?php get_template_part('template-parts/content/print');?>
							<h2 class="main-font f3 ml3 has-after black anchor">Print this recipe</h2>
						</button>
					<?php endif;?>
				</div>
			</div>

			<?php if (has_category('recipe')):
				get_template_part('template-parts/recipes-content');
			else :
				get_template_part('template-parts/single-content');
			endif;?>

	

			<?php if (get_field('ideal_for')) : ?>
			<div class="container-xl pt6 ideal-for-container w-100-m">
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

			<div class="container posts-content title-holder mv6 no-print">
        <h2 class="post-content-title pa3 f2 w-max mb4 tc center ttu" style="background-color: <?php the_sub_field('title_background');?> ; color: <?php the_sub_field('title_color');?>">Related Recipes</h2>
      <div class="flex flex-wrap post-grid-container column-mobile ">
        <?php 
          $cat = get_field('related');
					if (!$cat) : $cat = '11' ; endif;
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

			<div class="dn no-print">
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
