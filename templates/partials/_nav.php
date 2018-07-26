<nav class="navbar navbar-expand-lg bsnav bsnav-light h-100">
  <button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
  <?php
    wp_nav_menu([
      'menu'            => 'principal',
      'theme_location'  => 'top',
      'container'       => 'div',
      'container_class' => 'collapse navbar-collapse justify-content-md-end',
      'menu_id'         => false,
      'menu_class'      => 'navbar-nav navbar-mobile mr-0',
      'depth'           => 3,
      'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
      'walker'          => new wp_bootstrap_navwalker()
    ]);
  ?>
</nav>
<div class="bsnav-mobile">
  <div class="bsnav-mobile-overlay"></div>
  <div class="navbar"></div>
</div>