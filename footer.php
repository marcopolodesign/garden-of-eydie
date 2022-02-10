<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Garden_Of_Eydie
 */

?>

</div> <!-- End Barba Container -->

	<footer id="colophon" class="site-footer mt6 no-print">
	<section class="instagram-feed-container mv5 container-xs">
	<div class="flex jic column-mobile gram-text-container">
		<a href="http://instagram.com/gardenofeydie" target="_blank" class="ttu main-color db mb4 fw7 f3 tc db flex justify-center items-center column-mobile">
			<?php get_template_part('template-parts/content/insta');?>
			<h2 class="ttu f3 black ml3 mt1 gram-text">Follow us on the Gram!</h2>	
		</a>

		<h2 class="ttu f3 black ml3 mt1">@GardenOfEydie</h2>	


	</div>
	
		<div class="instagram-feed flex flex-wrap justify-between column-mobile">
		<!-- Loading... -->
		</div>
		<a href="http://instagram.com/gardenofeydie" target="_blank" class="tc center ttu lsf-pink mt2 fw7 f2 dn relative">FOLLOW US</a>
	</section>


	<section class="container-xs pv3 bg-main-color">
	<div class="footer-first-row flex jic mb6">

	
		<div class="footer-subscribe mt4 w-30-ns">
			<h1 class="ttu black">From Garden to Inbox</h1> 
			<?php get_template_part('template-parts/form-only');?>
		</div>

		<div class="flex flex-column items-end">

		<?php get_template_part('template-parts/content/logo');?>

			<div class="footer-icons flex mt4">
				<a class="mr3" href="https://instagram.com/gardenofeydie">
					<?php get_template_part('template-parts/content/insta');?>
				</a>
				<a class="mr3" href="https://youtube.com/gardenofeydie">
					<?php get_template_part('template-parts/content/youtube');?>
				</a>
				<a class="mr3" href="https://youtube.com/pinterest">
					<?php get_template_part('template-parts/content/pinterest');?>
				</a>
			</div>
		</div>
		

	</div>


		<div class="footer-links flex column-mobile justify-between items-end pv4">
			<div class="flex flex-column">
				<nav>
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-3',
								'menu_id'        => 'footer-menu',
								'container' => 'ul',
								'menu_class' => 'footer-nav w-max ml-auto mr-0 jic flex list-none',
								'li_class' => 'main-font'
							) );
							?>
					</nav>

		
		
			</div>

			<div class="flex flex-column justify-between items-end jac-m">
				<div class="footer-aob ">
					<ul class="list-none flex column-mobile jac-m">
					<li class="mr3-ns"><a href="no-deco has-after grey">Terms & Conditions</a></li>
					<li class=""><a href="no-deco has-after gery">Privacy Policy</a></li>
				</ul>
				</div>
			</div>
		</div>
	</section>




	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</div> <!-- End Barba Wrapper -->


</body>
</html>
