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
	<body <?php body_class(); ?>>
    <div class="preloader"><div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div></div>
    <h1 class="d-none"><?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?></h1>
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-9 col-md-3">
            <?php
              $logotipo = get_field( 'logotipo', 'option' );
              if ( !empty($logotipo) ) :
            ?>
              <a class="logotipo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo $logotipo; ?>" class="img-fluid change-color" /></a>
            <?php endif; ?>
          </div>
          <div class="col-3 col-md-9"><?php _partials('_nav'); ?></div>
        </div>
      </div>
    </header>