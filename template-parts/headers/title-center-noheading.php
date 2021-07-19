<?php $mainColor = get_field('main_color');
    $moreSpacing = get_field('mt_true');
?>

<div class="header-title-center center w-70-ns pt5-ns <?php echo $moreSpacing;?>">
  <h3 class='tc page-title-small ttu' style="color:<?php echo $mainColor;?>"><?php the_title();?></h3>
    <?php remove_filter( 'the_excerpt', 'wpautop' );?>
    <h1 style="color:<?php echo $mainColor;?>" class="tc lh1 f1 mv3"><?php the_excerpt();?></h1>
  </h1>

  <div class="w-80-ns center tc page-description mb4" style="color=<?php echo $mainColor;?>">
    <?php 
      if(have_posts() ) : while(have_posts() ) : the_post(); 
        the_content();
      endwhile; endif;
    ?>
  </div>

  <?php $hasNewsletter = get_field('form_id');
    if ($hasNewsletter) : ?>
    <div class="white-form j-around no-caption w-60-ns center pb5">
      <?php get_template_part('template-parts/form-only');?> 
    </div>  
  <?php endif; ?>
</div>

<style>
  .page-description p {
    color: <?php echo $mainColor;?>
  }
</style>
