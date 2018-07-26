<div class="h-page">
  <?
    if ( function_exists('yoast_breadcrumb') ) :
      echo '<div class="bread">',
        '<div class="container">';
          yoast_breadcrumb(' <p id="breadcrumbs">','</p> ');
        echo '</div>',
      '</div>';
    endif;

    if ( is_singular('post') || is_home() ) :
    $page_id = 6;
    $src = wp_get_attachment_image_src( get_post_thumbnail_id($page_id), 'topo-page' );
    $url = $src[0];
  ?>
  
  <figure style="background-image: url(<?php echo $url; ?>);">
  <?php else : ?>
  <figure <?php thumbnail_bg( 'page-top' ); ?>>
  <?php endif; ?>

    <div class="container">
      <?php
        if (is_home() || is_singular('post')) : echo '<h1>Blog</h1>';
        else : the_title('<h1>', '</h1>');
        endif;
      ?>
    </div><div class="mask"></div>
  </figure>
</div>