<?php 
get_header();?>

<main id="main" data-barba="container" data-barba-namespace="recipes" class="recipes" bg-color="white">
	
	  <section class="search-box-container container mt6 mb4">
    <!-- Here goes search box -->
    <h1 class="tc f1 mb3 ttu">Plant based recipes you'll love that will elevate your wellbeing.</h1>
    <div class="flex justify-center search-form w-100 container column-mobile">
      <select class="text pa2 main-font f3 mr4-ns recipe-select">
        <option disabled selected>All recipes</option>
          <?php get_template_part('template-parts/recipe-options'); ?>
      </select>
      <form method="get" class="flex w-100 column-mobile" id="searchform" action="<?php bloginfo('url'); ?>">
        <div class="flex w-100 column-mobile jic">
          <div class="flex items-center search-text" style="flex: 1">
          <svg width="24" height="24" class="mr2" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M25 25L19.3335 19.3234L25 25ZM22.4737 11.7368C22.4737 14.5844 21.3425 17.3154 19.3289 19.3289C17.3154 21.3425 14.5844 22.4737 11.7368 22.4737C8.88925 22.4737 6.1583 21.3425 4.14475 19.3289C2.1312 17.3154 1 14.5844 1 11.7368C1 8.88925 2.1312 6.1583 4.14475 4.14475C6.1583 2.1312 8.88925 1 11.7368 1C14.5844 1 17.3154 2.1312 19.3289 4.14475C21.3425 6.1583 22.4737 8.88925 22.4737 11.7368V11.7368Z" stroke="#A5BA9B" stroke-width="2" stroke-linecap="round"/>
          </svg>

              <input class="text pa2 main-font main-color f3"  style="flex: 1" type="text" value="" placeholder="Search by ingredient" name="s" id="s" />

          </div>
          <input type="submit" class="submit button pa2 h-100 bg-main-color black ph4 main-font f3" name="submit" value="<?php _e('Search');?>" />
        </div>
      </form>
    </div>
  </section>
	

  <section class="recipes-slider-container home-slider relative">
    <div class="new-recipes container-xs flex pt3 mb4 column-mobile">
    <?php 
          $cat = get_sub_field('post_category_id');
          $postGrid = array(
              'post_type' => 'post',
              'posts_per_page' => 4,
              'order'=> 'DESC',
              'cat' => 11,
          );

          $post_query = new WP_Query($postGrid);
          if($post_query->have_posts() ) : while($post_query->have_posts() ) :
            $post_query->the_post(); ?>
          <a href="<?php the_permalink();?>" class="smooth-t white no-deco new-recipe relative w-25-ns mh3-ns overflow-hidden flex" style="height: 500px">
            <div class="absolute-cover bg-center smooth-t" style="background-image:url(<?php the_post_thumbnail_url('full');?>)"></div>
            <div class="absolute-cover black-overlay"></div>

            <div class="m-auto tc relative z-3 ph3 white no-deco smooth-t">
              <h2 class="main-font white f2 smooth-t"><?php the_title();?></h2>
              <div class="recipe-hover flex flex-column smooth-t">
                  <span class="mv3 smooth-t"></span>
                  <p class="smooth-t">READ NOW</p>
              </div>
            </div>
          </a>
            
          <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </section>


	
   <div class="dn jic mv5 recipe-main-holder container">
      <a class="mh3 w-50-ns flex">
        <h1 class="tc f2 m-auto">Search by season</h1>
      </a>

      <a class="mh3 w-50-ns flex">
      <h1 class="tc f2 m-auto">Search by meal</h1>
      </a>
    </div>
	
  <?php get_template_part('template-parts/reusable-content'); ?>

  <a href="/category/recipe/" class="f2 main-font has-after anchor">VIEW ALL</a>

<style>
	.new-recipes > a {
		height: 350px !important;
	}
	</style>


</main><!-- #main & End Barba Container-->


<?php
get_footer();
