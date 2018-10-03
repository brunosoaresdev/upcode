<?php

// add custom thumb sizes
	add_action('init', 'add_custom_image_sizes');
  function add_custom_image_sizes() {
    add_image_size('slide', 1920, 450, true);
    add_image_size('post-thumb', 1140, 450, true);
  }


// Muda os labels do post
/* add_action( 'init', 'change_post_object_label' );
   add_action( 'admin_menu', 'change_post_menu_label' );

function change_post_menu_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'Cases';
  $menu[5][6] = '';
  $submenu['edit.php'][5][0] = 'Cases';
  $submenu['edit.php'][10][0] = 'Adcionar Cases';
  $submenu['edit.php'][16][0] = 'Novas Tags';
  echo '';
}
function change_post_object_label() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'Cases';
  $labels->singular_name = 'Case';
  $labels->add_new = 'Adcionar Case';
  $labels->add_new_item = 'Adcionar Novo Case';
  $labels->edit_item = 'Editar Case';
  $labels->new_item = 'Cases';
  $labels->view_item = 'Visualizar Case';
  $labels->search_items = 'Pesquisar Cases';
  $labels->not_found = 'Nenhum Case Encontrado';
  $labels->not_found_in_trash = 'Nenhum Case Encontrado Na Lixeira';
}
*/