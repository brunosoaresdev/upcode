<?php

  class ACF {

    function __construct() {
      add_action('acf/init', [$this, 'api_maps']);
    }
    
    /* key acf google maps */
    public function api_maps() {
      acf_update_setting('google_api_key', 'AIzaSyB1P-H_fyEh6IaGS_mdIAPnMUIiQhKON2s');
    }

    /* background acf field */
    public function thumb_bg ( $fieldName, $type) {
      global $post;
      $queried_object = get_queried_object();

      if ( $type == 'taxonomy' ) {
        if (get_field($fieldName, $queried_object)) :
          $src = get_field($fieldName, $queried_object);
        else :
          return;
        endif;
        echo 'style="background-image: url('. $src .' );"';
      
      } elseif ( $type == 'field' ) {
        if (get_field($fieldName)) :
          $src = get_field($fieldName);
        else :
          return;
        endif;
        echo 'style="background-image: url('. $src .' );"';

      } elseif ( $type == 'sub' ) {
        if (get_sub_field($fieldName)) :
          $src = get_sub_field($fieldName);
        else :
          return;
        endif; 
        echo 'style="background-image: url('. $src .' );"';

      }
    }
  }

  $optionsPage = [
    'page_title' => 'Opções',
    'menu_title' => '',
    'menu_slug' => '',
    'capability' => 'edit_posts',
    'position' => 9,
    'parent_slug' => '',
    'icon_url' => false,
    'redirect' => true,
    'post_id' => 'options',
    'autoload' => false,
  ]; 
  if( function_exists('acf_add_options_page') ) {}