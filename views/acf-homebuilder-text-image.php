<section class="text-image <?php if ($t_i_class):echo $t_i_class; endif;?>">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-<?php echo $t_i_left_size;?>"><div class="left-text-wrap"><?php echo $t_i_left_text; ?></div></div>
			<div class="col-md-<?php echo $t_i_right_size;?> r-l-image"><?php echo wp_get_attachment_image( $t_i_right_image, 'full' ); ?>
			</div>
		</div>
	</div>	
</section>	