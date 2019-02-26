<?php 
echo '<section class="testimonial-row clearfix">';
echo'<div class="container"><div class="row">';
echo '<h3>' . $testimonial_title . '</h3>';
echo '<div class="col-md-1 col-md-offset-1 test-quot-mark-left hidden-sm hidden-xs">&ldquo;</div>';
echo '<div class="col-md-8">';



echo '<div class="testimonial-slider clearfix">';
if ( have_rows( 'quotes' ) ) :


while ( have_rows( 'quotes' ) ) : the_row();
// Variables - need to be listed inside 'while have rows'
$show_slider = get_sub_field('show_hero_slider');
$quotes = get_sub_field('quotes');
$test_quote = get_sub_field('acf_flexible_layout_testimonial_quote');
$test_quote_source = get_sub_field('acf_flexible_layout_testimonial_source');


echo '<div class="testimonial-slide">';
if($test_quote):echo $test_quote; endif;
if($test_quote_source): echo '<div class="testimonial-source">&mdash; ' . $test_quote_source . '</div>'; endif;
echo '</div>';


endwhile;
endif;
echo '</div>';
echo '</div>';
echo '<div class="col-md-1 test-quot-mark-right hidden-sm hidden-xs">&rdquo;</div>'; 
echo '</div></div>';
echo '</section>';