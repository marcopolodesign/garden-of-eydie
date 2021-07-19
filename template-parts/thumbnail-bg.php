<div class="absolute-cover <?php the_field('bg_position'); ?>" style="background-image: url(<?php the_post_thumbnail_url('full');?>)">
<meta itemprop="image" content="<?php the_post_thumbnail_url('mobile-images');?>"></div>
<?php if (get_field('remove_overlay')): ?>
  <div class="absolute-cover black-overlay"></div>
<?php endif;?>
