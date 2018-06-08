<?php

/* Carrega Arquivos JS do tema */
/* ----------------------------------------- */
function upcode_loadJS(){
  if (!is_admin()){
		// desregistrando o jquery nativo e registrando o do CDN do Google.
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, '3.2.1');
		wp_enqueue_script('jquery');

		$js = get_template_directory_uri() . '/assets/js/';
		wp_enqueue_script('propper',				'//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', ['jquery']);
		wp_enqueue_script('bootstrap-min',	'//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js', ['jquery','propper']);
		wp_enqueue_script('fancybox',				'//cdn.rawgit.com/fancyapps/fancybox/master/dist/jquery.fancybox.min.js', ['jquery']);
		wp_enqueue_script('slick',					'//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js', ['jquery']);
		wp_enqueue_script('fontawesome',		'//use.fontawesome.com/releases/v5.0.8/js/all.js', ['jquery']);
		wp_enqueue_script('v4-shims',				'//use.fontawesome.com/releases/v5.0.8/js/v4-shims.js', ['jquery']);

		wp_enqueue_script('offcanvas',		$js . 'bootstrap.offcanvas.min.js', ['jquery']);
		wp_enqueue_script('acf-maps', 		$js . 'maps.js', ['jquery']);
		wp_enqueue_script('mask', 				$js . 'jquery.mask.min.js', ['jquery']);
		wp_enqueue_script('codigo', 			$js . 'codigo.js', ['jquery']);
  }
}
add_action( 'wp_print_scripts', 'upcode_loadJS' );


/* Carrega Arquivos CSS do tema */
/* ----------------------------------------- */
function upcode_loadCSS(){
	$css = get_template_directory_uri() . '/assets/css/';
	wp_enqueue_style( 'offcanvas', 			$css . '_bootstrap.offcanvas.css' );
	wp_enqueue_style( 'fancybox', 			'//cdn.rawgit.com/fancyapps/fancybox/60c37246/dist/jquery.fancybox.min.css' );
	wp_enqueue_style( 'slick', 					'//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css' );
	wp_enqueue_style( 'slick-theme', 		'//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css' );
	wp_enqueue_style( 'slick-loader', 	'//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/ajax-loader.gif' );
	wp_enqueue_style( 'awesome', 				'//use.fontawesome.com/releases/v5.0.6/css/all.css' );
}
add_action('wp_enqueue_scripts', 'upcode_loadCSS');


// Avisa ao Wordpress para executar a função upcode_setup() quando o 'after_setup_theme' hook roda.
add_action( 'after_setup_theme', 'upcode_setup' );

if ( ! function_exists( 'upcode_setup' ) ):
	// Configura os padrões do tema e suporte a algumas funções do wp.
	function upcode_setup() {
		// Ativa o editor-style.css
		add_editor_style('assets/css/editor-style.css');

		// Ativa a imagem destacada
		add_theme_support( 'post-thumbnails' );

		// Registers theme menu's 
		register_nav_menus( array(
			'global' => __( 'Navegação Global', 'partner-programmer' ),
			'local' => __( 'Navegação Local', 'partner-programmer' ),
		) );
	}
endif;


/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'twentyten' ),
		'id' => 'sidebar-principal',
		'description' => __( 'Arraste os itens desejados até aqui. ', 'twentyten' ),
		'before_widget' => '<div class="widget %2$s" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyten_widgets_init' );


/* Adiciona editor se usuário for editor no body-class */
/* --------------------------------------------------- */
function role_user_body_class( $classes ) {
	if( current_user_can('editor') ) { $classes .= ' editor'; }
  return trim( $classes );
}
add_filter( 'admin_body_class', 'role_user_body_class' );

/* Cria páginas ao instalar o tema */
/* ----------------------------------------- */
// programmatically create some basic pages, and then set Home and Blog
// setup a function to check if these pages exist
function the_slug_exists($post_name) {
	global $wpdb;
	if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
		return true;
	} else {
		return false;
	}
}

$paginas = [
	// [Title, Content, 'Slug']
	['Home', '', 'home'],
	['Blog', '', 'blog'],
	['Institucional', '', 'institucional'],
	['Contato', '', 'contato'],
];
// Cria as páginas
if (isset($_GET['activated']) && is_admin()){
	foreach ($paginas as $pagina) {
		$page_check = get_page_by_title($pagina[0]);
		if(!isset($page_check->ID) && !the_slug_exists($pagina[2])){
		    $newPageId = wp_insert_post(array(
		    	'post_type' => 'page',
		    	'post_title' => $pagina[0],
		    	'post_content' => $pagina[1],
		    	'post_status' => 'publish',
		    	'post_author' => 1,
		    	'post_slug' => $pagina[2]
		    ));
		    if ($pagina[0] == 'Home') { update_option( 'page_on_front', $newPageId ); update_option( 'show_on_front', 'page' ); }
		    if ($pagina[0] == 'Blog') { update_option( 'page_for_posts', $newPageId ); }
		}
	}
}
/* ----------------------------------------- Cria páginas ao instalar o tema */