<?php
  global $acfInstance;
  if( have_rows( 'repeater_slide','option' ) ):
?>
  <div id="slideshow" class="banner">
    <?php
      while ( have_rows( 'repeater_slide','option' ) ) : the_row();
      if( get_sub_field( 'slide_link' ) ): echo '<a href="' . get_sub_field( 'slide_link' ) . '"  class="btn-slide">'; endif;
    ?>
      <div class="banner-mask" <?php $acfInstance->thumb_bg( 'slide_image', 'sub' ); ?>>
        <div class="container">
          <div class="row w-100">
            <div class="col-md-5 mr-auto">
              <?php the_sub_field( 'slide_description' ); ?>
            </div>
          </div>
        </div>
      </div>
    <?php
      if( get_sub_field( 'slide_link' ) ): echo '</a>';
      endif;
      endwhile;
    ?>
  </div>
<?php endif; ?>