<?php

  /* ----------------------------------------------------- */
  /* Criando Custom Post Type */
  /* ----------------------------------------------------- */
  add_action( 'init', 'register_cpt_produto' );

  function register_cpt_produto() {
    $labels = array(
      'name' => _x( 'Produtos', 'upcode' ),
      'singular_name' => _x( 'Produto', 'upcode' ),
      'add_new' => _x( 'Adicionar novo', 'upcode' ),
      'add_new_item' => _x( 'Adicionar novo produto', 'upcode' ),
      'edit_item' => _x( 'Editar produto', 'upcode' ),
      'new_item' => _x( 'Novo produto', 'upcode' ),
      'view_item' => _x( 'Ver produto', 'upcode' ),
      'search_items' => _x( 'Buscar produto', 'upcode' ),
      'not_found' => _x( 'Nenhum produto encontrado', 'upcode' ),
      'not_found_in_trash' => _x( 'Nenhum produto encontrado no Lixo', 'upcode' ),
      'parent_item_colon' => _x( 'Parent produto:', 'upcode' ),
      'menu_name' => _x( 'Produtos', 'upcode' ),
    );

    $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'taxonomies' => array( 'ctproduto' ),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-admin-generic',
      'show_in_nav_menus' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'supports' => [
        'title', 
        'editor', 
        'thumbnail'
      ]
    );
    register_post_type( 'produto', $args );

    // Registrando Taxonomia
    $labels = array(
      'name' => _x( 'Categorias produtos', 'taxonomy general name' ),
      'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
      'search_items' =>  __( 'Buscar Types' ),
      'all_items' => __( 'Todas Tags' ),
      'parent_item' => __( 'Parent Tag' ),
      'parent_item_colon' => __( 'Parent Tag:' ),
      'edit_item' => __( 'Editar Tags' ),
      'update_item' => __( 'Atualizar Tag' ),
      'add_new_item' => __( 'Adicionar nova categoria' ),
      'new_item_name' => __( 'Novo nome de tag' ),
    );
    register_taxonomy('ctproduto',array('produto'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'query_var' => true,
    ));
  }