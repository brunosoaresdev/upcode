<section class="blog-mansory">
  <div class="container">
    <ul class="list-blog">
      <?php
        $counter = 1;
        $total_posts = $wp_query->found_posts;
        while ( have_posts() ): the_post();

        $sizer = 'post-big';
        $class = 'post loop';
        $chars = 22;
        
        if ( $counter > 1 and $counter < 5 ) :
          $class = 'post loop';
          $sizer = 'post-thumb';
          $chars = 33;

        elseif ( $counter === 5 ) :
          $class = 'post loop';
          $sizer = 'post-thumb';
          $chars = 55;
        
        elseif ( $counter  > 5 and $counter < 8 ) :
          $class = 'post loop';
          $sizer = 'post-ret';
          $chars = 55;

        elseif ( $counter > 5 ) :
          $class = 'post loop';
          $sizer = 'post-box';
          $chars = 40;
        endif;

        $odd = (($counter % 2) == 0) ? 'even' : 'odd';
        $class .= ' '.$odd;
        if($total_posts < 5):
        if ($counter == 1) : echo '<div class="first">'; $src = get_the_post_thumbnail_url(get_the_ID(),'post-big');
        elseif ($counter == 2) : echo '</div><div class="second">';
        elseif ($counter == 4) : echo '</div>'; endif;
        else:
          if ($counter == 1) : echo '<div class="first">'; $src = get_the_post_thumbnail_url(get_the_ID(),'post-big');
          elseif ($counter == 2) : echo '</div><div class="second">';
          elseif ($counter == 5) : echo '</div><div class="third">';
          elseif ($counter == 8) : echo '</div><div class="fourth">';
          endif;
        endif;
      ?>
        <li>
          <article data-order="<?=$counter;?>" <?php post_class( $class ); ?> style="<? if(has_post_thumbnail()) : if($counter===1) : ?> background-image: url('<?= $src; ?>'); <? endif;else: ?>background-image: url('<?=images_url('sem-imagem.png');?>');<?php endif;?>">
            <a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>" class="masked d-flex flex-column">
              <?php the_title( '<span class="post-title mb-2">', '</span>' ); ?>
              <? if( $counter===1 ) : ?>
                <div class="content">
                  <p><?= content( $chars); ?></p>
                </div>
              
              <?php elseif ( $counter===5 ) : ?>
                <div class="content">
                  <p><?= content( $chars); ?></p>
                </div>
                <figure><?php the_post_thumbnail( $sizer, array( 'class' => 'img-fluid' ) ); ?></figure>

              <?php else: if ( has_post_thumbnail() ):?>
                <figure><?php the_post_thumbnail( $sizer, array( 'class' => 'img-fluid' ) ); ?></figure>
              
              <?php else: ?>
                <div class="content">
                  <p><?= content( $chars); ?></p>
                </div>
              <?php endif; endif; ?>
            </a>
            <span class="cat"><? the_category( ', ' ); ?> · <?php echo get_the_date( 'd F Y' ); ?></span>
          <? if($counter===1) : ?> <div class="mask"></div><? endif;?>
          </article>
        </li>
      <?
        $counter ++;
        endwhile;
      ?>
    </ul>
  </div>
</section>