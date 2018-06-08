<?php

// Configura o framework
require_once ('functions/setup.php');

// Configura as funções relacionadas ao painel de admin do wp
require_once ('functions/wp-admin.php');

// Define as funções gerais
require_once ('functions/bfriend.php');

// Define as funções gerais do acf
require_once ('functions/bfriend-acf.php');

// Define as funções personalizadas
require_once ('functions/bfriend-functions.php');

// Define as funções sociais
require_once ('functions/opcionais.php');

// Define as funções de menu
// require_once ('functions/bs4navwalker.php');
require_once ('functions/wp_bootstrap_navwalker.php');

// Registra custom posts
// require_once ('includes/cpt-arquivos.php');