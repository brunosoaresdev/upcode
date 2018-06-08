<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */
?>
	
	<?php 
		$location = get_field('map_info');
		if( !empty($location) ):
	?>
		<div class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div>
	<?php endif; ?>

	<footer id="footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<a id="logotipo" class="logotipo d-inline-block" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php echo get_field('logotipo_rodape', get_option( 'page_on_front' )); ?>" class="img-fluid" />
					</a>
				</div>
			</div>
			<p>© Copyright <?php echo date('Y') ?> - <?php bloginfo( 'name' ); ?> - Todos direitos reservados.</p>
		</div>

		<div class="footer-txt">
			<div class="container">
				<?php get_template_part( 'partials/_assinatura-upcode' ); ?>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>
</body>
</html>