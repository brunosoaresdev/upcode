<?php

	/* load js files */
	/* ----------------------------------------- */
		function upcode_loadJS(){
			if (!is_admin()){
				// desregistrando o jquery nativo e registrando o do CDN do Google.
				wp_deregister_script('jquery');
					wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, '3.2.1');
				wp_enqueue_script('jquery');

				$js = get_template_directory_uri() . '/assets/js/';
				wp_enqueue_script('propper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', ['jquery']); 
				wp_enqueue_script('fancybox', '//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.min.js', ['jquery']);
				wp_enqueue_script('slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js', ['jquery']);
				wp_enqueue_script('fontawesome', '//use.fontawesome.com/releases/v5.7.2/js/all.js', ['jquery']);
				wp_enqueue_script('v4-shims', '//use.fontawesome.com/releases/v5.0.8/js/v4-shims.js', ['jquery']);
				wp_enqueue_script('maps', '//maps.googleapis.com/maps/api/js?key=AIzaSyB1P-H_fyEh6IaGS_mdIAPnMUIiQhKON2s', ['jquery']);

				wp_enqueue_script('acf-maps', $js . 'maps.js', ['jquery']);
				wp_enqueue_script('bootstrap-js', $js . 'bootstrap.min.js', ['jquery','propper']);
				wp_enqueue_script('bsnav', $js . 'bsnav.min.js', ['jquery']);
				wp_enqueue_script('mask', $js . 'jquery.mask.min.js', ['jquery']);
				wp_enqueue_script('main', $js . 'main.js', ['jquery']);
			}
		}
		add_action( 'wp_print_scripts', 'upcode_loadJS' );
	/* ----------------------------------------- load js files */

	/* load css files */
	/* ----------------------------------------- */
		function upcode_loadCSS(){
			$css = get_template_directory_uri() . '/assets/css/';
			wp_enqueue_style( 'fancybox', '//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.min.css' );
			wp_enqueue_style( 'f-awesome', '//use.fontawesome.com/releases/v5.0.6/css/all.css' );
		}
		add_action('wp_enqueue_scripts', 'upcode_loadCSS');
	/* ----------------------------------------- load css files */

	/* warn wordpress to run the function upcode_setup() when 'after_setup_theme' hook run */
	/* ----------------------------------------- */
		add_action( 'after_setup_theme', 'upcode_setup' );
		if ( ! function_exists( 'upcode_setup' ) ):
			function upcode_setup() {
				add_editor_style('assets/css/editor-style.css');
				add_theme_support( 'post-thumbnails' );
				register_nav_menus( array(
					'global' => __( 'Navegação Global', 'partner-programmer' ),
					'local' => __( 'Navegação Local', 'partner-programmer' ),
				) );
			}
		endif;
	/* ------------------ warn wordpress to run the function upcode_setup() when 'after_setup_theme' hook run */


	/* register widgetized areas, including two sidebars and four widget-ready columns in the footer.
	/* ----------------------------------------- */
		function twentyten_widgets_init() {
			register_sidebar( array(
				'name' => __( 'Sidebar', 'twentyten' ),
				'id' => 'sidebar-principal',
				'description' => __( 'Arraste os itens desejados até aqui. ', 'twentyten' ),
				'before_widget' => '<div class="widget %2$s" id="%1$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="title--widget">',
				'after_title' => '</h3>',
			) );
		}
		add_action( 'widgets_init', 'twentyten_widgets_init' );
	/* ----------------------------------------- */


	/* add editor on body-class if user is editor */
	/* --------------------------------------------------- */
		function role_user_body_class( $classes ) {
			if( current_user_can('editor') ) { $classes .= ' editor'; }
			return trim( $classes );
		}
		add_filter( 'admin_body_class', 'role_user_body_class' );
	/* --------------------------------------------------- add editor on body-class if user is editor */

	/* create pages on start theme */
	/* ----------------------------------------- */
		function the_slug_exists($post_name) {
			global $wpdb;
			if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
				return true;
			} else {
				return false;
			}
		}
		function createPagesifNotExists(){
			$paginas = [
				// [Title, Content, 'Slug']
				['title'=>'Home', 'content'=>'', 'slug'=>'home'],
				['title'=>'Blog', 'content'=>'', 'slug'=>'blog'],
				['title'=>'Institucional', 'content'=>'', 'slug'=>'institucional'],
				['title'=>'Contato', 'content'=>'', 'slug'=>'contato'],
			]; 
				foreach ($paginas as $pagina) {
					$page_check = get_page_by_title($pagina['title']);
					if(!isset($page_check->ID) && !the_slug_exists($pagina['slug'])){
							$newPageId = wp_insert_post(array(
								'post_type' => 'page',
								'post_title' => $pagina['title'],
								'post_content' => $pagina['content'],
								'post_status' => 'publish',
								'post_author' => 1,
								'post_slug' => $pagina['slug']
							));
							if ($pagina['title'] == 'Home') {
						 		update_option( 'page_on_front', $newPageId ); update_option( 'show_on_front', 'page' ); }
							if ($pagina['title'] == 'Blog') { update_option( 'page_for_posts', $newPageId ); }
					}
				}
		}
		add_action('after_setup_theme','createPagesifNotExists');

	 
	/* ----------------------------------------- create pages on start theme */