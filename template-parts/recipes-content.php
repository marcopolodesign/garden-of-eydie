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
