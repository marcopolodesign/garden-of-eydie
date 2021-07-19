<article id="post-<?php the_ID(); ?>" <?php post_class('post-container ma3-ns'); ?>>
	<div class="relative post-img">
		<?php get_template_part('template-parts/thumbnail-bg');?>
	</div>

  <div class="post-content mt3">
    <h1 class="tc lh1 f3"><?php the_title();?></h1>
    <p class="mt2 f6 tc grey no-deco"><?php echo wp_trim_words( get_the_content(), 21 , '...' ); ?></p>
  </div>

</article><!-- #post-<?php the_ID(); ?> -->
