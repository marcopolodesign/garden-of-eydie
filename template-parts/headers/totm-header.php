<?php 

$totm = array(
  'post_type' => 'page' ,
  'orderby' => 'date' ,
  'order' => 'DESC' ,
  'posts_per_page' => 1,
  'meta_key' => '_wp_page_template', 
  'meta_value' => 'totm.php'
); 


$q = new WP_Query($totm);
if ( $q->have_posts() ) : while ( $q->have_posts() ): 
    $q->the_post(); 

    $id = get_queried_object_id();
    
    $mainColor = get_field('main_color');
  $moreSpacing = get_field('mt_true');?>

  


    <div class="header-title-center center w-70-ns pt5-ns relative z-3 <?php echo $moreSpacing;?>">
    <h3 class='tc page-title-small ttu' style="color:<?php echo $mainColor;?>">THEME OF THE MONTH</h3>
    <h1 class="f0 tc mv3 main-font lh1 ttu" style="color:<?php echo $mainColor;?>">
      <?php remove_filter( 'the_excerpt', 'wpautop' );
     the_title();?>
    </h1>
  
    <div class="w-80-ns center tc page-description mb4" style="color=<?php echo $mainColor;?>">
      <?php 
          the_content();
      ?>
    </div>
  
    <?php $hasNewsletter = get_field('form_id', $id);
      if ($hasNewsletter) : ?>
      <div class="white-form j-around no-caption w-60-ns center pb5">
        <?php get_template_part('template-parts/form-only');?> 
      </div>  
    <?php endif; ?>
  </div>



 <?php  endwhile;endif; 


?>



<style>
  .page-description p {
    color: <?php echo $mainColor;?>
  }
</style>
