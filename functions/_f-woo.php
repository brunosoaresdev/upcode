<?php

  function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
  }
  add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

  add_action( 'after_setup_theme', 'yourtheme_setup' );
  function yourtheme_setup() {
    add_theme_support( 'wc-product-gallery-zoom' );
    // add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
  }

  add_filter('woocommerce_show_page_title', false);

  // customization woocommerce css
  add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
  
  add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );
  function wp_enqueue_woocommerce_style(){
    $css = get_template_directory_uri() . '/assets/css/';
    wp_register_style( 'woo', $css . 'woocommerce.css' );
    wp_enqueue_style( 'woo' );
  }

  // add the tag figure on loop woocommerce
  if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {   
    function woocommerce_get_product_thumbnail( $size = 'product-loop', $placeholder_width = 0, $placeholder_height = 0  ) {
      global $post, $woocommerce;
      $output = '<figure>';
      if ( has_post_thumbnail() ) : $output .= get_the_post_thumbnail( $post->ID, 'product' ); endif;
      $output .= '</figure>';
      return $output;
    }
  }

  add_filter('loop_shop_columns', 'loop_columns');
  if (!function_exists('loop_columns')) :
    function loop_columns() {
      if ( is_product_category() ) : return 3;
      else : return 4;
      endif;
    }
  endif;

  // change label button
  add_filter( 'woocommerce_product_add_to_cart_text', function () { return __('Ver Detalhes', 'woocommerce'); });
  add_filter( 'woocommerce_product_single_add_to_cart_text', function() { return __( 'Adicionar ao carrinho', 'woocommerce' ); });

  // remove tabs, and add product description on summary
  function remove_woocommerce_product_tabs( $tabs ) {
    unset( $tabs['description'] );
    unset( $tabs['reviews'] );
    unset( $tabs['additional_information'] );
    return $tabs;
  }
  add_filter( 'woocommerce_product_tabs', 'remove_woocommerce_product_tabs', 98 );
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
  add_action( 'woocommerce_single_product_summary', 'woocommerce_product_description_tab', 20 );


//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count',0);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering',30);

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 20 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
