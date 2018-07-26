<?php

  /* key acf google maps
  /* ----------------------------------------- */
    function my_acf_init() {
      acf_update_setting('google_api_key', 'AIzaSyB1P-H_fyEh6IaGS_mdIAPnMUIiQhKON2s');
    }
    add_action('acf/init', 'my_acf_init');
  /* ----------------------------------------- key acf google maps */

  /* Taxonomy background
  /* ----------------------------------------- */
    function taxonomy_thumbnail_bg ( $nomeField ) {
      global $post;
      $queried_object = get_queried_object();
      $taxonomy = $queried_object->taxonomy;
      $term_id = $queried_object->term_id;

      if (get_field($nomeField, $queried_object)) : $src = get_field($nomeField, $queried_object);
      else : return;
      endif;
      
      echo 'style="background-image: url('. $src .' );"';
    }
  /* ----------------------------------------- Taxonomy background */

  /* Acf field backgound
  /* ----------------------------------------- */
    function acf_thumbnail_bg ( $nomeField ) {
      global $post;
      if (get_field($nomeField)) : $src = get_field($nomeField);
      else : return;
      endif;
      
      echo 'style="background-image: url('. $src .' );"';
    }
  /* ----------------------------------------- Acf field backgound */

  /* Acf sub_field backgound
  /* ----------------------------------------- */
    function acf_sub_thumbnail_bg ( $nomeField ) {
      global $post;
      if (get_sub_field($nomeField)) : $src = get_sub_field($nomeField);
      else : return;
      endif;
      
      echo 'style="background-image: url('. $src .' );"';
    }
  /* ----------------------------------------- Acf sub_field backgound */

  /* ACF page options
  /* ----------------------------------------- */
    $optionsPage = [
      /* (string) The title displayed on the options page. Required. */
      'page_title' => 'Opções',
      
      /* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
      'menu_title' => '',
      
      /* (string) The slug name to refer to this menu by (should be unique for this menu). 
      Defaults to a url friendly version of menu_slug */
      'menu_slug' => '',
      
      /* (string) The capability required for this menu to be displayed to the user. Defaults to edit_posts.
      Read more about capability here: http://codex.wordpress.org/Roles_and_Capabilities */
      'capability' => 'edit_posts',
      
      /* (int|string) The position in the menu order this menu should appear. 
      WARNING: if two menu items use the same position attribute, one of the items may be overwritten so that only one item displays!
      Risk of conflict can be reduced by using decimal instead of integer values, e.g. '63.3' instead of 63 (must use quotes).
      Defaults to bottom of utility menu items */
      'position' => 9,
      
      /* (string) The slug of another WP admin page. if set, this will become a child page. */
      'parent_slug' => '',
      
      /* (string) The icon url for this menu. Defaults to default WordPress gear */
      'icon_url' => false,
      
      /* (boolean) If set to true, this options page will redirect to the first child page (if a child page exists). 
      If set to false, this parent page will appear alongside any child pages. Defaults to true */
      'redirect' => true,
      
      /* (int|string) The '$post_id' to save/load data to/from. Can be set to a numeric post ID (123), or a string ('user_2'). 
      Defaults to 'options'. Added in v5.2.7 */
      'post_id' => 'options',
      
      /* (boolean)  Whether to load the option (values saved from this options page) when WordPress starts up. 
      Defaults to false. Added in v5.2.8. */
      'autoload' => false,
    ]; 

    if( function_exists('acf_add_options_page') ) {
      // acf_add_options_page($optionsPage);
    }
  /* ----------------------------------------- ACF page options */