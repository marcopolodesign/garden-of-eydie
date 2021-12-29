<div class="fixed menu-container o-0 pointers-none top-0 left-0 min-h-100-vh w-100 pa5-ns no-print">
  <nav class="side-menu relative ph3-ns">
    <div class="mb5 flex jic w-100">
      <div style="transform: scale(0.7); transform-origin: left">
       <?php get_template_part('template-parts/content/logo');?>
      </div>
      <svg class="close-menu pointer" width="30" height="30" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M35 2L2 35" stroke="black" stroke-width="3"/>
      <path d="M2 2L35 35" stroke="black" stroke-width="3"/>
      </svg>
    </div>

      <div class="has-hover-items">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-4',
						'menu_id'        => 'side-menu',
						'container' => 'ul',
						'menu_class' => 'menu-nav w-max ml-0 jic list-none',
					) );
					?>
   </div>
    </nav>
 
  <div class="absolute-cover bg-main-color"></div>
</div>
