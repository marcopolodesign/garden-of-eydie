<section class="about-content container bg-main-color pv5">
  <div class="mission pv4">
    <div class="flex items-center">
      <p class="mr4">Our Mission</p>
      <span></span>
    </div>
    <h1 class="f0 pv5"><?php echo the_field('manifiesto'); ?></h1>
  </div>


  <div class="goal pv5">
    <p class="tc fw6 f3">Our Goal</p>
    <h2 class="f1 tc pv4 measure-narrow center lh-copy ph4-ns"><?php the_field('goal');?></h2>
  </div>

  <div class="flex column-mobile justify-center items-stretch comm-footer grid-container">
    <?php while ( have_rows('grid_item') ) : the_row(); 
      $icon = get_sub_field('icon'); 
      if (!$icon) : $icon = '/wp-content/uploads/2021/07/Group.svg'; endif;
      
      $title = get_sub_field('title');
      if (!$title) : $title = get_the_title(); endif;
      
      $description = get_sub_field('text');
      if (!$description) : $description = "Discover more about Garden of Eydie in this section" ; endif;
      ?>

      <div href=<?php the_permalink(); ?> class="no-deco black flex flex-column justify-center pv5 mh3 ph4">
        <img src=<?php echo $icon;?>>
        <h1 class="f2 mv3 tc"><?php echo $title; ?> </h1>
        <div class="measure-wide center tc">
          <?php echo $description;?>
        </div>
        
      </div>

    <?php endwhile; ?>
  </div>
</section>

<section class="container-xl">
  <?php while ( have_rows('about_eydie') ) : the_row(); 

    $isReverse = get_sub_field('reverse'); if ($isReverse): $isReverse = 'row-reverse'; endif;

    $overlapTop = get_sub_field('overlap'); if ($overlapTop): $overlapTop = 'overlap-top'; endif;  
  ?>

  <div class="flex justify-between column-mobile items-center mb5-ns mt4-ns <?php echo $isReverse; echo $overlapTop?>">
    <div class="about-text w-50-ns measure">
        <?php the_sub_field('about_text');?>
    </div>
    <div class="about-image overlap-top w-40-ns">
      <img src=<?php the_sub_field('about_img');?>>
    </div>
  </div>
  <?php endwhile; ?>
</section>

