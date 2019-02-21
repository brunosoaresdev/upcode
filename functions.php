<?php
use App\AcfUp;

require_once ('vendor/autoload.php'); // uncomment this line if you want to use composer
//WP_Dependency_Installer::instance()->run( __DIR__ );

// Defines funcionts of the framework
require_once ('functions/_setup.php');
require_once ('functions/_custom.php');
require_once ('functions/_navwalker.php');

// Defines functions about wp-admin
require_once ('functions/_admin.php');

// Defines custom functions
require_once ('functions/_options.php');

// Register custom post type
// require_once ('cpt/cpt-product.php');
if(class_exists('ACF')){
    $acfInstance = new AcfUp();
    add_action('acf/init', [$acfInstance, 'api_maps']);
}