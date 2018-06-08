<?php

  /* ----------------------------------------------------- */
  /* Criando Custom Post Type */
  /* ----------------------------------------------------- */
  add_action( 'init', 'register_cpt_arquivo' );

  function register_cpt_arquivo() {
    $labels = array(
      'name' => _x( 'Arquivo', 'bfriend' ),
      'singular_name' => _x( 'Arquivo', 'bfriend' ),
      'add_new' => _x( 'Adicionar novo', 'bfriend' ),
      'add_new_item' => _x( 'Adicionar novo arquivo', 'bfriend' ),
      'edit_item' => _x( 'Editar arquivo', 'bfriend' ),
      'new_item' => _x( 'Novo arquivo', 'bfriend' ),
      'view_item' => _x( 'Ver arquivo', 'bfriend' ),
      'search_items' => _x( 'Buscar arquivo', 'bfriend' ),
      'not_found' => _x( 'Nenhum arquivo encontrado', 'bfriend' ),
      'not_found_in_trash' => _x( 'Nenhum arquivo encontrado no Lixo', 'bfriend' ),
      'parent_item_colon' => _x( 'Parent arquivo:', 'bfriend' ),
      'menu_name' => _x( 'Arquivos', 'bfriend' ),
    );

    $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'taxonomies' => array( 'ct-arquivo' ),
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
        'thumbnail',
        // 'excerpt',
        // 'custom-fields',
        // 'trackbacks',
        // 'comments',
        // 'author', 
        // 'revisions',
        // 'page-attributes',
        // 'post-formats'
      ]
    );
    register_post_type( 'arquivo', $args );

    // Registrando Taxonomia
    $labels = array(
      'name' => _x( 'Categorias Arquivos', 'taxonomy general name' ),
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
    register_taxonomy('ctarquivo',array('arquivo'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'query_var' => true,
    ));
  }