<?php
  if ( is_singular('post') || is_home() ) :
    $src = wp_get_attachment_image_src( get_post_thumbnail_id(6), 'h-page' );
    if ( !empty($src)) : $bg  = 'style="background-image: url(<?php echo $src[0]; ?>);"';
    else : $bg = 'no-bg';
    endif;
  endif;
?>
<div class="h-page d-flex flex-column justify-content-end pb-4 mb-4" <?php if ( is_singular('post') || is_home() ) : echo $bg; else : thumbnail_bg( 'h-page' ); endif; ?>>
  <div class="container">
    <?php
      if ( function_exists('yoast_breadcrumb') ) :
        echo '<div class="bread">',
          yoast_breadcrumb(' <p id="breadcrumbs">','</p> ');
        echo '</div>';
      endif;

      if (is_home() || is_singular('post')) : echo '<h2>Blog</h2>';
      else : the_title('<h2>', '</h2>');
      endif;
    ?>
  </div>
</div>