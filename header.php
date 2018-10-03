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
    <?php wp_head(); ?>
	</head>
	<body <?php body_class('body-offcanvas'); ?>>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-9 order-1 order-md-0">
            <a class="logotipo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
              <img src="<?php echo get_field('logotipo', get_option( 'page_on_front' )); ?>" class="img-fluid" />
            </a>
          </div>
          <div class="col-md-9 col-3 order-0 order-md-1">
            <? get_template_part( 'templates/partials/_nav' ); ?>
          </div>
        </div>
      </div>
    </header>