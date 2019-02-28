<?php
  // suporte of title
  add_theme_support( 'title-tag' );

  function _partials($file) { include UP_PARTIALS_PATH . $file.'.php'; }
  function _loop($file) { include UP_LOOP_PATH . $file.'.php'; }

  /* limit number characters to the_content
  /* mode of use <?= content(10); ?> */
  /* ----------------------------------------- */
    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      }
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content);
      $content = str_replace(']]>', ']]&gt;', $content);
      return strip_tags($content);
    }
  /* ----------------------------------------- Limit number characters to the_content */

  /* thumbnail background
  /* mode of use <idv id="topo" <?php thumbnail_bg( 'top-page' ); ?>> */
    function thumbnail_bg ( $tamanho = 'full' ) {
      global $post;
      $get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $tamanho, false, '' );
      if ($get_post_thumbnail) {
        echo 'style="background-image: url('.$get_post_thumbnail[0].' );"';
      } else if ($post->post_parent > 0 ) {
        $get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->post_parent), $tamanho, false, '' );
        echo 'style="background-image: url('.$get_post_thumbnail[0].' );"';
      } {
        echo "no-bg";
      }
    }
  /* ----------------------------------------- Thumbnail background */

  /* remove http or wwww
  /* -------------------------------------------------- */
    function clear_url($input) {
      $input = trim($input, '/');
      if (!preg_match('#^http(s)?://#', $input)) {
        $input = 'http://' . $input;
      }
      $urlParts = parse_url($input);
      $domain = preg_replace('/^www\./', '', $urlParts['host']);
      return $domain;
    }
  /* ----------------------------------------- Thumbnail background */

    
  // get url of image
  function images_url($file) { echo get_stylesheet_directory_uri() . '/assets/images/'. $file; }

  // get url of image
  function get_images_url($file) { return get_stylesheet_directory_uri() . '/assets/images/'. $file; }

  /* custom comments
  /* ----------------------------------------- */
    function mytheme_comment($comment, $args, $depth) {
      $GLOBALS['comment'] = $comment;
      extract($args, EXTR_SKIP);

      if ( 'div' == $args['style'] ) :
        $tag = 'div';
        $add_below = 'comment';
      else :
        $tag = 'li';
        $add_below = 'div-comment';
      endif;
      
      echo $tag;
    ?>
      <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
      <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body row">
      <?php endif; ?>
      <div class="comment-author col-sm-3">
        <figure><?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?></figure>
        <div class="box-title">
          <?php 
            printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() );
            $d = "d M, Y";
            $comment_date = get_comment_date( $d, $comment->comment_ID );
            echo '<span class="date">' . $comment_date . '</span>';
            comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); 
          ?>
        </div>
      </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br />
      <?php endif; ?>
      <div class="comment-meta commentmetadata col-sm-9">
        <?php comment_text(); ?>
      </div>
      <?php if ( 'div' != $args['style'] ) : ?>
      </div>
      <?php endif; ?>
    <?php
    }
  /* ----------------------------------------- Custom comments */

  /* related posts
  /* ----------------------------------------- */
    function upcodeRelated($args = []) { 
      global $post;
      $postTypeObj = get_post_type_object($post->post_type);    
      $taxonomies = isset($args['taxonomies']) ? $args['taxonomies'] : $postTypeObj->taxonomies;
      
      $defaultargsQuery = $argsQuery = array(       
        'post__not_in' => array($post->ID), 
        'post_type' => $post->post_type,
        'posts_per_page' => (isset($args['posts_per_page']) ? $args['posts_per_page'] : 3), 
      );

      $terms = wp_get_post_terms($post->ID, $taxonomies, ['fields' => 'ids']);
      $argsQuery['tax_query'] = [ [
        'taxonomy' => $taxonomies[0],
        'field' => 'term_id',
        'terms' => $terms
      ] ];

      $relatedPostsQuery = new WP_Query($argsQuery);
      if (!$relatedPostsQuery->have_posts()) { $relatedPostsQuery = new WP_Query($defaultargsQuery); } 

      if( $relatedPostsQuery->have_posts() ) {
        echo '<div id="post-relacionados">',
          '<h4 class="title"><i></i>'.(isset($args['title']) ? $args['title'] : 'Leia Também:').'</h4>',
          '<div class="items">';                      
            while ( $relatedPostsQuery->have_posts() ) : $relatedPostsQuery->the_post();
              get_template_part( 'contents', '_loop' );
            endwhile;
        echo '</div>',
        '</div>';
      }
      wp_reset_query(); 
    }
  /* ----------------------------------------- Custom comments */

  /* responsives embeds on the_content
  /* ----------------------------------------- */
    add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);
    function wrap_embed_with_div($html, $url, $attr) {
      return "<div class=\"embed-container\">".$html."</div>";
    }
  /* ----------------------------------------- Responsives embeds on the_content */

  /* default gallery */
  /* ----------------------------------------- */
    remove_shortcode('gallery');
    add_shortcode('gallery', 'pp_default_gallery');

    function pp_default_gallery($atts) {
      global $post;
      $pid = $post->ID;
      $gallery = '<div class="gallery">';
      if (empty($pid)) {$pid = $post['ID'];}
      extract(shortcode_atts(array('ids' => ''), $atts));    

      $args = array(
        'post_type' => 'attachment', 
        'post__in' => explode(",",$ids),
        'post_mime_type' => 'image', 
        'numberposts' => -1
      );  

      $images = get_posts($args);
      
      foreach ( $images as $image ) {      
        $thumbnail = wp_get_attachment_image_src($image->ID, 'post-gallery');
        $thumbnail = $thumbnail[0];
        $gallery .= "
        <figure href='".$image->guid."' data-caption='".$image->post_title."' data-fancybox='galeria-".$ids."'>
          <img class='img-fluid' src='".$thumbnail."'>
          <figcaption>
            <p class='img-title'>".$image->post_title." <br> <small>".$image->post_excerpt."</small></p>          
          </figcaption>
        </figure>";
      }
      $gallery .= '</div>';
      return $gallery;
    }
  /* ----------------------------------------- default gallery */ 

  /* wp pagenavi with bootstrap */
  /* ----------------------------------------- */
  function wiaw_pagenavi_to_bootstrap($html) {
      $out = '';
      $out = str_replace('<div','',$html);
      $out = str_replace('class=\'wp-pagenavi\' role=\'navigation\'>','',$out);
      $out = str_replace('<a','<li class="page-item"><a class="page-link"',$out);
      $out = str_replace('</a>','</a></li>',$out);
      $out = str_replace('<span aria-current=\'page\' class=\'current\'','<li aria-current="page" class="page-item active"><span class="page-link current"',$out);
      $out = str_replace('<span class=\'pages\'','<li class="page-item"><span class="page-link pages"',$out);
      $out = str_replace('<span class=\'extend\'','<li class="page-item"><span class="page-link extend"',$out);  
      $out = str_replace('</span>','</span></li>',$out);
      $out = str_replace('</div>','',$out);
      return '<ul class="pagination" role="navigation">'.$out.'</ul>';
  }
  add_filter( 'wp_pagenavi', 'wiaw_pagenavi_to_bootstrap', 10, 2 );
  /* ---------- WP_PAGENAVI with Bootstrap */ 

  /* remove width fixed the images with subtitle on .hentry */
  /* ----------------------------------------- */
    add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
    add_shortcode('caption', 'fixed_img_caption_shortcode');
    function fixed_img_caption_shortcode($attr, $content = null) {
      // New-style shortcode with the caption inside the shortcode with the link and image tags.
      if ( ! isset( $attr['caption'] ) ) {
        if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
          $content = $matches[1];
          $attr['caption'] = trim( $matches[2] );
        }
      }

      // Allow plugins/themes to override the default caption template.
      $output = apply_filters('img_caption_shortcode', '', $attr, $content);
      if ( $output != '' )
        return $output;

      extract(shortcode_atts(array(
        'id'    => '',
        'align'   => 'alignnone',
        'width'   => '',
        'caption' => ''
      ), $attr));

      if ( 1 > (int) $width || empty($caption) )
        return $content;

      if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

      return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: auto">'
      . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
    }
  /* ----------------------------------------- Remove width fixo de imagens com legenda no .hentry */ 
