<section class="hero-image" style="background-image: url(<?php echo $hero_size; ?>);">
	<div class="dark-overlay">
		<div class="container clearfix">
			
			<div class="hero-image-caption fadeInUp caption-<?php echo $caption_position;?>">
				<?php if($hero_title): echo '<h2 class="title-' . $hero_title_size . '">' . $hero_title . '</h2>'; endif; ?>
				<div class="hero-text-wrap">
				<?php if ($hero_caption):echo $hero_caption; endif;
				if( $hero_display_button ) { ?>
				<a href="<?php echo $hero_button['url'] ?>" <?php if($hero_lightbox):echo 'data-featherlight="iframe" data-featherlight-iframe-width="853" data-featherlight-iframe-height="480"'; endif;?> class="btn"><?php echo $hero_button['text'];?></a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>