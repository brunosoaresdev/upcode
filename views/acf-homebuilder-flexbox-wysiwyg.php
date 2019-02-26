<?php 
$wysi_flex_wrap_css = get_sub_field('flex_wysi_wrap_css_class');
$count = count( get_sub_field( 'flexbox_wysi_repeater' ) );

?>
<section class="flexbox-wysi-row clearfix <?php if($wysi_flex_wrap_css): echo $wysi_flex_wrap_css; endif;?>">
<?php	
echo'<div class="container"><div class="row"><div class="col-md-12 wysi-flex-wrap box-count-' . $count . '">';


if ( have_rows( 'flexbox_wysi_repeater' ) ) :


while ( have_rows( 'flexbox_wysi_repeater' ) ) : the_row();
// Variables - need to be listed inside 'while have rows'
$wysi_flex_content = get_sub_field('flexbox_wysi_content');
$wysi_flex_bg = get_sub_field('flexbox_wysi_bg');
$wysi_flex_css = get_sub_field('flexbox_wysi_css_class');


?>
<div class="wysi-flex-box <?php if($wysi_flex_css): echo $wysi_flex_css; endif;?> <?php if($wysi_flex_bg): echo $wysi_flex_bg; endif;?>">
	<div class="flex-pad">
	<?php if($wysi_flex_content): echo $wysi_flex_content; endif; ?>
</div>
</div>
<?php
endwhile;
endif;


echo '</div></div></div>';
echo '</section>';