<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Garden_Of_Eydie
 */

?>

<section class="no-results not-found mt5">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'garden-of-eydie' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'garden-of-eydie' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p class="lh-copy mb3 mt2 measure-wide"><?php esc_html_e( "Sorry, but nothing matched your search terms. Please try again with some different keywords. While you're at it, check out our latest posts!", 'garden-of-eydie' ); ?></p>
			<div class="recipes-archive-content flex flex-wrap jic mr-0">

			<?php
			$lifestylePosts = array(
				'post_type' => 'post',
				'posts_per_page' => 9,
				'order'=> 'DESC',
				// 'cat' => get_queried_object_id(),
				// "s"=> $s,
		); 

		$post_query = new WP_Query($lifestylePosts);
		if($post_query->have_posts() ) : while($post_query->have_posts() ) :
		$post_query->the_post(); 
		get_template_part( 'template-parts/post-query', get_post_type() );
	endwhile; endif; ?>
	</div>

	<?php 	else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'garden-of-eydie' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
