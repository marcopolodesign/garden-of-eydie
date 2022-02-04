<script>
  if (window.location.pathname === '/category/recipe/') {
   <?php $isRecipe = true; ?>
  }
</script>

    <?php if ($isRecipe) : ?>

    <option value="RECIPES">RECIPES</option>

    <?php endif; ?>
    <?php 

        $args = array(
        'child_of' => 11,
        // 'hierarchical' =>0 ,
        'hide_empty'        => 0,
        'parent' => '11',
        // 'title_li'     => "",
        "orderby" => 'name',
      );

      $subCats = get_categories($args);
      foreach ($subCats as $cat) : 
        $name = $cat->name; 
        if ($cat->count> 0 ): ?>
         <option value="<?php echo home_url() . '/category/recipe/' . $cat->slug;?> "><?php echo $cat->name;?></option>
          
<?php  endif; endforeach; ?>
