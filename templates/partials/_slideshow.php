<?php if( have_rows('repeater_slide',get_option( 'page_on_front' )) ): ?>
  <div id="slideshow" class="banner">
    <?php while ( have_rows('repeater_slide',get_option( 'page_on_front' )) ) : the_row(); ?>
      <div class="banner-mask" <?php acf_sub_thumbnail_bg('slide_image'); ?>>
        <div class="container">
          <?php
            if( get_sub_field('slide_title') ):
              echo '<h2>' . get_sub_field('slide_title') . '</h2>';
            endif;
            if( get_sub_field('slide_description') ):
              echo '<p>' . get_sub_field('slide_description') . '</p>';
            endif;
            if( get_sub_field('slide_link') ):
              echo '<a href="' . get_sub_field('slide_link') . '"  class="btn-classic">Ver mais...</a>';
            endif;
          ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>