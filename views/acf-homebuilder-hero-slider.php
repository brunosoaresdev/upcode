<?php
  echo '<section class="hero-slider-row">';
  echo '<div class="container">';
  echo '<div class="slick-slider clearfix">';
  
  if ( have_rows( 'slides' ) ) :
    while ( have_rows( 'slides' ) ) : the_row();
      // Repeater Variables - need to be listed inside 'while have rows'
      
      $slides                       = get_sub_field( 'slides' );
      $hero_slider_image            = get_sub_field( 'hero_slider_image' );
      $hero_slider_image_url        = $hero_slider_image['sizes']['hero-slide']; // Use custom image size
      $hero_slider_caption          = get_sub_field( 'hero_slider_caption' );
      $hero_slider_button           = get_sub_field( 'hero_slider_button' );
      $hero_slider_caption_position = get_sub_field( 'hero_slider_caption_position' );
      $hero_slider_lightbox         = get_sub_field( 'hero_slider_lightbox' );
      
      echo '<div class="hero-slide">';
      // printf( '<img src="%s" />', $hero_slider_image_url );
      printf( '<img data-lazy="%s" />', $hero_slider_image_url );
      
      if ( $hero_slider_caption ) {
        ?>
				<div class="hero-slider-caption hero-caption-<?php echo $hero_slider_caption_position; ?>">
          <?php
            echo $hero_slider_caption;
            if ( $hero_slider_button ) {
              ?>
							<a href="<?php echo $hero_slider_button['url']; ?>"
                 <?php if ( $hero_slider_lightbox ):echo 'data-featherlight="iframe" data-featherlight-iframe-width="853" data-featherlight-iframe-height="480"'; endif; ?>class="btn"><?php echo $hero_slider_button['text']; ?></a>
            <?php }
          ?>
				</div>
      <?php }
      ?>
			</div>
    <?php
    
    endwhile;
  endif;
  echo '</div>';
  echo '</div>';
  echo '</section>';