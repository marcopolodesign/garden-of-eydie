<div class="social-sharer flex justify-between mt2 items-center">

<?php $post=get_post();
      $id = $post->ID;
      $urlShare = get_permalink();
      $titleShare = str_replace("%20"," ",get_the_title());
      $image = get_the_post_thumbnail_url($id ,'full'); ?>
	
  <a href="<?php echo 'https://www.facebook.com/sharer/sharer.php?u=' . $urlShare;?>" target="_blank">
    <svg viewBox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
        <path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"></path>
    </svg>
    <span class="lsf-dark-pink o-0">Share on Facebook</span>
  </a>



  <a href="<?php echo 'http://pinterest.com/pin/create/button/?url' . $urlShare . '&description=' . $titleShare . '&media=' . $image;?>" target="_blank">
    <svg viewBox="0 0 67.336 83.458">
      <defs>
        <style>
          .cls-1 {
            fill: #F595A7;
          }
        </style>
      </defs>
      <g id="art" transform="translate(160 197)">
        <g id="Group_6" data-name="Group 6" transform="translate(-160 -197)">
          <path id="Path_10" data-name="Path 10" class="cls-1" d="M110.936,75.657c0,18.179-11.454,32.8-27.333,32.8-5.337,0-10.369-2.777-12.061-6.074,0,0-2.647,10.066-3.3,12.539-1.158,4.556-4.321,10.213-6.486,13.736-1.21-.377-2.408-.794-3.579-1.258-.477-4.165-.868-10.573.174-15.124.954-4.122,6.161-26.205,6.161-26.205a19.2,19.2,0,0,1-1.562-7.81c0-7.332,4.252-12.8,9.545-12.8,4.512,0,6.681,3.384,6.681,7.419,0,4.512-2.863,11.28-4.382,17.571C73.537,95.7,77.441,100,82.6,100c9.371,0,16.574-9.892,16.574-24.123,0-12.625-9.068-21.433-22.04-21.433-15.012,0-23.819,11.237-23.819,22.865a20.577,20.577,0,0,0,3.9,12.018,1.569,1.569,0,0,1,.347,1.519c-.39,1.649-1.3,5.25-1.475,5.987-.217.954-.781,1.171-1.779.694C47.722,94.443,43.6,84.855,43.6,77.089,43.6,60.472,55.661,45.2,78.439,45.2,96.7,45.2,110.936,58.216,110.936,75.657Z" transform="translate(-43.6 -45.2)"/>
        </g>
      </g>
    </svg>
      <span class="lsf-dark-pink o-0">Share on Pinterest</span>
  </a>


<!--   
  <a href="<?php echo 'http://twitter.com/intent/tweet?url=' . $urlShare . '&text=' . $titleShare; ?>&via=lovesweatfitness" target="_blank">
    <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
      <path d="M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z"></path>
    </svg>
    <span class="lsf-dark-pink o-0">Share on Twitter</span>
  </a> -->
  

  <a href="mailto:?subject=<?php echo $titleShare . '&body=' . $urlShare; ?>" target="_blank">
    <svg viewbox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
      <path d="M101.3 141.6v228.9h0.3 308.4 0.8V141.6H101.3zM375.7 167.8l-119.7 91.5 -119.6-91.5H375.7zM127.6 194.1l64.1 49.1 -64.1 64.1V194.1zM127.8 344.2l84.9-84.9 43.2 33.1 43-32.9 84.7 84.7L127.8 344.2 127.8 344.2zM384.4 307.8l-64.4-64.4 64.4-49.3V307.8z"></path>
    </svg>
    <span class="lsf-dark-pink o-0">Share via Email</span>
  </a>

	<button onclick="window.print()" class="anchor mt4 print-button top flex items-center no-print">
							<?php get_template_part('template-parts/content/print');?>
              <span class="lsf-dark-pink o-0">Print this recipe</span>

						</button>

</div>
