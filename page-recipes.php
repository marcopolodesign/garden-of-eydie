<?php 
get_header();?>

<main id="main" data-barba="container" data-barba-namespace="recipes" class="recipes" bg-color="white">

  <section class="recipes-slider-container home-slider relative">
  <div class="marco-carrousel relative mv5 w-100 overflow-hidden">
    <div class="flex w-max relative left-0">
      <?php if( have_rows('recipe_slider') ): while( have_rows('recipe_slider') ): the_row(); ?>
          <a href=<?php the_sub_field('link'); ?> class="carrousel-image relative mh3-ns flex no-deco white">
            <div class="m-auto relative z-4 white no-deco main-font carrousel-text">
                <h1 class="tc f0 ttu"><?php the_sub_field('title');?></h1>
                <h2 class="o-0 tc f2">Read now</h2>
            </div>
            <div class="absolute-cover bg-center" style='background-image: url(<?php the_sub_field("image");?>)'></div>
            <div class="absolute-overlay black z-2"></div>
            <div class="absolute-center z-3 tc">
              <?php the_sub_field('text');?>
            </div>        
          </a>

      <?php endwhile; endif;?>
    </div>

    <div class="carrousel-controller">
      <div class="controller-inner">
        <?php $carrousel = get_field('recipe_slider');
        foreach ($carrousel as $c):?>
          <div class="dot"></div>
         <?php endforeach;?>
        </div>
    </div>

  </div>
  </section>

  <section class="search-box-container container">
    <!-- Here goes search box -->
    <h1 class="tc f1 mb3">Search our entire recipes index</h1>
    <div class="flex justify-center search-form w-100 container">
      <select class="text pa2 main-font f3 mr4">
        <option disabled selected>All recipes</option>
      </select>
      <form method="get" class="flex w-100 " id="searchform" action="<?php bloginfo('url'); ?>">
        <div class="flex w-100 jic">
          <div class="flex items-center search-text" style="flex: 1">
          <svg width="24" height="24" class="mr2" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M25 25L19.3335 19.3234L25 25ZM22.4737 11.7368C22.4737 14.5844 21.3425 17.3154 19.3289 19.3289C17.3154 21.3425 14.5844 22.4737 11.7368 22.4737C8.88925 22.4737 6.1583 21.3425 4.14475 19.3289C2.1312 17.3154 1 14.5844 1 11.7368C1 8.88925 2.1312 6.1583 4.14475 4.14475C6.1583 2.1312 8.88925 1 11.7368 1C14.5844 1 17.3154 2.1312 19.3289 4.14475C21.3425 6.1583 22.4737 8.88925 22.4737 11.7368V11.7368Z" stroke="#A5BA9B" stroke-width="2" stroke-linecap="round"/>
          </svg>

              <input class="text pa2 main-font main-color f3"  style="flex: 1" type="text" value="" placeholder="Search by ingredient, type of meal, or anything you like!" name="s" id="s" />

          </div>
          <input type="submit" class="submit button pa2 h-100 bg-main-color black ph4 main-font f3" name="submit" value="<?php _e('Search');?>" />
        </div>
      </form>
    </div>
   
  </section>

  <?php get_template_part('template-parts/reusable-content'); ?>





</main><!-- #main & End Barba Container-->


<?php
get_footer();
