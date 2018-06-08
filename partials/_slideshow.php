<?php if( have_rows('repeater_slide',get_option( 'page_on_front' )) ): ?>
  <article id="slideshow" role="banner">
    <div class="banner">
      <?php
        while ( have_rows('repeater_slide',get_option( 'page_on_front' )) ) : the_row();
        $image = get_sub_field('slide_image');
        $url = $image['url'];
        $size = 'slide';
        $thumb = $image['sizes'][ $size ];
      ?>
        <div>
          <div class="banner-mask">
            <?php
              if( get_sub_field('slide_title') ):
                echo '<h4>' . get_sub_field('slide_title') . '</h4>';
              endif;
              if( get_sub_field('slide_description') ):
                echo '<p>' . get_sub_field('slide_description') . '</p>';
              endif;
              if( get_sub_field('slide_link') ):
                echo '<a href="' . get_sub_field('slide_link') . '">Leia mais...</a>';
              endif;
            ?>
          </div>
          <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="img-fluid" />
        </div>
      <?php endwhile; ?>
    </div>
  </article>
<?php endif; ?>