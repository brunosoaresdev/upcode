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
          <div class="col-md-4 mx-auto d-flex justify-content-center">
            <a class="logotipo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
              <img src="<?php echo get_field('logotipo', get_option( 'page_on_front' )); ?>" class="img-fluid" />
            </a>
          </div>
        </div>
      </div>
    </header>
    
    <div class="nav-full">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-2">
            <? get_template_part( 'templates/partials/_nav' ); ?>
          </div>

		        <div class="col-md-4 col-10 ml-md-auto d-flex justify-content-around align-items-center justify-content-md-between align-items-md-center flex-row flex-md-row ">
			        <div class="visitor">
					          <?php
					          if (is_user_logged_in()) {
						          $user = wp_get_current_user();

						          echo '<a href="'.wc_get_page_permalink('myaccount').'">Bem vindo, <strong>'.$user->display_name.'</strong></a><img src="'.images_url('person.png',0).'" class="img-fluid">';

					          } else {
						          ?>

										        <a href="<?php echo get_permalink(36); ?>">Entrar</a>
										        <a href="<?php echo get_permalink(119); ?>">Registre-se</a>

					          <?php } ?>
			        </div>

				        <?php
				        $cart_count = WC()->cart->get_cart_contents_count();
				        ?>
			        <div class="crate <?php echo ($cart_count > 0) ? "full" : "empty"; ?>">
				        <button class="no-btn" data-toggle="collapse" data-target="#col-search"><img src="<?=images_url('search.png',0);?>" class="img-fluid"></button>
				        <div id="col-search" class="collapse">
			              <?php echo do_shortcode('[yith_woocommerce_ajax_search]');?>
				        </div>
				        <a href="<?php echo wc_get_cart_url(); ?>" class="position-relative" style="background-image: url(<?=images_url('bag.png');?>);background-repeat: no-repeat;-webkit-background-size: cover;background-size: cover;">
			            <?php
						        if ($cart_count > 0) {
							        echo sprintf ( _n( '<span>%d</span>', '<span>%d</span>', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() );
						        } else {
							        echo '<span>0</span> ';
						        }
					        ?>
				        </a>
			        </div>


		        </div>
        </div>
      </div>
    </div>