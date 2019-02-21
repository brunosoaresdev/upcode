<ul class="list-terms">
  <h3 class="title">Categorias:</h3>
  <?php
    $current_term = get_the_terms( $post->ID , 'ct-produto' );
    $current_term_id = $current_term[0]->term_id;
    $current_parent = $current_term[0]->parent;
    $current_parent_2 = $current_term[1]->parent;

    $post_type = 'produto';
    $taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );
    foreach( $taxonomies as $taxonomy ) :

    if ( $current_parent == 4 || $current_parent_2 == 4 ) :
      $args = array( 'taxonomy' => $taxonomy, 'hide_empty' => true, 'childless' => true, 'exclude' => 5 );
    else : 
      $args = array( 'taxonomy' => $taxonomy, 'hide_empty' => true, 'include' => [5],  );
    endif;
    
    $terms = get_terms($args);
    foreach( $terms as $term ) :
  ?>
    <li>
      <h4 class="term-name"><?php echo $term->name; ?></h4>
      <?php
        $args = array(
          'post_type' => $post_type,
          'posts_per_page' => -1,
          'orderby' => 'title',
          'order' => 'ASC',
          'tax_query' => array(
            array(
              'taxonomy' => $taxonomy,
              'field' => 'slug',
              'terms' => $term->slug,
            )
          )
        );
        $products = new WP_Query($args);     
        while ( $products->have_posts() ) : $products->the_post(); 
      ?>
        <a href="<?php the_permalink(); ?>" class="product"><?php the_title(); ?></a>
      <?php endwhile; wp_reset_postdata(); ?>
    </li>   
  <?php
    endforeach;   
    endforeach;
  ?>
</ul>