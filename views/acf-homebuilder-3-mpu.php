<section class="mpu mpu-3 <?php if ($mpu_3_box_css):echo $mpu_3_box_css; endif;?>">
	<div class="container">
		<div class="row <?php if (!empty($mpu_3_collapse)): echo 'no-gutters'; endif; ?>">
			<?php if($mpu_3_title): echo '<h3 class="mpu-title">' . $mpu_3_title . '</h3>'; endif; ?>
			<div class="col-md-4 mpu-flex box1">
				<div class="mpu-item-wrap">
					<?php if ($mpu_3_box_1_title):echo '<h3>' . $mpu_3_box_1_title . '</h3>'; endif;?>
					<div class="mpu-item-content-wrap">
						<?php $image_att = wp_get_attachment_image_src( $mpu_3_box_1_image, $mpu_3_size ); ?>
						<?php if ($mpu_3_box_1_image): echo '<div style="background-image: url( '. $image_att[0] . ')" class="mpu-header-image"></div>'; endif; ?>
						<div class="mpu-item-text-btn-wrap">
							<?php if( $mpu_3_box_1_text ): echo $mpu_3_box_1_text; endif; ?>
							<?php if( $mpu_3_box_1_button ){
								echo '<a href="' . $mpu_3_box_1_button['url'] . '" class="btn btn-color2">' . $mpu_3_box_1_button['text'] . '</a>'; 
							}
							?>                                           
						</div>                                    
					</div>  
				</div>
			</div>
			<div class="col-md-4 mpu-flex box2">
				<div class="mpu-item-wrap">
					<?php if ($mpu_3_box_2_title):echo '<h3>' . $mpu_3_box_2_title . '</h3>'; endif;?>
					<div class="mpu-item-content-wrap">
						<?php $image_att = wp_get_attachment_image_src( $mpu_3_box_2_image, $mpu_3_size ); ?>
						<?php if ($mpu_3_box_2_image): echo '<div style="background-image: url( '. $image_att[0] . ')" class="mpu-header-image"></div>'; endif; ?>
						<div class="mpu-item-text-btn-wrap">
							<?php if( $mpu_3_box_2_text ): echo $mpu_3_box_2_text; endif; ?>
							<?php if( $mpu_3_box_2_button ){
								echo '<a href="' . $mpu_3_box_2_button['url'] . '" class="btn btn-color2">' . $mpu_3_box_2_button['text'] . '</a>'; 
							}
							?>                                           
						</div>                                    
					</div>  
				</div>
			</div>
			<div class="col-md-4 mpu-flex box3">
				<div class="mpu-item-wrap">
					<?php if ($mpu_3_box_3_title):echo '<h3>' . $mpu_3_box_3_title . '</h3>'; endif;?>
					<div class="mpu-item-content-wrap">
						<?php $image_att = wp_get_attachment_image_src( $mpu_3_box_3_image, $mpu_3_size ); ?>
						<?php if ($mpu_3_box_3_image): echo '<div style="background-image: url( '. $image_att[0] . ')" class="mpu-header-image"></div>'; endif; ?>
						<div class="mpu-item-text-btn-wrap">
							<?php if( $mpu_3_box_3_text ): echo $mpu_3_box_3_text; endif; ?>
							<?php if( $mpu_3_box_3_button ){
								echo '<a href="' . $mpu_3_box_3_button['url'] . '" class="btn btn-color2">' . $mpu_3_box_3_button['text'] . '</a>'; 
							}
							?>                                           
						</div>                                    
					</div>  
				</div>
			</div>
		</div>
	</div>
</section>