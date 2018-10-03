<?php

  // customization woocommerce css
  add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
  add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );
  function wp_enqueue_woocommerce_style(){
    wp_register_style( 'upcode-woo', get_template_directory_uri() . '/assets/css/_woocommerce.css' );
    wp_register_style( 'upcode-woo-layout', get_template_directory_uri() . '/assets/css/_woocommerce-layout.css' );
    wp_enqueue_style( 'upcode-woo' );
    wp_enqueue_style( 'upcode-woo-layout' );
  }

