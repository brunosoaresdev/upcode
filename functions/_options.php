<?php

  // add custom thumb sizes
	add_action('init', 'add_custom_image_sizes');
  function add_custom_image_sizes() {
    add_image_size('slide', 1920, 600, true);
    add_image_size('post-thumb', 1140, 450, true);
    add_image_size('product', 263, 390, true);
    add_image_size('post-big', 555, 560, true);
    add_image_size('post-ret', 555, 280, true);
    add_image_size('post-small', 263, 120, true);
    add_image_size('post-box', 250, 140, true);
  }