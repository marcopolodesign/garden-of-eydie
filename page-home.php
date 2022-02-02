<?php get_header(); 
$mainColor = get_field('main_color');
$moreSpacing = get_field('mt_true');
?>

<main id="main" data-barba="container" data-barba-namespace="home" class="home no-mt" bg-color="white testing-deployment">

<section class="home-slider-container relative w-100 min-h-100-vh">
  <?php 
    $slider = get_field('slider');
    $amount = count($slider);
  if(have_rows('slider')): while ( have_rows('slider') ) : the_row(); ?>

  <div class="slide absolute top-0 left-0 h-100 w-100 flex overflow-hidden">
    <div class="slide-text relative z-3 measure-wide container-left h-max ml-0 m-auto">
      <div class="overflow-hidden">
        <h1 class="main-font f0 ttu" style="color: <?php the_sub_field('main_color');?>"><?php the_sub_field('title');?></h1>
      </div>
    
      <h3 class="mt3 fw3 pl2"  style="color: <?php the_sub_field('main_color');?>">
      <?php the_sub_field('description');?>
      </h3>

      <?php $link = get_sub_field('link');
        if ($link):
          $link_target =  $link['target'] ? $link['target'] : '_self'; ?>
          <a target=<?php echo esc_attr( $link_target ); ?> href=<?php echo esc_url($link['url']) ;?> class="bg-black db f5 fw6 mt4 mb4 no-deco white w-max pa3" style="background-color: <?php the_sub_field('main_color');?>"><?php echo esc_attr($link['title']) ;?></a>
        <?php endif;?>
    </div>

    <div class="slide-img absolute z-2">
      <img src=<?php the_sub_field('image');?>>
    </div>
    <div class="slide-bg flex column-mobile absolute w-100 h-100">
        <div class="w-70-ns relative" >
            <div class="absolute-cover s-bg-color" style="background-color: <?php the_sub_field('background_color');?>"></div>  
        </div>
        <div class="w-30-ns relative s-bg-img overflow-hidden">
          <div class="absolute-cover" style="background-image: url( <?php the_sub_field('background_image');?>)"></div>
        </div>
    </div>
  </div>

  <?php endwhile; endif; ?>

  <div class="absolute z-4 container slider-controller flex">
    <?php for($i = 0; $i < $amount; $i++) : ?>
      <span class="db mr3 pv4 relative">
        <span></span>
      </span>
    <?php endfor;?>
  </div>
</section>


<section class="posts-content-scroll title-holder mv6">
  <h2 class="post-content-title pa3 f2 w-max mb4 tc center ttu" style="background-color: <?php the_sub_field('title_background');?> ; color: <?php the_sub_field('title_color');?>">Latest posts<?php the_sub_field('title');?></h2>
  <div class="post-grid-scroll-container container-left w-100 overflow-scroll">
    <div class="w-max flex">
    <?php 
      $cat = get_sub_field('post_category_id');
      $postGrid = array(
          'post_type' => 'post',
          'posts_per_page' => 8,
          'order'=> 'DESC',
          'cat' => $cat,
          'category__not_in' => '23'
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

  <a href='/blog' class="f2 main-font main-cta w-max no-deco anchor center mt4 bg-main-color white pa3" style="display: block">VIEW ALL</a>
</section>

<section class="bg-main-color container pv5 transformation-home">
  <div class="mv3">
      <h1 class="f0 tc main-font lh1 ttu" style="color:<?php echo $mainColor;?>">Real Food for Real
      </h1>
      <h1 class="f00 relative tc ttu" style="color:<?php echo $mainColor;?>" >Transformation</h1>
    </div>

    <div class="w-60-ns center tc page-description mb4" style="color:<?php echo $mainColor;?>">
      <?php 
        if(have_posts() ) : while(have_posts() ) : the_post(); 
          the_content();
        endwhile; endif;
      ?>
    </div>

    <form method="get" class="flex w-80-ns center home-search" id="searchform" action="<?php bloginfo('url'); ?>">
        <div class="flex column-mobile w-100 jic">
          <div class="flex items-center search-text" style="flex: 1">
          <svg width="24" height="24" class="mr2" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M25 25L19.3335 19.3234L25 25ZM22.4737 11.7368C22.4737 14.5844 21.3425 17.3154 19.3289 19.3289C17.3154 21.3425 14.5844 22.4737 11.7368 22.4737C8.88925 22.4737 6.1583 21.3425 4.14475 19.3289C2.1312 17.3154 1 14.5844 1 11.7368C1 8.88925 2.1312 6.1583 4.14475 4.14475C6.1583 2.1312 8.88925 1 11.7368 1C14.5844 1 17.3154 2.1312 19.3289 4.14475C21.3425 6.1583 22.4737 8.88925 22.4737 11.7368V11.7368Z" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
          </svg>

              <input class="text pa2 main-font main-color f3"  style="flex: 1" type="text" value="" placeholder="Search our Garden, or click the categories below!" name="s" id="s" />
          </div>
          <input type="submit" class="submit button pa2 h-100 bg-main-color black ph4 main-font f3" name="submit" value="<?php _e('Search');?>" />
        </div>
      </form>

    <div class="flex column-mobile jic mt5 w-60-ns center">
      <a href="/recipes" class="white ttu has-after f2 main-font">Recipes</a>
      <a href="/lifestyle" class="white ttu has-after f2 main-font">Lifestyle</a>
      <a href="/learn" class="white ttu has-after f2 main-font">Learn</a>
      <a href="/about-us" class="white ttu has-after f2 main-font">Connect</a>

    </div>
      

</section>


<?php get_template_part('template-parts/reusable-content'); ?>

<style>
  .page-description p {
    color: <?php echo $mainColor;?>
  }
</style>

</main><!-- #main & End Barba Container-->

<?php get_footer();?>

