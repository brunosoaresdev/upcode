<?php
/**
 * Filter Yoast Meta Priority
 *
 * @since Bfriend 4.0
 */
/* -------------------------------------------------- */
function lower_wpseo_priority( $html ) { return 'low'; }
add_filter( 'wpseo_metabox_prio', 'lower_wpseo_priority' );

/* WP-LOGIN */
/* ----------------------------------------- */
// Call wp-login Styles
add_action( 'login_head', 'wpmidia_custom_login' );
// Change URL logotype
add_filter('login_headerurl', 'wpmidia_custom_wp_login_url');
// Change title logotype
add_filter('login_headertitle', 'wpmidia_custom_wp_login_title');
function wpmidia_custom_login() {
    echo '<link media="all" type="text/css" href="'.get_template_directory_uri().'/assets/css/_login-style.css" rel="stylesheet">';
    $logotipoID = get_post_meta(get_option( 'page_on_front' ), 'logotipo', 1);
    if ($logotipoID) {
    ?>
      <style type="text/css" media="screen">
        body.login h1 a {
          background-image: url(<?php echo wp_get_attachment_url($logotipoID); ?>);
          background-size: contain;
          background-position: center center;
        }
      </style>
    <?php
    }
}
function wpmidia_custom_wp_login_url() {
  return home_url();
}
function wpmidia_custom_wp_login_title() {
  return get_option('blogname');
}
/* ----------------------------------------- WP-LOGIN */

/* Mudar Icone dos Menus do WP */
/* ----------------------------------------- */
// Pegar o unicode na url -> http://fontawesome.bootstrapcheatsheets.com/
// add_action('admin_head', 'fontawesome_icon_dashboard');
function fontawesome_icon_dashboard() {
   echo "<style type='text/css' media='screen'>
      #adminmenu #menu-posts-produto div.wp-menu-image:before { font-family:'FontAwesome' !important; content:'\\f0a4'; }
   </style>";
}
/* ----------------------------------------- Mudar Icone do CPT */


/* Desativa os widgets padrões do dashboard */
/* ----------------------------------------- */
function disable_default_dashboard_widgets() {
  remove_meta_box('dashboard_browser_nag', 'dashboard', 'core');
  remove_meta_box('dashboard_right_now', 'dashboard', 'core');
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
  remove_meta_box('dashboard_plugins', 'dashboard', 'core');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
  remove_meta_box('dashboard_primary', 'dashboard', 'core');
  remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

/* Carrega Arquivos CSS no Admin */
/* ----------------------------------------- */
function load_custom_wp_admin_style() {
  wp_register_style( 'custom_wp_admin_css', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/_admin-style.css', false, '1.0.0' );
  wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/* Adiciona o ID do usuário no body-class */
/* ----------------------------------------- */
function id_usuario_body_class( $classes ) {
  global $current_user;
    $classes .= ' user-' . $current_user->ID;
  return trim( $classes );
}
add_filter( 'admin_body_class', 'id_usuario_body_class' );

/* tinymce */
/* ----------------------------------------- */
add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats' ); 
function tiny_mce_remove_unused_formats($init) {
  // Add block format elements you want to show in dropdown
  // $init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6';
  return $init;
}

function my_mce4_options($init) {
  $default_colours = '"000000", "Black",
                      "993300", "Burnt orange",
                      "333300", "Dark olive",
                      "003300", "Dark green",
                      "003366", "Dark azure",
                      "000080", "Navy Blue",
                      "333399", "Indigo",
                      "333333", "Very dark gray",
                      "800000", "Maroon",
                      "FF6600", "Orange",
                      "808000", "Olive",
                      "008000", "Green",
                      "008080", "Teal",
                      "0000FF", "Blue",
                      "666699", "Grayish blue",
                      "808080", "Gray",
                      "FF0000", "Red",
                      "FF9900", "Amber",
                      "99CC00", "Yellow green",
                      "339966", "Sea green",
                      "33CCCC", "Turquoise",
                      "3366FF", "Royal blue",
                      "800080", "Purple",
                      "999999", "Medium gray",
                      "FF00FF", "Magenta",
                      "FFCC00", "Gold",
                      "FFFF00", "Yellow",
                      "00FF00", "Lime",
                      "00FFFF", "Aqua",
                      "00CCFF", "Sky blue",
                      "993366", "Red violet",
                      "FFFFFF", "White",
                      "FF99CC", "Pink",
                      "FFCC99", "Peach",
                      "FFFF99", "Light yellow",
                      "CCFFCC", "Pale green",
                      "CCFFFF", "Pale cyan",
                      "99CCFF", "Light sky blue",
                      "CC99FF", "Plum"';

  $custom_colours =  '"E14D43", "Color 1 Name",
                      "D83131", "Color 2 Name",
                      "ED1C24", "Color 3 Name",
                      "F99B1C", "Color 4 Name",
                      "50B848", "Color 5 Name",
                      "00A859", "Color 6 Name",
                      "00AAE7", "Color 7 Name",
                      "282828", "Color 8 Name"';

  // build colour grid default+custom colors
  $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';

  // enable 6th row for custom colours in grid
  $init['textcolor_rows'] = 6;

  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');
/* ----------------------------------------- tinymce */ 

/* Allow upload extra filetypes */
/* ----------------------------------------- */
function my_extra_upload_files($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'my_extra_upload_files');
/* ----------------------------------------- Allow upload extra filetypes */    
