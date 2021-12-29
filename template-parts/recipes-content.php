<div class="recipe-content flex column-mobile justify-between relative container mv5">
				<div class="sticky relative-m w-20-ns no-print" style="top: 150px; height: max-content">
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
					<?php 
						the_content(); ?>

					<div class="content-closure">
						<button onclick="window.print()" class="anchor mt4 print-button flex items-center no-print bg-main-color pa3 w-100 justify-center">
							<?php get_template_part('template-parts/content/print');?>
							<h2 class="ttu black ml3">Print this recipe</h2>
						</button>
					</div>
				</div>

			</div>
