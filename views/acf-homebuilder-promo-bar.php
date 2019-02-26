<section class="promo-bar <?php if ($promo_bar_css_class):echo $promo_bar_css_class; endif;?>" style="background-color: <?php echo $promo_bg_color; ?>; color:<?php echo $promo_text_color; ?>">
	<div class="container">
		<div class="promo-bar-wrap clearfix">
			<div class="promo-content">
				<?php if ($promo_title):echo '<h2 style="color:' . $promo_text_color . '">' . $promo_title . '</h2>'; endif;
				if ($promo_text):echo $promo_text; endif;
				?>
			</div>

			<div class="promo-button-wrap">
				<?php  
				if ($promo_button): echo '<a href="' . $promo_button['url'] . '" class="btn" style="background-color:' . $promo_text_color . '; color:' . $promo_bg_color . '; border:double ' . $promo_bg_color . '">' . $promo_button['text'] . '</a>'; endif;
				?>

			</div>
		</div>
	</div> 
</section>