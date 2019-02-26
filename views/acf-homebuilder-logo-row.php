<?php 
echo '<section class="logo-row clearfix">';
echo'<div class="container"><div class="row">';
echo '<h3>' . $logo_title . '</h3>';
echo '<div class="col-md-12">';


if ( have_rows( 'acf_home_logo_images' ) ) :

while ( have_rows( 'acf_home_logo_images' ) ) : the_row();
// Variables - need to be listed inside 'while have rows'
$logo = get_sub_field('acf_home_logo_image');
$logo_url = $logo['sizes']['medium'];

echo '<img src="' . $logo_url . '" class="home-logo-image">';

endwhile;
endif;

echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';