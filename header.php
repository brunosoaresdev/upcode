<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link href="<?php echo get_template_directory_uri()	?>/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php bloginfo('description'); ?>">

		<!-- google maps -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1P-H_fyEh6IaGS_mdIAPnMUIiQhKON2s"></script>
    <?php
			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
			wp_head();
		?>
	</head>
	<body <?php body_class('body-offcanvas'); ?>>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <a class="logotipo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
              <img src="<?php echo get_field('logotipo', get_option( 'page_on_front' )); ?>" class="img-fluid" />
            </a>
          </div>
          <div class="col-md-9">
            <?php get_template_part('partials/_social-links'); ?>
            <nav id="navbar" class="navbar  navbar-expand-lg navbar-dark">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle offcanvas-toggle pull-right d-sm-none" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                  <span class="sr-only">Toggle navigation</span>
                    <span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </span>
                </button>
              </div>
              <?php
                wp_nav_menu([
                  'menu'            => 'principal',
                  'theme_location'  => 'top',
                  'container'       => 'div',
                  'container_id'    => 'js-bootstrap-offcanvas',
                  'container_class' => 'navbar-offcanvas navbar-offcanvas-touch',
                  'menu_id'         => false,
                  'menu_class'      => 'navbar-nav mr-auto',
                  'depth'           => 2,
                  'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                  'walker'          => new wp_bootstrap_navwalker()
                ]);
              ?>
            </nav>
          </div>
        </div>
      </div>
    </header>