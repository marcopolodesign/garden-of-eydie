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
        $name = $cat->name; ?>
        <option value="<?php echo home_url() . '/category/recipe/' . $cat->slug;?> "><?php echo $cat->name;?></option>
<?php  endforeach; ?>
