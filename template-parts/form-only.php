<?php $formPlaceholder = get_field('form_placeholder', get_the_ID());
    if (!$formPlaceholder) : $formPlaceholder = 'Enter your email...'; endif; 
    ?>
    
    <div class="relative z-3 form-container mv3  form-only">
  <form action="https://mirandabosch.us8.list-manage.com/subscribe/post?u=ccec1786ad424af2159139752&amp;id=7e6f5d10c0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate flex pa3 items-center" validate>
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
<p class="f7 measure lh1">Sign up to receive 10% off your first order. By signing up I agree to the Queen's Terms & Conditions</p>
