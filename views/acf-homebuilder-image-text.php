<section class="image-text <?php if ($i_t_class):echo $i_t_class; endif;?>">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-<?php echo $i_t_left_size;?> r-l-image"><?php echo wp_get_attachment_image( $i_t_left_image, 'full' ); ?></div>
			<div class="col-md-<?php echo $i_t_right_size;?>"><div class="right-text-wrap"><?php echo $i_t_right_text; ?></div></div>
		</div>
	</div>
</section>