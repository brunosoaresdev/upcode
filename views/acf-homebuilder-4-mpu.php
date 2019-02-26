<section class="mpu mpu-4 <?php if ($mpu_4_box_css):echo $mpu_4_box_css; endif;?>">
	<div class="container">
		<div class="row <?php if (!empty($mpu_4_collapse)): echo 'no-gutters'; endif; ?>">
			<?php if($mpu_4_title): echo '<h3 class="mpu-title">' . $mpu_4_title . '</h3>'; endif; ?>
			<div class="col-md-3 col-sm-6 mpu-flex box1">
				<div class="mpu-item-wrap">
					<?php if ($mpu_4_box_1_title):echo '<h3>' . $mpu_4_box_1_title . '</h3>'; endif;?>
					<div class="mpu-item-content-wrap">

						<?php $image_att = wp_get_attachment_image_src( $mpu_4_box_1_image, $mpu_4_size ); ?>
						<?php if ($mpu_4_box_1_image): echo '<div style="background-image: url( '. $image_att[0] . ')" class="mpu-header-image"></div>'; endif; ?>
						<div class="mpu-item-text-btn-wrap">
							<?php if( $mpu_4_box_1_text ): echo $mpu_4_box_1_text; endif; ?>
							<?php if( $mpu_4_box_1_button ){
								echo '<a href="' . $mpu_4_box_1_button['url'] . '" class="btn">' . $mpu_4_box_1_button['text'] . '</a>'; 
							}
							?>                                           
						</div>                                    
					</div>  
				</div>
			</div>
			<div class="col-md-3 col-sm-6 mpu-flex box2">
				<div class="mpu-item-wrap">
					<?php if ($mpu_4_box_2_title):echo '<h3>' . $mpu_4_box_2_title . '</h3>'; endif;?>
					<div class="mpu-item-content-wrap">
						<?php $image_att = wp_get_attachment_image_src( $mpu_4_box_2_image, $mpu_4_size ); ?>
						<?php if ($mpu_4_box_2_image): echo '<div style="background-image: url( '. $image_att[0] . ')" class="mpu-header-image"></div>'; endif; ?>
						<div class="mpu-item-text-btn-wrap">
							<?php if( $mpu_4_box_2_text ): echo $mpu_4_box_2_text; endif; ?>
							<?php if( $mpu_4_box_2_button ){
								echo '<a href="' . $mpu_4_box_2_button['url'] . '" class="btn">' . $mpu_4_box_2_button['text'] . '</a>'; 
							}
							?>                                           
						</div>                                    
					</div>  
				</div>
			</div>
			<!-- Add the extra clearfix for only the small devices so content splits cleanly into two rows -->
			<div class="clearfix visible-sm-block"></div>

			<div class="col-md-3 col-sm-6 mpu-flex box3">
				<div class="mpu-item-wrap">
					<?php if ($mpu_4_box_3_title):echo '<h3>' . $mpu_4_box_3_title . '</h3>'; endif;?>
					<div class="mpu-item-content-wrap">
						<?php $image_att = wp_get_attachment_image_src( $mpu_4_box_3_image, $mpu_4_size ); ?>
						<?php if ($mpu_4_box_3_image): echo '<div style="background-image: url( '. $image_att[0] . ')" class="mpu-header-image"></div>'; endif; ?>
						<div class="mpu-item-text-btn-wrap">
							<?php if( $mpu_4_box_3_text ): echo $mpu_4_box_3_text; endif; ?>
							<?php if( $mpu_4_box_3_button ){
								echo '<a href="' . $mpu_4_box_3_button['url'] . '" class="btn">' . $mpu_4_box_3_button['text'] . '</a>'; 
							}
							?>                                           
						</div>                                    
					</div>  
				</div>
			</div>
			<div class="col-md-3 col-sm-6 mpu-flex box4">
				<div class="mpu-item-wrap">
					<?php if ($mpu_4_box_4_title):echo '<h3>' . $mpu_4_box_4_title . '</h3>'; endif;?>
					<div class="mpu-item-content-wrap">
						<?php $image_att = wp_get_attachment_image_src( $mpu_4_box_4_image, $mpu_4_size ); ?>
						<?php if ($mpu_4_box_4_image): echo '<div style="background-image: url( '. $image_att[0] . ')" class="mpu-header-image"></div>'; endif; ?>
						<div class="mpu-item-text-btn-wrap">
							<?php if( $mpu_4_box_4_text ): echo $mpu_4_box_4_text; endif; ?>
							<?php if( $mpu_4_box_4_button ){
								echo '<a href="' . $mpu_4_box_4_button['url'] . '" class="btn">' . $mpu_4_box_4_button['text'] . '</a>'; 
							}
							?>                                           
						</div>                                    
					</div>  
				</div>
			</div>
		</div>
	</div>	
</section>