<?php
  namespace App;

  class AcfUp {

    function __construct() {
      
   
      
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