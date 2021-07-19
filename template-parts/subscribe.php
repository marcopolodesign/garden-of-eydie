<div class="flex flex-column justify-center">

  <?php 
    $formTitle = get_field('form_title');
    if (!$formTitle) : $formTitle = 'GARDENS NEWSLETTER'; endif; 

    $formDescription = get_field('form_description', get_the_ID());
    if (!$formDescription) : $formDescription = 'Sign up and get free access to recipes, printables, upcoming theme of the month and be the first to know about new updates.'; endif; 

    $formPlaceholder = get_field('form_placeholder', get_the_ID());
    if (!$formPlaceholder) : $formPlaceholder = 'Enter your email...'; endif; 
  ?>



  <h1 class="lh1 tc f1 w-70-ns center mb2"><?php echo $formTitle; ?></h1>
  <?php if ($formPlaceholder == '   ') : ?>
    <p class="tc mb4 measure-wide center"><?php echo $formDescription; ?></p>
  <?php else : echo '<p class="mv2"></p>'; endif;?>
  <div class="relative z-3 form-container ph3 pv4 center w-60-ns">
    <form action="https://mirandabosch.us8.list-manage.com/subscribe/post?u=ccec1786ad424af2159139752&amp;id=7e6f5d10c0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate flex justify-center items-center pb2" validate>

      <?php get_template_part('template-parts/content/inbox'); ?>
    <input type="email" value="" required placeholder="<?php echo $formPlaceholder;?>" name="EMAIL" class="required f3 email main-font w-70-ns ml3" id="mce-EMAIL">
    <div id="mce-responses" class="clear">
      <div class="response" id="mce-error-response" style="display:none"></div>
      <div class="response" id="mce-success-response" style="display:none"></div>
    </div>   
      <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_78f709c5a47c30d80a4b89086_4e8cb65cc2" tabindex="-1" value=""></div>
    <div class="clear">
      <input type="submit" value="" name="subscribe" id="mc-embedded-subscribe" class="button anchor white subscribe-form-button">
    </div>
    </form>
  </div>
</div>

<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
