<form method="get" class="flex w-100 search-min-container" id="searchform" action="<?php bloginfo('url'); ?>">
  <div class="flex w-100 jic">
    <div class="flex items-center search-text" style="flex: 1">
    <svg width="24" height="24" class="mr2" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M25 25L19.3335 19.3234L25 25ZM22.4737 11.7368C22.4737 14.5844 21.3425 17.3154 19.3289 19.3289C17.3154 21.3425 14.5844 22.4737 11.7368 22.4737C8.88925 22.4737 6.1583 21.3425 4.14475 19.3289C2.1312 17.3154 1 14.5844 1 11.7368C1 8.88925 2.1312 6.1583 4.14475 4.14475C6.1583 2.1312 8.88925 1 11.7368 1C14.5844 1 17.3154 2.1312 19.3289 4.14475C21.3425 6.1583 22.4737 8.88925 22.4737 11.7368V11.7368Z" stroke="#A5BA9B" stroke-width="2" stroke-linecap="round"/>
    </svg>

        <input class="text pa2 main-font main-color f3"  style="flex: 1" type="text" value="" 
        <?php if (is_archive()): ?>
          placeholder="Search <?php single_cat_title();?>" 
          <?php elseif (is_search()): ?>
          placeholder="Search" 
          <?php 
          else: 
          echo 'placeholder="Search everything on our site"';
          endif;?>
        name="s" id="s" />

    </div>
    <input type="submit" class="submit button pa2 h-100 ph4 main-font f3" name="submit" value="" />
  </div>
</form>
